@extends('layouts.admin.base')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
    <div class="container">
        <table id="table" class="table table-striped  display nowrap" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pembeli</th>
                    <th>NIK</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Kategori</th>
                    <th>Paket</th>
                    <th>Jumlah Tiket</th>
                    <th>Total Bayar</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->user->name }}</td>
                        <td>{{ $t->user->nik }}</td>
                        <td>{{ $t->user->phone }}</td>
                        <td>{{ $t->user->email }}</td>
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
                        </td>
                        <td>
                            <section class="d-flex gap-2 align-items-center">
                                {{-- Lihat bukti pembayaran --}}
                                <button title="Lihat bukti pembayaran" type="button" class="btn btn-success"
                                    data-coreui-toggle="modal" data-coreui-target="#buktiModal{{ $t->id }}">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                @if ($t->is_verified == 0)
                                    {{-- Verifikasi Pembayaran --}}
                                    <button type="button" title="Verifikasi pembayaran" class="btn btn-primary"
                                        data-coreui-toggle="modal" data-coreui-target="#verifModal{{ $t->id }}">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                @endif

                                @if ($t->is_verified == 0 && $t->is_accepted == 0)
                                {{-- Reject Pembayaran --}}
                                <button type="button" title="Reject pembayaran" class="btn btn-danger"
                                    data-coreui-toggle="modal" data-coreui-target="#rejectModal{{ $t->id }}">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                @endif
                            </section>

                            <!-- Modal Lihat bukti pembayaran -->
                            <x-base.modal modal-id="buktiModal{{ $t->id }}"
                                title="Bukti pembayaran dari {{ $t->user->name }}">
                                <div class="col-12 mb-4">
                                    <div class="mb-2">
                                        <img src="{{ $t->hasMedia('image')? @$t->getMedia('image')->last()->getUrl(): 'https://t3.ftcdn.net/jpg/04/87/13/44/360_F_487134492_svhGzEgDXKyQuuPXQrs7prKoBYWCEJdw.jpg' }}"
                                            class="" style="width: 100%" alt="...">
                                    </div>
                                </div>
                            </x-base.modal>
                            @if ($t->is_verified == 0)
                                <!-- Modal Verifikasi Pembayaran -->
                                <x-base.modal-confirm modal-id="verifModal{{ $t->id }}" title="Konfirmasi"
                                    sub-title="Apakah anda yakin ingin memverivikasi pembelian tiket dari {{ $t->user->name }}">
                                    <form action="{{ route('admin.transactions.update', $t->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="quantity" value="{{ $t->quantity }}">
                                        <input type="hidden" name="period_id" value="{{ $t->period->id }}">
                                        <input type="hidden" name="chance_id" value="{{ $t->user->chances[0]->id }}">
                                        <button type="submit" class="btn btn-primary">Verifikasi</button>
                                    </form>
                                </x-base.modal-confirm>
                            @endif

                            @if ($t->is_verified == 0 && $t->is_accepted == 0)
                                <!-- Modal Verifikasi Pembayaran -->
                                <x-base.modal-confirm modal-id="rejectModal{{ $t->id }}" title="Konfirmasi"
                                    sub-title="Apakah anda yakin ingin menolak pembelian tiket dari {{ $t->user->name }}">
                                    <form action="{{ route('admin.transactions.reject', $t->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Reject</button>
                                    </form>
                                </x-base.modal-confirm>
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
