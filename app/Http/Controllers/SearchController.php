<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response;
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
}
