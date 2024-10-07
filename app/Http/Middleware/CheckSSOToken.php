<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class CheckSSOToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Ambil access token dari session
        $accessToken = $request->session()->get('access_token');

        // Jika tidak ada token, redirect ke login
        if (!$accessToken) {
            return redirect()->route('login');
        }
        // dd($accessToken);
        
        // Kirim permintaan ke server SSO untuk mengecek validitas token
        $response = Http::post('http://sso-dashboard.ramand.my.id/oauth/check_token', [
            'token' => $accessToken
        ]);
        
        dd($response->status());
        dd($accessToken);
        
        // Jika token tidak valid atau respons gagal, redirect ke logout
        if ($response->failed() || !$response->json()['valid']) {
            dd($response->json());
            return redirect()->route('logout');
        }

        // Jika token valid, lanjutkan request
        return $next($request);
    }
}
