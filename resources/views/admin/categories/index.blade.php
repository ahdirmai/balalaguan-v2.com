@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Tambah Kategori</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Benefit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $c)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->benefit }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $c->id) }}" class="btn btn-warning">Ubah</a>

                            {{-- Delete --}}

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $c->id }}">
                                Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $c->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $c->id }}Label"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModal{{ $c->id }}Label">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus {{ $c->name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.categories.destroy', $c->id) }}" method="post">
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
