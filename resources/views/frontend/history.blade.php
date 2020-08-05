@extends('frontend.templates.default')
@section('content')
<div class="container" style="min-height:580px;">
    <div class="row">
        <div class="col-lg-12 mt-4 mb-2">
            <h4>History Peminjaman</h4>
        </div>
    </div>
    <div class="row">
        @if ($borrows->isEmpty())
        <div class="alert alert-danger">
            Anda belum melakukan peminjaman.
        </div>
        @endif
    </div>
    <div class="row">
        @foreach ($borrows as $borrow)
            <div class="col-lg-4">
                <div class="card mb-3">
                    <img src="{{ $borrow->book->getCover() }}" class="card-img-top" alt="..." height="250">
                    <div class="card-body" style="min-height: 260px;">
                    <h5 class="card-title">{{ Str::limit($borrow->book->title,100,'') }}</h5>
                    <div class="info d-flex justify-content-between mb-2">
                        <small class="mr-2"><i>Penulis</i> <b>{{ $borrow->book->author->name }}</b></small>
                        <small><i>Stok</i> <b>{{ $borrow->book->qty }}</b></small>
                        @if ($borrow->status == 'sudah dikembalikan')
                        <small class="badge badge-success">{{ $borrow->status }}</small>
                        @elseif($borrow->status == 'belum diambil')
                        <small class="badge badge-danger">{{ $borrow->status }}</small>
                        @elseif($borrow->status == 'sudah dikembalikan')
                        <small class="badge badge-danger">{{ $borrow->status }}</small>
                        @endif
                    </div>
                    <p class="card-text">{{ Str::limit($borrow->book->description,100) }}</p>
                        <p class="card-text"><small class="text-muted">Dipinjam {{ $borrow->created_at->diffForHumans() }}</small></p>
                        @if ($borrow->status == 'belum diambil')
                        <div class="float-right">
                            <form action="{{ route('borrow.cancel', $borrow->id) }}" class="d-inline" method="post">
                                @csrf
                                @method('patch')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin membatalkan peminjaman?')">Batalkan</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection


@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('frontend.templates.partials.sweetalerts')
@endpush

