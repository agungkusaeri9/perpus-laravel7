<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(9);
        $books->load('author');
        return view('frontend.book.index',[
            'title' => 'Kumpulan buku yang boleh kamu pinjam',
            'books' => $books
        ]);
    }

    public function show(Book $book)
    {
        return view('frontend.book.show',[
            'title' => $book->title,
            'book' => $book
        ]);
    }

    public function search()
    {
        $keyword = request('keyword');
        $books = Book::where("title","like","%$keyword%")->orWhere("description","like","%$keyword%")->latest()->paginate(10);
        return view('frontend.book.index',[
            'title' => 'Kumpulan buku yang boleh kamu pinjam',
            'books' => $books
        ]);
    }
}
