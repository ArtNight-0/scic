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
        // dd('Generated state:', $state);
        $query = http_build_query([
            'client_id' => '9d2073f2-db00-443b-a52b-6eade1e65ad4',
            'redirect_uri' => 'http://scic.test/auth/callback',
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
            'prompt' => 'consent', // "none", "consent", or "login"
        ]);
        
        // Redirect user to the OAuth authorization page
        return redirect('http://scic.test/oauth/authorize?' . $query);
    }
    
    // Handle callback from the OAuth server
    public function callback(Request $request)
    {
        // Get state from session and check if it matches the returned state
        $state = $request->session()->pull('state');
        
        throw_unless(
            strlen($state) > 0 && $state === $request->state,
            InvalidArgumentException::class,
            'Invalid state value.'
        );
        
        // Send a request to get an access token
        $response = Http::asForm()->post('http://scic.test/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => '9d2073f2-db00-443b-a52b-6eade1e65ad4',
            'client_secret' => '$2y$10$KmeNWtg8dSF2Zb7/j2o2nOggEUWgLE03zLPdoisCj2ioY906WrnV2',
            'redirect_uri' => 'http://scic.test/auth/callback',
            'code' => $request->code,
        ]);

        // Handle the response or redirect the user after successful authentication
                // return $response();

        // return redirect('http://scic.test/dashboard');
    }
}
