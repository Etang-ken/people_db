<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
}
