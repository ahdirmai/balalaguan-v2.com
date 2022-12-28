@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="clearfix">
        <h1 class="float-start display-3 me-4">404</h1>
        <h4 class="pt-3">Oops! You're lost.</h4>
        <p class="text-medium-emphasis">The page you are looking for was not found.</p>
        </div>
        <div class="input-group"><span class="input-group-text">
            <svg class="icon">
            <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-magnifying-glass') }}"></use>
            </svg></span>
        <input class="form-control" id="prependedInput" size="16" type="text" placeholder="What are you looking for?">
        <button class="btn btn-info" type="button">Search</button>
        </div>
    </div>
    </div>
@endsection