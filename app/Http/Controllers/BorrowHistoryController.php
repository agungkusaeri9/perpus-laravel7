<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\BorrowHistory;
class BorrowHistoryController extends Controller
{
    public function borrow(Book $book)
    {
        $user = Auth::user();

        if(BorrowHistory::where('user_id', $user->id)->where('book_id',$book->id)->where('returned_at',  null)->count() > 0){
            return redirect()->route('book.index')->with('error','Anda sudah meminjam buku ini');
        }

        if($book->qty < 1){
            return redirect()->route('book.index')->with('error','Stok buku kosong.');
        }

        if(BorrowHistory::where('user_id', $user->id)->where('status','belum diambil')->count() >= 3 ){
            return redirect()->route('book.index')->with('error','Anda sudah meminjam 3 buku dan belum diambil, silahkan ambil terlebih dahulu atau kembalikan buku yang sebelumnya dipinjam');
        }

        BorrowHistory::create([
            'user_id' => $user->id,
            'book_id' => $book->id
        ]);

        $book->decrement('qty');

        return redirect()->route('home')->with('success','Anda berhasil meminjam buku ini, silahkan ambil buku di perpustakaan kami.');
    }

    public function cancel(BorrowHistory $borrowHistory)
    {
        $borrowHistory->book->increment('qty');
        $borrowHistory->delete();
        return redirect()->route('book.index')->with('success','Anda membatalkan peminjaman.');
    }
}
