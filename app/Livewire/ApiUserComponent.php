<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ApiUserComponent extends Component
{
    public $data = [];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // Contoh pengambilan data dari API
        $response = Http::get('https://api-kamu.com/data-users');
        if ($response->successful()) {
            $this->data = $response->json()['data'];
        }
    }

    public function render()
    {
        return view('livewire.api-user-component')->extends('layouts.app');
    }

    public function updated()
    {
        $this->loadData(); // Mengambil data setiap kali ada perubahan
    }

    // public function mount()
    // {
    //     $this->fetchData();
    // }

    // public function fetchData()
    // {
    //     $response = Http::get('https://sso-dashboard.ramand.my.id/api/user-get');
    //     $jsonResponse = $response->json();

    //     if (is_array($jsonResponse) && isset($jsonResponse['data'])) {
    //         // Simpan data dari respons API
    //         $this->data = $jsonResponse['data'];
    //     } else {
    //         // Jika respons tidak sesuai, inisialisasi dengan array kosong atau berikan error handling
    //         $this->data = [];
    //         // Atau kamu bisa log error atau menunjukkan pesan error di UI
    //     }
    // }

    // public function render()
    // {
    //     return view('livewire.api-user-component')->extends('layouts.app');
    // }
}
