<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GuzzleClientController as Client;

class OAuthController extends Controller
{
    public function redirectToProvider($proviver)
    {
        return Socialite::driver($proviver)->redirect();
    }

    public function handleProviderCallback($proviver)
    {
        $user = Socialite::driver($proviver)->user();

        $response = Client::client()->post('oauth', [
           'form_params' => [
               'nickname' => $user->nickname,
               'name' => $user->name,
               'email' => $user->email,
               'provider_id' => $user->id,
               'provider' => $proviver
           ]
        ]);

        $user = json_decode($response->getBody())->user;
        session([
            'user_id' => $user->id,
            'name' => $user->name,
            'api_token' => $user->api_token
        ]);

        return redirect()->route('home.index');
    }
}