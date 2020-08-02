<?php

namespace App\Http\Controllers;

use App\BorrowHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $borrows = BorrowHistory::latest()->where('user_id', $user->id)->get();

        return view('frontend.home',[
            'title' => 'Selamat datang di perpustakaan.',
            'borrows' => $borrows,
        ]);
    }
    
}
