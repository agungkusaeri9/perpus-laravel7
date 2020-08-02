<?php



// Home
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});


// author index
Breadcrumbs::for('admin.author.index', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push('Data Penulis', route('admin.author.index'));
});


// author create
Breadcrumbs::for('admin.author.create', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.author.index'));
    $trail->push('Tambah Data', route('admin.author.create'));
});

// author edit
Breadcrumbs::for('admin.author.edit', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.author.index'));
    $trail->push('Edit Data');
});

// book index
Breadcrumbs::for('admin.book.index', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push('Buku', route('admin.book.index'));
});

// book create
Breadcrumbs::for('admin.book.create', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push('Buku', route('admin.book.index'));
    $trail->push('Tambah Data');
});

// book edit
Breadcrumbs::for('admin.book.edit', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push('Buku', route('admin.book.index'));
    $trail->push('Edit Data');
});

// Profile
Breadcrumbs::for('admin.profile', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push('My Profile');
});

// peminjaman buku
Breadcrumbs::for('admin.borrow.index', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push('History Peminjaman', route('admin.borrow.index'));
});

// peminjaman buku
Breadcrumbs::for('admin.borrow.borrowed', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push('Buku yang sedang dipinjam', route('admin.borrow.borrowed'));
});

// report top book
Breadcrumbs::for('admin.report.topBook', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push('Report');
    $trail->push('Buku terbanyak dipinjam');
});

// report top book
Breadcrumbs::for('admin.report.topUser', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push('Report');
    $trail->push('User Interaktif');
});