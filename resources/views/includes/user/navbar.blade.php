<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg  fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Balalaguan Music Festival</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0 d-flex align-items-center">
                <li class="nav-item"><a class="nav-link" href="#services">Hubungi Kami</a></li>
                @if ( auth()->check() )
                <li class="nav-item dropdown">
                    <img style="cursor: pointer" class="img-thumbnail rounded-circle dropdown-toggle" width="40" height="40" src="{{ asset('/core-ui/img/avatars/2.jpg') }}" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a href="{{ route('user.profile') }}" class="dropdown-item {{ Request::routeIs('user.profile') ? 'active' : '' }}">
                                <small class="text-muted">Akun</small>
                                <br>
                                <small>{{ Str::limit(auth()->user()->name, 15) }}</small>
                            </a>
                        </li>
                        <li><a class="dropdown-item {{ Request::routeIs('user.transaction.index') ? 'active' : '' }}" href="{{ route('user.transaction.index') }}">Pesanan</a></li>
                        <li><a class="dropdown-item {{ Request::routeIs('user.ticket.index') ? 'active' : '' }}" href="{{ route('user.ticket.index') }}">Tiket</a></li>
                        <li>
                            <a class="dropdown-item text-danger" href="" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                            {{-- Logout form --}}
                            <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>