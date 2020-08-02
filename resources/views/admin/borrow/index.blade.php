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
                                    <th>User</th>
                                    <th>Judul Buku</th>
                                    <th>Dipinjam</th>
                                    <th>Status</th>
                                    <th>Dikembalikan</th>
                                    <th>Admin</th>
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
                                    <td>{{ $borrow->status }}</td>
                                    <td>
                                        @if ($borrow->returned_at == null)
                                            -
                                        @else
                                        {{ $borrow->returned_at->format('d/m/Y') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($borrow->received_by == null)
                                            -
                                        @else
                                        {{ $borrow->received_by }}
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.borrow.destroy', $borrow->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin ingin menghapus ini?')">Delete</button>
                                        </form>
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