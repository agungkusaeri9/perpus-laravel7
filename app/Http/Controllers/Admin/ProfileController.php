<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = User::where('username', Auth::user()->username)->first();
        return view('admin.profile',[
            'title' => 'My Profile',
            'admin' => $admin
        ]);
    }
}
