@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card-group d-block d-md-flex row">
                <div class="card col-md-7 p-4 mb-0">
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
                                    <button class="btn btn-primary px-4" type="submit">Login</button>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card col-md-5 text-white bg-primary py-5">
                    <div class="card-body text-center">
                        <div>
                            <h2>Sign up</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.</p>
                            <a class="btn btn-lg btn-outline-light mt-3" href="{{ route('register') }}">Register Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
