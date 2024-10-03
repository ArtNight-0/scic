<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use InvalidArgumentException;

class ClientController extends Controller
{
    // Redirect user to the OAuth server
    public function redirect(Request $request)
    {
        // Generate and store state in session
        $request->session()->put('state', $state = Str::random(40));

        // Build query string for OAuth request
        $query = http_build_query([
            'client_id' => env('OAUTH_CLIENT_ID'),
            'redirect_uri' => env('OAUTH_REDIRECT_URI'),
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
            'prompt'=>'consent'
        ]);

        // Redirect to the OAuth authorization page
        return redirect('http://scic.test/auth/authorize?' . $query);
        // dd($query);
    }
    
    public function callback(Request $request)
    {
        // Verifikasi state
        $stateInSession = $request->session()->pull('state');
        $stateInRequest = $request->input('state');

        if (!$stateInSession || $stateInSession !== $stateInRequest) {
            throw new InvalidArgumentException('State tidak valid.');
        }

        // Tukar authorization code dengan access token
        $response = Http::asForm()->post('http://scic.test/auth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('OAUTH_CLIENT_ID'),
            'client_secret' => env('OAUTH_CLIENT_SECRET'),
            'redirect_uri' => env('OAUTH_REDIRECT_URI'),
            'code' => $request->input('code'),
        ]);

        // Simpan access token di session atau user model
        $tokenData = $response->json();
        session(['access_token' => $tokenData['access_token']]);

        // Redirect ke halaman yang dilindungi
        return redirect('/dashboard');
    }

}
