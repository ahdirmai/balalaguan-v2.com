@extends('layouts.admin.base')

@section('content')
    <section class="container-lg">
        <h5>Statistik</h5>
        <p>Statistik penjualan tiket</p>
        <section class="row mb-4">
            {{-- Amount of Stock Ticket --}}
            <x-dashboard.card-widget card-title="{{ $stock }}" card-colour="bg-primary" useDropdown="false"
                card-subtitle="Stock Ticket" />
                {{-- Amount of Tickets Sold --}}
                <x-dashboard.card-widget card-title="{{ $tickets_sold }}" card-subtitle="Tiket terjual" card-colour="bg-warning"
                useDropdown="false" />
                {{-- Amount of User Register --}}
                <x-dashboard.card-widget card-title="{{ $user_registered }}" card-subtitle="Pengguna yang mendaftar"
                card-colour="bg-success" useDropdown="false" />
                {{-- Amount of Successful Transaction --}}
                <x-dashboard.card-widget card-title="{{ $tickets_sold_today }}" card-subtitle="Tiket terjual hari ini"
                card-colour="bg-info" useDropdown="false" />
                <h3>Tiket Festival terjual : {{ $tickets_sold_festival }}</h3>
                <h3>Tiket VIP terjual : {{ $tickets_sold_vip }}</h3>

                <h3>Stok Tiket Festival : {{ $stock_ticket_festival }}</h3>
                <h3>Stok Tiket VIP : {{ $stock_ticket_vip }}</h3>
        </section>
        {{-- All availabel Package --}}
        <section class="row">
            <h5>Semua Paket</h5>
            <p>List harga tiket beserta stoknya</p>
            @foreach ($periods as $key => $prd)
                <x-dashboard.card-package-ticket name="{{ $prd[0]->phase->name }}" :periods="$prd" />
            @endforeach
        </section>
    </section>
@endsection
