@extends('layouts.admin.base')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
    <div class="container">
        <section class="col mb-3">
            <butto class="btn btn-danger">Hapus semua</butto>
        </section>
        <table id="table" class="table table-striped display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pembeli</th>
                    <th>NIK</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Paket</th>
                    <th>Kategori</th>
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
                        <td>{{ $t->user->nik }}</td>
                        <td>{{ $t->user->email }}</td>
                        <td>{{ $t->user->phone }}</td>
                        <td>{{ $t->period->category->name }}</td>
                        <td>{{ $t->period->phase->name }}</td>
                        <td class="text-center">{{ $t->quantity }} tiket</td>
                        <td>Rp {{ number_format($t->quantity * $t->period->price, 0, '.', '.') }}</td>
                        <td>{{ date('l, j F Y H:i', strtotime($t->created_at)) }}</td>
                        <td class="text-center">
                            @if ($t->is_paid == 1)
                                <span class="badge text-bg-success">Sudah bayar</span>
                            @else                                
                                <span class="badge text-bg-danger">Belum bayar</span>
                            @endif
                        <td class="text-center">
                            @if ($t->is_verified == 1)
                                <span class="badge text-bg-success">Sudah terverifikasi</span>
                            @else                                
                                <span class="badge text-bg-danger">Belum terverifikasi</span>
                            @endif
                        </td>
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
            $('#table').DataTable({
                scrollX: true
            })
        })
    </script>
@endpush
