@extends('layouts.admin.base')

@push('style')
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
    <div class="container">
        <table id="table" class="table table-striped" style="width: 100%">
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
                        <td>{!! $c->benefit !!}</td>
                        <td>
                            <section>
                                {{-- Edit --}}
                                <a href="{{ route('admin.categories.edit', $c->id) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                {{-- Delete --}}
                                <button type="button" class="btn btn-danger"  data-coreui-toggle="modal"
                                data-coreui-target="#deleteModal{{ $c->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </section>

                            <!-- Modal -->
                            <x-base.modal-confirm modal-id="deleteModal{{ $c->id }}" title="Konfirmasi" sub-title="Apakah anda yakin ingin menghapus {{ $c->name }} ?">
                                <form action="{{ route('admin.categories.destroy', $c->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
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