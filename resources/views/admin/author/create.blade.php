@extends('admin.templates.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">Tambah Data</div>
                    <div class="card-body">
                        <form action="{{ route('admin.author.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Penulis</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('admin.author.index') }}" class="btn btn-sm btn-warning">Kembali</a>
                                <button class="btn btn-sm btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

