<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GuzzleClientController as Client;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function getLogin()
    {
        $list_category = Client::listCategory();
        return view('pages.auth.login', compact('list_category'));
    }

    public function doLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|min:5|max:50',
            'password' => 'required|min:8|max:50'
        ]);

        $response = Client::client()->post('login', [
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password
            ]
        ]);

        if ($response->getStatusCode() === 204){
            return redirect()->back()->withMessage('Email or password an incorrect !');
        }

        $user = json_decode($response->getBody())->user;
        session([
            'user_id' => $user->id,
            'name' => $user->name,
            'api_token' => $user->api_token
        ]);

        return redirect()->back()->withMessage('Login Success');

    }

    public function getRegister()
    {
        $list_category = Client::listCategory();
        return view('pages.auth.register',compact('list_category'));
    }

    public function doRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|min:5|max:50',
            'password' => 'required|min:8|max:50'
        ]);

        $response = Client::client()->post('register', [
            'form_params' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]
        ]);

        if ($response->getStatusCode() === 204){
            return redirect()->back()->withMessage('Email telah digunakan !');
        }

        return redirect()->route('login')->withMessage('Register berhasil, silahkan login');
    }

    public function doLogout()
    {
        session()->flush();
        return redirect()->route('login')->withMessage('Logout berhasil !');
    }

    public function getResetPassword()
    {
        $list_category = Client::listCategory();
        return view('pages.auth.reset-password', compact('list_category'));
    }

    public function doResetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|min:5|max:50|',
        ]);
    }
}
