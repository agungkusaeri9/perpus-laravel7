@extends('admin.templates.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.templates.partials.alerts')
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Judul Buku</th>
                                    <th>Dipinjam</th>
                                    <th>Status</th>
                                    <th style="min-width:100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrows as $borrow)
                                <tr>
                                    <td class="text-center" width="10">{{ $loop->iteration }}</td>
                                    <td>{{ $borrow->user->name }}</td>
                                    <td>{{ $borrow->book->title }}</td>
                                    <td>{{ $borrow->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        @if ($borrow->status == 'belum diambil')
                                        <span class="badge badge-warning">{{ $borrow->status }}</span>    
                                        @else
                                        <span class="badge badge-info">{{ $borrow->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                              <form action="{{ route('admin.borrow.takenBook', $borrow->id) }}" class="d-inline" method="post">
                                                  @csrf
                                                  @method('put')
                                                  <button @if($borrow->status !== 'belum diambil') disabled @endif class="dropdown-item" type="submit"  onclick="return confirm('Apakah yakin sudah diambil?')">Diambil</button>
                                              </form>
                                              <form action="{{ route('admin.borrow.returnBook', $borrow->id) }}" class="d-inline" method="post">
                                                @csrf
                                                @method('put')
                                                <button @if($borrow->returned_at !== NULL || $borrow->status == 'belum diambil') disabled @endif class="dropdown-item" type="submit" onclick="return confirm('Apakah yakin sudah dikembalikan?')">Kembalikan</button>
                                            </form>
                                            </div>
                                          </div>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
      $('#table').DataTable({
      });
    });
  </script>
@endpush