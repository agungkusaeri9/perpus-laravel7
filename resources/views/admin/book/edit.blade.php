@extends('admin.templates.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Tambah Data</div>
                    <div class="card-body">
                        <form action="{{ route('admin.book.update', $book->slug) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="">Judul Buku</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $book->title ?? old('title') }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ $book->description ?? old('description') }}</textarea>

                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Buku</label>
                                <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ $book->qty ?? old('qty') }}">
                                @error('qty')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Penulis</label>
                                <select name="author" id="" class="form-control">
                                    @foreach ($authors as $author)
                                    <option @if($author->id == $book->author_id) selected @endif value="{{ $author->id }}">{{ $author->name }}</option>
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('author')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group row">  
                                <div class="col-lg-4 mb-2">
                                    <img src="{{ $book->getCover() }}" class="img-fluid" style="max-width:150px">
                                </div>
                                <div class="col-lg-8">
                                    <label for="">Edit Cover</label>
                                    <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">
                                    @error('cover')
                                    <div class="invalid-feedback  d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('admin.book.index') }}" class="btn btn-sm btn-warning">Kembali</a>
                                <button class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection