<?php

namespace App\Livewire;

use App\Models\Dashboard;
use Livewire\Component;

class DashboardManagement extends Component
{
    public function render()
    {
        return view('livewire.dashboard-management',[
            'ManagementDashboard' => Dashboard::latest()->get(),
        ])->extends('layouts.app');
    }
}
