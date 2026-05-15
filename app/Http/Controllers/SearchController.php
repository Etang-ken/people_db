<?php

namespace App\Http\Controllers;

use App\Mail\DataDeletionConfirmationMail;
use App\Models\DataDeletionRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->input('query');
        $type = $request->input('type', 'name');
        $location = $request->input('location');
        $createdFrom = $request->input('created_from');
        $createdTo = $request->input('created_to');
        $updatedFrom = $request->input('updated_from');
        $updatedTo = $request->input('updated_to');

        $results = null;

        if ($query) {
            $results = UserProfile::query();

            switch ($type) {
                case 'email':
                    $results->searchByEmail($query);
                    break;
                case 'phone':
                    $results->searchByPhone($query);
                    break;
                case 'name':
                default:
                    $results->searchByName($query);
                    break;
            }

            if ($location) {
                $results->filterByLocation($location);
            }

            if ($createdFrom) {
                $results->whereDate('created_at', '>=', $createdFrom);
            }

            if ($createdTo) {
                $results->whereDate('created_at', '<=', $createdTo);
            }

            if ($updatedFrom) {
                $results->whereDate('updated_at', '>=', $updatedFrom);
            }

            if ($updatedTo) {
                $results->whereDate('updated_at', '<=', $updatedTo);
            }

            $results = $results->paginate(10)->withQueryString();
        }

        $locations = UserProfile::all()
            ->flatMap(fn ($profile) => $profile->all_locations)
            ->unique()
            ->filter()
            ->sort()
            ->values();

        return view('search.index', compact(
            'results',
            'query',
            'type',
            'location',
            'locations',
            'createdFrom',
            'createdTo',
            'updatedFrom',
            'updatedTo'
        ));
    }

    public function show(UserProfile $profile): View
    {
        return view('profile.show', compact('profile'));
    }

    public function pdf(UserProfile $profile): View
    {
        if (!$profile->hasPdf()) {
            abort(404, 'PDF not found');
        }

        return view('profile.pdf', compact('profile'));
    }

    public function pdfRaw(UserProfile $profile): Response|BinaryFileResponse
    {
        if (!$profile->hasPdf()) {
            abort(404, 'PDF not found');
        }

        $path = $profile->pdf_path;
        $storagePath = Storage::disk('public')->path($path);

        if (!file_exists($storagePath)) {
            abort(404, 'PDF file not found on disk');
        }

        return response()->file($storagePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $profile->name . ' - Profile.pdf"',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }

    /**
     * Show the form for initiating data deletion request
     */
    public function clearInfoForm(Request $request, UserProfile $profile): View
    {
        $deletionRequests = $profile->deletionRequests()->orderBy('created_at', 'desc')->get();

        // Allow new request submission if ?new=1 is passed
        if ($request->has('new') && !$profile->hasPendingDeletionRequest()) {
            return view('profile.clear-info.form', compact('profile'));
        }

        if ($profile->hasPendingDeletionRequest()) {
            return view('profile.clear-info.pending', compact('profile', 'deletionRequests'));
        }

        // If user has previous requests (including rejected), show them with option to submit new
        if ($deletionRequests->isNotEmpty()) {
            return view('profile.clear-info.pending', compact('profile', 'deletionRequests'));
        }

        return view('profile.clear-info.form', compact('profile'));
    }

    /**
     * Store the uploaded documents for deletion request
     */
    public function storeDocuments(Request $request, UserProfile $profile): RedirectResponse
    {
        if ($profile->hasPendingDeletionRequest()) {
            return redirect()->route('profile.clear-info.form', $profile)
                ->with('error', 'A deletion request is already pending for this profile.');
        }

        $validated = $request->validate([
            'id_front' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10240'],
            'id_back' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10240'],
            'selfie' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10240'],
            'ssn_card' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10240'],
        ]);

        $folder = 'deletion-requests/' . $profile->slug;

        $idFrontPath = $request->file('id_front')->store($folder, 'public');
        $idBackPath = $request->file('id_back')->store($folder, 'public');
        $selfiePath = $request->file('selfie')->store($folder, 'public');
        $ssnCardPath = $request->file('ssn_card')->store($folder, 'public');

        $deletionRequest = DataDeletionRequest::create([
            'user_profile_id' => $profile->id,
            'id_front_path' => $idFrontPath,
            'id_back_path' => $idBackPath,
            'selfie_path' => $selfiePath,
            'ssn_card_path' => $ssnCardPath,
            'contact_email' => '',
            'status' => 'pending',
        ]);

        return redirect()->route('profile.clear-info.confirm.form', [
            'profile' => $profile,
            'requestId' => $deletionRequest->id,
        ]);
    }

    /**
     * Show the email confirmation form
     */
    public function confirmEmailForm(UserProfile $profile, int $requestId): View
    {
        $deletionRequest = DataDeletionRequest::findOrFail($requestId);

        if ($deletionRequest->user_profile_id !== $profile->id) {
            abort(404);
        }

        return view('profile.clear-info.confirm', compact('profile', 'deletionRequest'));
    }

    /**
     * Submit the email confirmation and send notification
     */
    public function submitConfirmation(Request $request, UserProfile $profile, int $requestId): RedirectResponse
    {
        $deletionRequest = DataDeletionRequest::findOrFail($requestId);

        if ($deletionRequest->user_profile_id !== $profile->id) {
            abort(404);
        }

        $validated = $request->validate([
            'contact_email' => ['required', 'email', 'max:255'],
        ]);

        $deletionRequest->update([
            'contact_email' => $validated['contact_email'],
        ]);

        Mail::to($validated['contact_email'])->send(
            new DataDeletionConfirmationMail($deletionRequest, $profile)
        );

        return redirect()->route('profile.clear-info.success', $profile);
    }

    /**
     * Show the success page after submission
     */
    public function success(UserProfile $profile): View
    {
        return view('profile.clear-info.success', compact('profile'));
    }
}
