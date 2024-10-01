<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $totalUsers = 100;
    public $totalClint = 50;

    public function render()
    {
        return view('livewire.dashboard')->extends('layouts.app');
    }
}
