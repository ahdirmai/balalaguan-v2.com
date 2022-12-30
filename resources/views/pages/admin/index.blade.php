@extends('layouts.admin.base')

@section('content')
    <section class="container-lg">
        <h5>Overview</h5>
        <p>Consectetur deserunt Lorem nostrud minim elit non exercitation ut officia. Laboris aliquip sit laboris nulla deserunt officia commodo.</p>
        <section class="row mb-4">
            {{-- Amount of Stock Ticket --}}
            <x-dashboard.card-widget card-title="4968" card-subtitle="Stock Ticket" card-colour="" useDropdown="false"/>
            {{-- Amount of Tickets Sold --}}
            <x-dashboard.card-widget card-title="1230" card-subtitle="Tickets Sold" card-colour="bg-warning" useDropdown="false"/>
            {{-- Amount of User Register --}}
            <x-dashboard.card-widget card-title="968" card-subtitle="User Register" card-colour="bg-success" useDropdown="false"/>
            {{-- Amount of Successful Transaction --}}
            <x-dashboard.card-widget card-title="40" card-subtitle="Sold Out Today" card-colour="bg-info" useDropdown="false"/>
        </section>
        {{-- All availabel Package --}}
        <section class="row">
            <h5>All Package Tickets</h5>
            <p>Ullamco Lorem nulla nisi mollit incididunt nulla laboris consectetur consequat.</p>
            <x-dashboard.card-package-ticket />
            <x-dashboard.card-package-ticket />
            <x-dashboard.card-package-ticket />
            <x-dashboard.card-package-ticket />
        </section>
    </section>
@endsection