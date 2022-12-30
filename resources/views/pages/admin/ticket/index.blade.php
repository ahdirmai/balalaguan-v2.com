@extends('layouts.admin.base')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
    <div class="container">
        <table id="table" class="table table-striped display nowrap" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Waktu Check In</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->transaction->user->name }}</td>
                        <td>{{ $t->transaction->period->category->name }}</td>
                        <td class="text-center">
                            @if ($t->is_paid == 1)
                                <span class="badge text-bg-success">Sudah Check In</span>
                            @else                                
                                <span class="badge text-bg-danger">Belum Check In</span>
                            @endif
                        </td>
                        <td>{{ @$t->is_checked_in==1 ? $t->updated_at : '-' }}</td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
@endpush

@push('script')
    <script>
        $(document).ready( function() {
            $('#table').DataTable({
                scrollX: true
            })
        })
    </script>
@endpush