@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
    </div>
@endsection
