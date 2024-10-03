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
            "client_id" =>  "9d25e2db-8871-468b-afa3-c9621a5b2406",
            "redirect_uri" => "http://scic.test/callback",
            "response_type" => "code",
            "scope" => "view-user",
            "state" => $state,
            "prompt" => true
        ]);
        // dd($query);
        return redirect("http://laravel_sso_server.test/oauth/authorize?" . $query);
    }
    public function getCallback(Request $request)
    {
        $state = $request->session()->pull("state");

        throw_unless(strlen($state) > 0 && $state == $request->state, InvalidArgumentException::class);

        $response = Http::asForm()->post(
            "http://laravel_sso_server.test/oauth/token",
            [
                "grant_type" => "authorization_code",
                "client_id" => "9d25e2db-8871-468b-afa3-c9621a5b2406",
                "client_secret" => "Yx2oNJOrGVypDYWzYhRnMJLbhiOFrcVAoMj1KRvf",
                "redirect_uri" => "http://scic.test/callback",
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
        ])->get("http://laravel_sso_server.test/api/user");

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
