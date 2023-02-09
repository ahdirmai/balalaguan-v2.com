@extends('layouts.coadmin.base')

@push('style')
    <style>
        @keyframes spinner {
            from {
                transform: rotate(360deg)
            }

            to {
                transform: rotate(0)
            }
        }

        .animated--spinner {
            animation: spinner 2s infinite;
        }
    </style>
@endpush

@section('content')
    <section class="container mb-5">
        <section class="row">
            <section class="col-md-7 mx-auto">
                <h4 class="text-center">Scanner</h4>
                {{-- reader --}}
                <section id="reader"></section>
                <section class="text-center p-4 d-none" id="loading">
                    <i class="fa-solid fa-spinner fs-1 animated--spinner"></i>
                    <p>Sedang diproses</p>
                </section>
                <input type="hidden" id="role" value="{{ Auth::user()->roles->first()->name }}">
            </section>
        </section>
    </section>
@endsection

@push('script')
    @vite('resources/js/scanner/main.js')
@endpush
