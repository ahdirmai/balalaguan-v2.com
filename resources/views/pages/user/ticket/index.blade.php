@extends('layouts.user.base')

@section('outer')
    <x-user.hero-section>
        <x-base.header-navigation title="Inventaris Tiket" />
        <section class="row justify-content-between mt-2 border rounded-3 px-4 pt-3">
            @if (count($tickets) > 0)
                @foreach ($tickets as $ticket)
                    @foreach ($ticket->tickets as $t)
                        <x-base.ticket-card :id="$t->id" :fullname="$ticket->user->name" :nik="$ticket->user->nik" :email="$ticket->user->email" :telephone="$ticket->user->phone" :qrcode="base64_encode($t->token)" :date="$t->updated_at" :isCheckIn="$t->is_checked_in" :category="$ticket->period->category->name" />
                    @endforeach
                @endforeach
            @else
                <span class="text-center text-light">
                    <p>
                        Ups, anda belum mempunyai tiket saat ini, yuuk mulai buat pesanan anda <a class="text-brand-red" href="{{ route('landing-page').'/#ticket' }}">disini</a>
                    </p>
                </span>
            @endif
        </section>
    </x-user.hero-section>
@endsection

@push('script')
    @vite('resources/js/pusher.js')
@endpush