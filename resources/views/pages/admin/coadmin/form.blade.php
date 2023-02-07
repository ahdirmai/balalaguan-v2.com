@extends('layouts.admin.base')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4 m-4">
                <div class="card-body p-4">
                    <h1>Co-Admin</h1>
                    <p class="text-medium-emphasis">Create co-admin account</p>
                    <form action="{{ route('admin.coadmin.store') }}" method="post">
                        @csrf
                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-user') }}"></use>
                                </svg></span>
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                placeholder="Fullname" name="name" value="{{ old('name') }}" required>
                        </div>

                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-envelope-open') }}"></use>
                                </svg></span>
                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                placeholder="Email" name="email" value="{{ old('email') }}" required>
                        </div>

                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-lock-locked') }}"></use>
                                </svg></span>
                            <input minlength="8" class="form-control @error('password') is-invalid @enderror"
                                type="password" placeholder="Password" name="password" required>
                        </div>

                        @error('password_confirmation')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-lock-locked') }}"></use>
                                </svg></span>
                            <input id="password-confirm"
                                class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                                minlength="8" placeholder="Repeat password" name="password_confirmation"
                                autocomplete="new-password" required>
                        </div>

                        @error('nik')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-lock-locked') }}"></use>
                                </svg></span>
                            <input class="form-control @error('nik') is-invalid @enderror" type="number" placeholder="NIK"
                                name="nik" maxlength="16" minlength="16" value="{{ old('nik') }}" required>
                        </div>

                        @error('phone')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-phone') }}"></use>
                                </svg></span>
                            <input class="form-control @error('phone') is-invalid @enderror" type="number"
                                placeholder="Phone" name="phone" value="{{ old('phone') }}" required>
                        </div>

                        @error('address')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-home') }}"></use>
                                </svg></span>
                            <input class="form-control @error('address') is-invalid @enderror" type="text"
                                placeholder="Alamat" name="address" value="{{ old('address') }}" required>
                        </div>

                        <button class="btn btn-block btn-success text-light mb-2" type="submit">Buat akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                scrollX: true
            })
        })
    </script>
@endpush
