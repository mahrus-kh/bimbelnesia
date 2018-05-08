<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GuzzleClientController as Client;

class DirektoriController extends Controller
{
    public function index()
    {
        $list_category = Client::listCategory();
        $request = json_decode(Client::client()->get('list-alphabet-directory')->getBody());
        $alphabet_directory = $request->alphabet_directory;
        $lembaga_by_alphabet = $request->lembaga_by_alphabet;

        return view('pages.direktori.index', compact('list_category','alphabet_directory', 'lembaga_by_alphabet'));
    }

    public function show($alphabet)
    {
        $list_category = Client::listCategory();
        $response = Client::client()->get('direktori/' . $alphabet);

        if ($response->getStatusCode() === 204) {
            return abort(404,'Content Not Found');
        }

        $alphabet_directory = json_decode($response->getBody())->alphabet_directory;
        $lembaga_by_alphabet = json_decode($response->getBody())->lembaga_by_alphabet;

        return view('pages.direktori.direktori', compact('list_category', 'alphabet_directory', 'lembaga_by_alphabet'));
    }
}
