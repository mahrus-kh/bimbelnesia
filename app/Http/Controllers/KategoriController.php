<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GuzzleClientController as Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class KategoriController extends Controller
{
    public function index()
    {
        $list_category = Client::listCategory();
        $list_sub_category = Client::listSubCategory();

        $lembaga = collect(json_decode(Client::client()->get('list-all-lembaga')->getBody())->lembaga);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentResults = $lembaga->slice(($currentPage - 1) * 10, 10)->all();
        $lembaga = New LengthAwarePaginator($currentResults, $lembaga->count(),10);

        return view('pages.kategori.index', compact('list_category','list_sub_category', 'lembaga'));
    }

    public function show($slug)
    {
        $list_category = Client::listCategory();
        $list_sub_category = Client::listSubCategory();

        $response = Client::client()->get('category/' . $slug);
        if ($response->getStatusCode() === 204) {
            return abort(404,'Content Not Found');
        }

        $lembaga = collect(json_decode($response->getBody())->lembaga);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentResults = $lembaga->slice(($currentPage - 1) * 10, 10)->all();
        $lembaga = New LengthAwarePaginator($currentResults, $lembaga->count(),10);

        return view('pages.kategori.kategori', compact('list_category','list_sub_category', 'lembaga'));
    }
}
