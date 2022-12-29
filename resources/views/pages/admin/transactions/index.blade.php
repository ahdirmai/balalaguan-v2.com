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
                    <th>Status</th>
                    <th>Bukti Pembayaran</th>
                    <th>Aksi</th>
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
                        <td>{{ $t->is_paid == 1 ? 'Sudah Bayar' : 'Belum Bayar' }}</td>
                        <td>
                            {{-- Lihat bukti pembayaran --}}
                            <button type="button" class="btn btn-success" data-coreui-toggle="modal"
                                data-coreui-target="#buktiModal{{ $t->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </button>

                            <!-- Modal Lihat bukti pembayaran -->
                            <x-base.modal-confirm modal-id="buktiModal{{ $t->id }}" title="Konfirmasi"
                                sub-title="Bukti pembayaran pembelian tiket dari {{ $t->user->name }}">
                                <div class="col-12 mb-4">
                                    <div class="mb-2">
                                        <img src="{{ $t->hasMedia('image')? @$t->getMedia('image')->last()->getUrl(): 'https://img.freepik.com/free-vector/realistic-receipt-template_23-2147938550.jpg?w=360' }}"
                                            class="img-thumbnail" alt="...">
                                    </div>
                                </div>
                            </x-base.modal-confirm>
                        </td>
                        <td>
                            {{-- Verifikasi Pembayaran --}}
                            <button type="button" class="btn btn-primary" data-coreui-toggle="modal"
                                data-coreui-target="#verifModal{{ $t->id }}">
                                <i class="fa-solid fa-check"></i>
                            </button>

                            <!-- Modal Verifikasi Pembayaran -->
                            <x-base.modal-confirm modal-id="verifModal{{ $t->id }}" title="Konfirmasi"
                                sub-title="Apakah anda yakin ingin memverivikasi pembelian tiket dari {{ $t->user->name }}">
                                <form action="{{ route('admin.transactions.update', $t->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                                </form>
                            </x-base.modal-confirm>
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
            $('#table').DataTable()
        })
    </script>
@endpush
