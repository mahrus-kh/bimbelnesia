<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RecommendationController extends Controller
{
    public function getRecommendation(Request $request)
    {
        $client = New Client(['base_uri' => env('API_URL_RECOM')]);
        $response = $client->post('', [
            'form_params' => [
                'user_id' => session('user_id'),
                'lbb_id' => session('lbb_id'),
                'auth' => 007
            ]
        ]);
        $response = json_decode($response->getBody());

        return response()->json($response,200);
    }
}
