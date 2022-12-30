@extends('layouts.user.base')

@section('outer')
    <x-user.hero-section>
        <x-base.header-navigation title="Inventaris Tiket"/>
        <section class="row justify-content-between mt-2 border rounded-3 px-4 pt-3">
            <x-base.ticket-card id="1"/>
            <x-base.ticket-card id="2"/>
        </section>
    </x-user.hero-section>
@endsection