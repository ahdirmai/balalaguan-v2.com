@extends('layouts.admin.base')

@section('content')
    <section class="container mb-5">
        <section class="row">
            <section class="col-md-7 mx-auto">
                <h4 class="text-center">Scanner</h4>
                {{-- reader --}}
                <section id="reader"></section>
                {{-- form --}}
                <form class="d-none" action="{{ route('admin.ticket.check-in') }}" id="form" method="POST">
                    @csrf
                    <input type="text" name="decoded" id="decoded">
                </form>
            </section>
        </section>
    </section>
@endsection

@push('script')
    @vite('resources/js/scanner/main.js')
@endpush