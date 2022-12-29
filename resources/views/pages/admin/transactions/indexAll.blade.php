@extends('layouts.admin.base')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
    <div class="container">
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pembeli</th>
                    <th>Kategori</th>
                    <th>Paket</th>
                    <th>Jumlah Tiket</th>
                    <th>Total Bayar</th>
                    <th>Tanggal</th>
                    <th>Status Pembayaran</th>
                    <th>Status Verifikasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->user->name }}</td>
                        <td>{{ $t->period->category->name }}</td>
                        <td>{{ $t->period->phase->name }}</td>
                        <td>{{ $t->quantity }}</td>
                        <td>{{ $t->quantity * $t->period->price }}</td>
                        <td>{{ date('l, j F Y H:i', strtotime($t->created_at)) }}</td>
                        <td>{{ $t->is_paid == 1 ? 'Sudah Bayar' : 'Belum Bayar' }}</td>
                        <td>{{ $t->is_verified == 1 ? 'Sudah terverifikasi' : 'Belum terverifikasi' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable()
        })
    </script>
@endpush
