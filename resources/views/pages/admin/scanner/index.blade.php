@extends('layouts.admin.base')

@section('content')
    <section class="container mb-5">
        <section class="row">
            <section class="col-md-7 mx-auto">
                <h4 class="text-center">Scanner</h4>
                {{-- reader --}}
                <section id="reader"></section>
                {{-- form --}}
                <form class="d-none" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="ticket_id" id="ticket_id">
                </form>
            </section>
        </section>
    </section>
@endsection

@push('script')
    @vite('resources/js/scanner/main.js')
@endpush