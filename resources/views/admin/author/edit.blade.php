@extends('admin.templates.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">Edit Data {{ $author->name }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.author.update', $author->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="">Nama Penulis</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $author->name ?? old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('admin.author.index') }}" class="btn btn-sm btn-warning">Kembali</a>
                                <button class="btn btn-sm btn-info">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection