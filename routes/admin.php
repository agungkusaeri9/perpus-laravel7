<?php

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::group(['prefix' => 'author'], function () {
    Route::get('/', 'AuthorController@index')->name('author.index');
    Route::get('/create', 'AuthorController@create')->name('author.create');
    Route::post('/create', 'AuthorController@store')->name('author.store');
    Route::get('/{author:id}/edit', 'AuthorController@edit')->name('author.edit');
    Route::patch('/{author:id}/edit', 'AuthorController@update')->name('author.update');
    Route::delete('/{author:id}/delete', 'AuthorController@destroy')->name('author.destroy');
});

Route::group(['prefix' => 'book'], function () {
    Route::get('/', 'BookController@index')->name('book.index');
    Route::get('/create', 'BookController@create')->name('book.create');
    Route::post('/create', 'BookController@store')->name('book.store');
    Route::get('/{book:slug}/edit', 'BookController@edit')->name('book.edit');
    Route::patch('/{book:slug}/edit', 'BookController@update')->name('book.update');
    Route::delete('/{book:slug}/delete', 'BookController@destroy')->name('book.destroy');
});

Route::group(['prefix' => 'borrow'], function () {
    Route::get('/history-peminjaman', 'BorrowController@index')->name('borrow.index');
    Route::get('/buku-yang-sedang-dipinjam', 'BorrowController@borrowed')->name('borrow.borrowed');
    Route::put('/{borrowHistory:id}/return', 'BorrowController@returnBook')->name('borrow.returnBook');
    Route::put('/{borrowHistory:id}/takenBook', 'BorrowController@takenBook')->name('borrow.takenBook');
    Route::delete('/{borrowHistory:id}/delete', 'BorrowController@destroy')->name('borrow.destroy');
});

Route::group(['prefix' => 'report'], function () {
    Route::get('/top-book', 'ReportController@topBook')->name('report.topBook');
    Route::get('/top-user', 'ReportController@topUser')->name('report.topUser');
});
