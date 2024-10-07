<?php

namespace App\Http\Controllers\SSO;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;

class SSOController extends Controller
{
    public function getLogin(Request $request)
    {
        $request->session()->put("state", $state =  Str::random(40));
        $query = http_build_query([
            "client_id" =>  "9d2fc325-1915-4ed1-8ace-c421b5ed2a70",
            "redirect_uri" => "http://dashboard-sso.ramand.my.id/callback",
            "response_type" => "code",
            "scope" => "view-user",
            "state" => $state,
            "prompt" => true
        ]);
        // dd("masuk login client");
        return redirect("http://sso-dashboard.ramand.my.id/oauth/authorize?" . $query);
    }
    public function getCallback(Request $request)
    {
        $state = $request->session()->pull("state");

        throw_unless(strlen($state) > 0 && $state == $request->state, InvalidArgumentException::class);

        $response = Http::asForm()->post(
            "http://sso-dashboard.ramand.my.id/oauth/token",
            [
                "grant_type" => "authorization_code",
                "client_id" => "9d2fc325-1915-4ed1-8ace-c421b5ed2a70",
                "client_secret" => "TIm80HL2yCYqkHopnTLGwcwKwBftFVsPQuIc6udx",
                "redirect_uri" => "http://dashboard-sso.ramand.my.id/callback",
                "code" => $request->code
            ]
        );
        $request->session()->put($response->json());
        return redirect(route("sso.connect"));
    }
    public function connectUser(Request $request)
    {
        // Mendapatkan access_token dari session
        $access_token = $request->session()->get("access_token");

        // Mengambil informasi pengguna dari server SSO
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $access_token
        ])->get("http://sso-dashboard.ramand.my.id/api/user");

        $userArray = $response->json();

        try {
            // Mengambil email dari response
            $email = $userArray['email'];
        } catch (\Throwable $th) {
            return redirect("login")->withError("Failed to get login information! Try again.");
        }

        // Mencari user di database berdasarkan email
        $user = User::where("email", $email)->first();

        // Jika user tidak ditemukan, buat user baru
        if (!$user) {
            $user = new User;
            $user->name = $userArray['name'];
            $user->email = $userArray['email'];
            $user->email_verified_at = $userArray['email_verified_at'];

            // Tidak menyimpan password, karena login bergantung pada server SSO
            // $user->password = null;  // atau bisa dibiarkan kosong

            $user->save();
        }

        // Login user tanpa memerlukan password lokal
        Auth::login($user);

        return redirect(route("dashboard"));
        //  // Mencari user di database berdasarkan email
        //     $user = User::where("email", $email)->first();

        //     // Jika user tidak ditemukan, buat user baru
        //     if (!$user) {
        //         $user = new User;
        //         $user->name = $userArray['name'];
        //         $user->email = $userArray['email'];
        //         $user->email_verified_at = $userArray['email_verified_at'];

        //         // Tambahkan password acak yang dienkripsi
        //         $user->password = bcrypt(Str::random(16));

        //         $user->save();
        //     }
    }

}
