<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-menu') }}"></use>
            </svg>
        </button>
        <a class="header-brand d-md-none mx-auto align-middle" href="#">
            {{-- <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('bumantara-logo.png') }}"></use>
            </svg> --}}
            <h3  class="m-0">Balalaguan</h3>
        </a>
        {{-- <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
        </ul> --}}
        {{-- <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-bell') }}"></use>
                    </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-list-rich') }}"></use>
                    </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-envelope-open') }}"></use>
                    </svg></a></li>
        </ul> --}}
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md"><img class="avatar-img"
                            src="{{ auth()->user()->get_image }}" alt="user@email.com"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header py-2">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                            <svg class="icon me-2">
                                <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-account-logout') }}"></use>
                            </svg>
                            Logout
                            {{-- Logout form --}}
                            <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </a>
                    </div>
            </li>
        </ul>
    </div>
    {{-- <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <!-- if breadcrumb is single--><span>Home</span>
                </li>
                <li class="breadcrumb-item active"><span>Dashboard</span></li>
            </ol>
        </nav>
    </div> --}}
</header>
