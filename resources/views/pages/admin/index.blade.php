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

                <x-dashboard.card-widget card-title="{{ $tickets_sold_festival }}" card-subtitle="Tiket Festival terjual"
                card-colour="bg-info" useDropdown="false" />

                <x-dashboard.card-widget card-title="{{ $tickets_sold_vip }}" card-subtitle="Tiket VIP terjual"
                card-colour="bg-info" useDropdown="false" />

                <x-dashboard.card-widget card-title="{{ $stock_ticket_festival }}" card-subtitle="Stok Tiket Festival"
                card-colour="bg-info" useDropdown="false" />

                <x-dashboard.card-widget card-title="{{ $stock_ticket_vip }}" card-subtitle="Stok Tiket VIP"
                card-colour="bg-info" useDropdown="false" />
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
