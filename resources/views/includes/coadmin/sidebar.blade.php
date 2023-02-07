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
            <a class="nav-link" href="{{ route('coadmin.scanner') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-qr-code') }}"></use>
                </svg> 
                Scan Barcode
            </a>
            <a class="nav-link" href="{{ route('coadmin.ticket.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-people') }}"></use>
                </svg> 
                Status Tamu
            </a>
        </li>

    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>