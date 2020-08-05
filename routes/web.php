<?php

use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);

Route::get('/history', 'BorrowHistoryController@history')->name('history')->middleware('auth');
Route::get('/', 'BookController@index')->name('book.index');
Route::get('/search', 'BookController@search')->name('book.search');
Route::get('/{book:slug}', 'BookController@show')->name('book.show');
Route::post('/{book:slug}/borrow', 'BorrowHistoryController@borrow')->name('borrow.history')->middleware('auth');
Route::patch('/{borrowHistory:id}/cancel', 'BorrowHistoryController@cancel')->name('borrow.cancel')->middleware('auth');