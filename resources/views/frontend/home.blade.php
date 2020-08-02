@extends('frontend.templates.default')
@section('content')
<div class="container">
    <div class="row">
        <h2>History Peminjaman</h2>
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
                        <small class="badge badge-info">{{ $borrow->status }}</small>
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

