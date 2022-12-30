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
                    <th>Nama Paket</th>
                    <th>Waktu dimulai</th>
                    <th>Waktu berakhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($phases as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->start }}</td>
                        <td>{{ $p->end }}</td>
                        <td>
                            {{-- Update --}}
                            <a href="{{ route('admin.phases.edit', $p->id) }}" class="btn btn-primary">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                            {{-- Delete --}}
                            <button type="button" class="btn btn-danger" data-coreui-toggle="modal"
                                data-coreui-target="#deleteModal{{ $p->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                            <!-- Modal -->
                            <x-base.modal-confirm modal-id="deleteModal{{ $p->id }}" title="Konfirmasi" sub-title="Apakah anda yakin ingin menghapus paket {{ $p->name }}">
                                <form action="{{ route('admin.phases.destroy', $p->id) }}" method="post">
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