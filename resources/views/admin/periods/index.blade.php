@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.periods.create') }}" class="btn btn-primary">Tambah Periode</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Diskon</th>
                    <th>Stok</th>
                    <th>Waktu dimulai</th>
                    <th>Waktu berakhir</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periods as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->discount }}%</td>
                        <td>{{ $p->stock }}</td>
                        <td>{{ $p->start }}</td>
                        <td>{{ $p->end }}</td>
                        <td>{{ $p->is_active==1 ? 'Aktif' : 'Non-Aktif' }}</td>
                        <td>
                            <a href="{{ route('admin.periods.edit', $p->id) }}" class="btn btn-warning">Ubah</a>

                            {{-- Delete --}}

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $p->id }}">
                                Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $p->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $p->id }}Label"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModal{{ $p->id }}Label">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus {{ $p->name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.periods.destroy', $p->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
