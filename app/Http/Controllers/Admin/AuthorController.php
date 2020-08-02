<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::orderBy('name','asc')->get();
        return view('admin.author.index',[
            'title' => 'Penulis | Perpustakaan',
            'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create',[
            'title' => 'Create Penulis | Perpustakaan',
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
            'name' => ['required','min:3','unique:authors,name']
        ]);

        Author::create([
            'name' => Str::title($request->name)
        ]);

        return redirect()->route('admin.author.index')->with('success','Penulis baru berhasil ditambah.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin.author.edit',[
            'title' => 'Edit Penulis ' . $author->name . ' | Perpustakaan',
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => ['required','min:3','unique:authors,name']
        ]);

        $author->update([
            'name' => Str::title($request->name)
        ]);

        return redirect()->route('admin.author.index')->with('success','Penulisd berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('admin.author.index')->with('success','Penulisd berhasil dihapus.');
    }
}
