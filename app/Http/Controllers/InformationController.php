<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GuzzleClientController as Client;

class InformationController extends Controller
{
    public function pageAbout()
    {
        $list_category = Client::listCategory();
        return view('pages.informasi.tentang', compact('list_category'));
    }

    public function pageSumberPengolahanData()
    {
        $list_category = Client::listCategory();
        return view('pages.informasi.sumber-pengolahan-data', compact('list_category'));
    }

}
