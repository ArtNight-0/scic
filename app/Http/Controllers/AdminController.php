<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate(['role' => 'required']);
        $user->update(['role' => $request->role]);
        return redirect()->route('admin.users')->with('success', 'User role updated successfully');
    }
}
