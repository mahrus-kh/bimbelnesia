<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GuzzleClientController as Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function doSearch(Request $request)
    {
        $this->validate($request, [
            'search' => 'required'
        ]);

        $list_category = Client::listCategory();
        $response = Client::client()->get('search', [
            'query' => ['search' => $request->search]
        ]);

        if ($response->getStatusCode() === 204) {
            $lembaga = [];
            return view('pages.search.search', compact('list_category', 'lembaga'));
        }

        $lembaga = collect(json_decode($response->getBody())->lembaga);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentResults = $lembaga->slice(($currentPage - 1) * 15, 15)->all();
        $lembaga = New LengthAwarePaginator($currentResults, $lembaga->count(),15);

        return view('pages.search.search', compact('list_category', 'lembaga'));
    }
}
