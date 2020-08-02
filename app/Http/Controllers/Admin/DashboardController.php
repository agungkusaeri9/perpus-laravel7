<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\BorrowHistory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $authors_count = Author::count();
        $books_count = Book::count();
        $book_being_borrowed = BorrowHistory::where('returned_at', null)->count();
        $history_peminjaman = BorrowHistory::count();
        return view('admin.dashboard',[
            'title' => 'Dashboard',
            'authors_count' => $authors_count,
            'books_count' => $books_count,
            'book_being_borrowed' => $book_being_borrowed,
            'history_peminjaman' => $history_peminjaman
        ]);
    }
}
