@extends('frontend.templates.default')
@section('content')
    <div class="container mt-4">
        <div class="row mt-4 mb-2">
            <div class="col-lg-8">
                <h4>Koleksi Buku</h4>
            </div>
            <div class="col-lg-4">
                <form class="my-2 my-lg-0" method="get" action="{{ route('book.search') }}">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari judul buku..."  aria-describedby="button-addon2" name="keyword">
                        <div class="input-group-append">
                          <button class="btn bg-primary" type="button" id="button-addon2">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">

            @if ($books->isEmpty())
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    Data tidak ditemukan!
                </div>
            </div>
            @endif
            
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
<script src="{{ asset('assets/bootstrap4/js/sweetalert.min.js') }}"></script>
@include('frontend.templates.partials.sweetalerts')
@endpush

