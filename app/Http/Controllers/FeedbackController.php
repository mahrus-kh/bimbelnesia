<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GuzzleClientController as Client;

class FeedbackController extends Controller
{
    public function doFeedback(Request $request, $slug)
    {
        $this->validate($request, [
            'rating' => 'required|max:1',
            'comment' => 'required|min:3|max:255'
        ]);

        $response = Client::client()->post('lembaga/' . $slug . '/feedback', [
            'form_params' => [
                'user_id' => session('user_id'),
                'rating' => $request->rating,
                'comment' => $request->comment
            ]
        ]);

        if ($response->getStatusCode() === 204){
            return redirect()->back()->withMessage('Komentar Gagal !');
        }

        return redirect()->back();
    }
}
