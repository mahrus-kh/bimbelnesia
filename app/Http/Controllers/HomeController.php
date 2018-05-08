<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GuzzleClientController as Client;

class HomeController extends Controller
{
    public function index()
    {
        $list_category = Client::listCategory();
        $list_sub_category = Client::listSubCategory();

        $list_popular_lembaga = json_decode(Client::client()->get('list-popular-lembaga')->getBody())->lembaga;

        return view('pages.home.index', compact('list_category', 'list_sub_category', 'list_popular_lembaga'));
    }
}