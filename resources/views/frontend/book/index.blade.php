@extends('frontend.templates.default')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <h3>Koleksi Buku</h3>
            </div>
            @foreach ($books as $book)
            <div class="col-lg-4">
                <div class="card mb-3">
                    <a href="{{ route('book.show', $book->slug) }}" title="{{ $book->title }}">
                        <img src="{{ $book->getCover() }}" class="card-img-top" alt="..." height="250">
                    </a>
                    <div class="card-body" style="min-height: 260px;">
                      <h5 class="card-title">{{ Str::limit($book->title,100,'') }}</h5>
                      <div class="info d-flex justify-content-between mb-2">
                        <span class="mr-2"><i>Penulis</i> <b>{{ $book->author->name }}</b></span>
                        <span><i>Stok</i> <b>{{ $book->qty }}</b></span>
                      </div>
                      <p class="card-text">{{ Str::limit($book->description,100) }}</p>
                        <p class="card-text"><small class="text-muted">Dibuat {{ $book->created_at->diffForHumans() }}</small></p>
                        <form action="{{ route('borrow.history', $book->slug) }}" method="post" class="float-right">
                            @csrf
                            <button class="btn btn-primary">Pinjam Buku</button>
                        </form>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection


@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('frontend.templates.partials.sweetalerts')
@endpush

