<section class="col-12 bg-light p-4 rounded-3 border d-flex justify-content-between">
    <span class="d-flex gap-2 align-items-center">
        <a class="btn" href="{{ URL::previous() }}">
            <i class="fa-solid fa-long-arrow-left"></i>
        </a>
        <h5 class="mb-0">{{ $title }}</h5>
    </span>
    <a href="{{ route('landing-page') }}" class="btn"><i class="fa-solid fa-home"></i></a>
</section>