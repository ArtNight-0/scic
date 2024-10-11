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
            "client_id" =>  config("auth.client_id"),
            "redirect_uri" => config("auth.callback"),
            "response_type" => "code",
            "scope" => config("auth.scopes"),
            "state" => $state,
            "prompt" => true
        ]);
        // dd("masuk login client");
        return redirect(config("auth.sso_host")."/oauth/authorize?" . $query);
    }
    public function getCallback(Request $request)
    {
        $state = $request->session()->pull("state");

        throw_unless(strlen($state) > 0 && $state == $request->state, InvalidArgumentException::class);

        $response = Http::asForm()->post(
            config("auth.sso_host")."/oauth/token",
            [
                "grant_type" => "authorization_code",
                "client_id" => config("auth.client_id"),
                "client_secret" => "Y9hYGJM4a3lbK7ruW8K8eGImkrmP2JEpsLjgm6rM",
                "redirect_uri" => config("auth.callback"),
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
        ])->get(config("auth.sso_host")."/api/user");

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
