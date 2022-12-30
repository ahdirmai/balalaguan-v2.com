<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">Balalaguan Music Festival</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0 d-flex align-items-center">
                <li class="nav-item"><a class="nav-link" href="#about">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Hubungi Kami</a></li>
                @if ( auth()->check() )
                <li class="nav-item dropdown">
                    <img style="cursor: pointer" class="img-thumbnail rounded-circle dropdown-toggle" width="40" height="40" src="{{ asset('/core-ui/img/avatars/2.jpg') }}" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <span class="dropdown-item">
                                <small class="text-muted">Akun</small>
                                <br>
                                <small>{{ Str::limit(auth()->user()->name, 15) }}</small>
                            </span>
                        </li>
                        <li><a class="dropdown-item" href="#">Pesanan</a></li>
                        <li><a class="dropdown-item" href="#">Tiket</a></li>
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