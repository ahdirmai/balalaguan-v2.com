@extends('layouts.user.base')

@section('outer')
    <x-user.hero-section>
        <x-base.header-navigation title="Pesanan anda" />
        <section class="mt-2 border rounded-3 px-4 pt-3">
            <x-user.transaction-card />
            <x-user.transaction-card />
        </section>
    </x-user.hero-section>
@endsection