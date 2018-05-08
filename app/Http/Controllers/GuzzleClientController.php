<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GuzzleClientController
{
    public static function client()
    {
        return New Client(['base_uri' => env('API_URL')]);
    }

    public static function listCategory()
    {
        return json_decode(self::client()->get('list-category')->getBody())->list_category;
    }

    public static function listSubCategory()
    {
        return json_decode(self::client()->get('list-sub-category')->getBody())->list_sub_category;
    }
}
