@extends('layouts.user.base')

@section('outer')
    <x-user.hero-section>
        <x-base.header-navigation title="Pesanan anda" />
        <section class="mt-2 border rounded-3 px-4 pt-3">
            @if (count($transactions) > 0)
                @foreach ($transactions as $tr)
                    <x-user.transaction-card :id="$tr->id" :package="$tr->period->phase->name" :category="$tr->period->category->name" :amount="$tr->quantity" :timestamp="$tr->created_at" :isVerified="$tr->is_verified" />
                @endforeach
            @else
                <span class="text=center text-light">
                    <p>
                        Ups, anda belum mempunyai pesanan saat ini, yuuk mulai buat pesanan anda <a class="text-brand-red" href="{{ route('landing-page') }}">disini</a>
                    </p>
                </span>
            @endif
        </section>
    </x-user.hero-section>
@endsection
