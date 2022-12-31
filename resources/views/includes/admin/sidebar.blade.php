<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <span class="sidebar-brand-full">
            <h5 class="d-flex align-items-center gap-2">
                <img src="{{ asset('bumantara-logo.png') }}" width="30" alt="Bumantara Logo">
                E-Ticket
            </h5>
        </span>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-speedometer') }}"></use>
                </svg> 
                Beranda
            </a>
            <a class="nav-link" href="{{ route('admin.scanner') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-qr-code') }}"></use>
                </svg> 
                Scann Barcode
            </a>
            <a class="nav-link" href="{{ route('admin.event.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-cog') }}"></use>
                </svg> 
                Acara
            </a>
            <a class="nav-link" href="{{ route('admin.ticket.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-people') }}"></use>
                </svg> 
                Status Tamu
            </a>
        </li>
        {{-- Transaction routes --}}
        <li class="nav-title">Transaksi</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.transactions.indexAll') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-bank') }}"></use>
                </svg> 
                Semua data
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.transactions.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-user-x') }}"></use>
                </svg> 
                Verifikasi
                <span class="badge badge-sm bg-info ms-auto">23+</span>
            </a>
        </li>
        {{-- End of Transaction routes --}}
        {{-- Ticket category routes --}}
        <li class="nav-title">Kategori Tiket</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.categories.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-tag') }}"></use>
                </svg> 
                Semua Kategori
                <span class="badge badge-sm bg-info ms-auto">23+</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.categories.create') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-plus') }}"></use>
                </svg> 
                Tambah Kategori
            </a>
        </li>
        {{-- End of Ticket category routes --}}
        {{-- Ticket Package routes --}}
        <li class="nav-title">Paket</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.phases.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-cart') }}"></use>
                </svg> 
                Semua Paket
                <span class="badge badge-sm bg-info ms-auto">23+</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.phases.create') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-plus') }}"></use>
                </svg> 
                Tambah Paket Tiket
            </a>
        </li>
        {{-- End of Ticket Package routes --}}
        {{-- Ticket Package routes --}}
        <li class="nav-title">Daftar Harga</li>
        {{-- Price Lists --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.periods.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-calculator') }}"></use>
                </svg> 
                Semua Harga
                <span class="badge badge-sm bg-info ms-auto">23+</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.periods.create') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-plus') }}"></use>
                </svg> 
                Tambah Harga
            </a>
        </li>
        {{-- end of Price Lists --}}
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>