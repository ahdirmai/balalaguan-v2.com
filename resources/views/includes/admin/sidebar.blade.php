<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="{{ asset('/core-ui/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="{{ asset('/core-ui/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-speedometer') }}"></use>
                </svg> 
                Dashboard
            </a>
        </li>
        {{-- Transaction routes --}}
        <li class="nav-title">Transactions</li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-bar-chart') }}"></use>
                </svg> 
                All Records 
                <span class="badge badge-sm bg-info ms-auto">23+</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-user-x') }}"></use>
                </svg> 
                Unverified
                <span class="badge badge-sm bg-info ms-auto">23+</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-user') }}"></use>
                </svg> 
                Accounts
                <span class="badge badge-sm bg-info ms-auto">23+</span>
            </a>
        </li>
        {{-- End of Transaction routes --}}
        {{-- Ticket Package routes --}}
        <li class="nav-title">Ticket Package</li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-bar-chart') }}"></use>
                </svg> 
                All Records
                <span class="badge badge-sm bg-info ms-auto">23+</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-plus') }}"></use>
                </svg> 
                Add New Package
            </a>
        </li>
        {{-- End of Ticket Package routes --}}
        {{-- Ticket category routes --}}
        <li class="nav-title">Categories Ticket</li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-bar-chart') }}"></use>
                </svg> 
                All Records
                <span class="badge badge-sm bg-info ms-auto">23+</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-plus') }}"></use>
                </svg> 
                Add New Category
            </a>
        </li>
        {{-- End of Ticket category routes --}}
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>