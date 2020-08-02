<?php

namespace App\Http\Controllers\Admin;

use App\BorrowHistory;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = BorrowHistory::latest()->get();
        $borrows->load('book','user');
        return view('admin.borrow.index',[
            'title' => 'Data buku yang dipinjamkan',
            'borrows' => $borrows
        ]);
    }

    public function takenBook(BorrowHistory $borrowHistory)
    {
        $borrowHistory->update([
            'status' => 'sudah diambil'
        ]);

        return redirect()->route('admin.borrow.borrowed')->with('success','Buku sudah diambil oleh user.');
    }

    public function returnBook(BorrowHistory $borrowHistory)
    {
        $borrowHistory->update([
            'status' => 'sudah dikembalikan',
            'returned_at' => Carbon::now(),
            'received_by' => Auth::user()->name
        ]);

        $borrowHistory->book->increment('qty');

        return redirect()->route('admin.borrow.borrowed')->with('success','Buku berhasil dikembalikan ke perpustakaan.');
    }

    public function borrowed()
    {
        $borrows = BorrowHistory::where('returned_at', null)->orderBy('created_at', 'desc')->get();
        $borrows->load('book','user');
        return view('admin.borrow.borrowed',[
            'title' => 'Data buku yang sedang dipinjam',
            'borrows' => $borrows
        ]);
    }

    public function destroy(BorrowHistory $borrowHistory){
        $borrowHistory->delete();
        return redirect()->route('admin.borrow.index')->with('success','Anda berhasil menghapus data peminjaman.');
    }
}
