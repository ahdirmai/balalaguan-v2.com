@extends('layouts.user.base')

@section('outer')
    <x-user.hero-section>
        <x-base.header-navigation title="Profile Akun"/>
        <section class="row justify-content-between bg-light mt-2 border rounded-3 px-4 py-3">
            <section class="col-12 mb-4 d-flex flex-column justify-content-between flex-lg-row">
                <span>
                    <small class="text-muted">Nama</small>
                    <h6 class="text-break">{{ auth()->user()->name }}</h6>
                </span>
                <span>
                    <small class="text-muted">NIK</small>
                    <h6 class="text-break">{{ auth()->user()->nik }}</h6>
                </span>
                <span>
                    <small class="text-muted">Telepon</small>
                    <h6 class="text-break">{{ auth()->user()->phone }}</h6>
                </span>
                <span>
                    <small class="text-muted">Email</small>
                    <h6 class="text-break">{{ auth()->user()->email }}</h6>
                </span>
                <span>
                    <small class="text-muted">Alamat</small>
                    <h6 class="text-break">{{ auth()->user()->address }}</h6>
                </span>
            </section>
            <a href="{{ route('user.profile.edit', 1) }}" class="col btn btn-danger">Ubah data profile</a>
        </section>
    </x-user.hero-section>
@endsection