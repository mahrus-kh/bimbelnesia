<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GuzzleClientController as Client;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function show($slug)
    {
        $response = Client::client()->get('lembaga/' . $slug);
        if ($response->getStatusCode() === 204) {
            return abort(404,'Content Not Found');
        }

        $lembaga = json_decode($response->getBody())->lembaga;
        $list_category = Client::listCategory();

        session(['lbb_id' => $lembaga->id]);
        return view('pages.lembaga.lembaga', compact('lembaga','list_category'));
    }
}