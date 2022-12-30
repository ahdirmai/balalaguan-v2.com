@extends('layouts.user.base')

@section('outer')
    <x-user.hero-section>
        <x-base.header-navigation title="Inventaris Tiket" />
        <section class="row justify-content-between mt-2 border rounded-3 px-4 pt-3">
            @foreach ($tickets as $ticket)
                @foreach ($ticket->tickets as $t)
                    <x-base.ticket-card :id="$t->id" :fullname="$ticket->user->name" :email="$ticket->user->email" :telephone="$ticket->user->phone" :qrcode="base64_encode($t->token)" :date="$t->updated_at" :isCheckIn="$t->is_checked_in" />
                @endforeach
            @endforeach
            {{-- <x-base.ticket-card id="2" /> --}}
        </section>
    </x-user.hero-section>
@endsection
