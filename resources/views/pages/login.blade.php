@extends('layouts.app')

@section('content')
    <div class="p-3 row justify-content-center">
        <div class="col-lg-8">
            <div class="card-group d-block d-md-flex row">
                <div class="card col-md-7 p-4 mb-md-0 mb-sm-2">
                    <div class="card-body">
                        <h1>Login</h1>
                        <p class="text-medium-emphasis">Sign In to your account</p>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            {{-- email --}}
                            <div class="input-group mb-4"><span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-lock') }}-locked"></use>
                                    </svg></span>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                    value="{{ @old('email') }}" name="email" placeholder="Email">
                            </div>
                            {{-- error --}}
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- end of email --}}
                            {{-- password --}}
                            <div class="input-group mb-3"><span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-user') }}"></use>
                                    </svg></span>
                                <input name="password" class="form-control  @error('password') is-invalid @enderror"
                                    type="password" placeholder="Password" value="{{ old('password') }}">
                            </div>
                            {{-- error --}}
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- end of password --}}
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn px-3 text-light bg-brand-red px-4" type="submit">Login</button>
                                </div>
                                <div class="col-6 text-end">
                                    {{-- <button class="btn btn-link px-0" type="button">Forgot password?</button> --}}
                                    <a class="btn btn-link px-0" href="{{ route('password.request') }}">Forgot password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card col-md-5 text-white bg-brand-red py-5">
                    <div class="card-body text-center">
                        <div>
                            <h2>Belum punya akun ?</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.</p>
                            <a class="btn btn-lg btn-outline-light mt-3" href="{{ route('register') }}">Daftar Sekarang!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let bg = document.querySelector('.bg-light');
        bg.style.backgroundImage = "url('{{ asset('img/concert-layer.png') }}')";
        bg.style.backgroundSize = "cover";
        bg.style.backgroundRepeat = "no-repeat";
        bg.style.minHeight = "120vh";
    </script>
@endsection
