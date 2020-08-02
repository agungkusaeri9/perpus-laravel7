<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('title','asc')->get();
        return view('admin.book.index',[
            'title' => 'Buku | Perpustakaan',
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy('name','asc')->get();
        return view('admin.book.create',[
            'title' => 'Tambah Data | Buku',
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','max:191','unique:books,title'],
            'description' => ['required','min:20'],
            'qty' => ['required','numeric'],
            'author' => ['required'],
            'cover' => ['image','mimes:jpg,jpeg,png','max:2048']
        ]);
        
        $cover_name = Str::slug($request->title);
        $file = $request->file('cover');
        if($file){
            $name = $cover_name . '-' . date('dmY') . '.' . $file->getClientOriginalExtension();
            $cover = $file->storeAs('images/cover', $name);
        }else{
            $cover = NULL;
        }
        Book::create([
            'title' => Str::title($request->title),
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'qty' => $request->qty,
            'author_id' => $request->author,
            'cover' => $cover
        ]);
        return redirect()->route('admin.book.index')->with('success','Buku berhasil Ditambah.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::orderBy('name','asc')->get();
        return view('admin.book.edit',[
            'title' => 'Edit Data | Buku',
            'authors' => $authors,
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => ['required','max:191'],
            'description' => ['required','min:20'],
            'qty' => ['required','numeric'],
            'author' => ['required'],
            'cover' => ['image','mimes:jpg,jpeg,png','max:2048']
        ]);
        
        $file = $request->file('cover');
        if($file){
            \Storage::delete($book->cover);
            $name = Str::slug($request->title) . '-' . date('dmY') . '.' . $file->getClientOriginalExtension();
            $cover = $file->storeAs('images/cover', $name);
        }else{
            $cover = $book->cover;
        }
        $book->update([
            'title' => Str::title($request->title),
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'qty' => $request->qty,
            'author_id' => $request->author,
            'cover' => $cover
        ]);
        return redirect()->route('admin.book.index')->with('success','Buku berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.book.index')->with('success','Buku berhasil didelete.');
    }
}
