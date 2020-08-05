@extends('frontend.templates.default')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card mb-3" style="">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="{{ $book->getCover() }}" class="card-img" alt="..." style="height: 350px;">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{ $book->title }}</h5>
                          <div class="info mb-2">
                            <span class="mr-2"><i>Penulis</i> <b>{{ $book->author->name }}</b></span>
                            <span><i>Stok</i> <b>{{ $book->qty }}</b></span>
                          </div>
                          <p class="card-text">{{ Str::limit($book->description,700,'.') }}</p>
                          <div class="d-flex justify-content-between">
                            <p class="card-text"><small class="text-muted">Dibuat {{ $book->created_at->diffForHumans() }}</small></p>
                            <form action="{{ route('borrow.history', $book->slug) }}" method="post">
                                @csrf
                                <button class="btn btn-primary">Pinjam Buku</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb-2">Karya buku {{ $book->author->name }} lainnya.</h4>
            </div>
        </div>
        <div class="row">
            @foreach ($book->author->books->shuffle()->take(10) as $books)
            <div class="col-lg-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ $books->getCover() }}" class="card-img" alt="..." style="max-height: 200px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $books->title }}</h5>
                                <p class="card-text">{{ Str::limit($books->description,80) }}</p>
                                <p class="card-text"><small class="text-muted">Dibuat {{ $book->created_at->diffForHumans() }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection