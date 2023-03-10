<div class="col-sm-4 col-lg-3">
    <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
        <div class="card-header position-relative d-flex justify-content-center align-items-center">
            <svg class="icon icon-3xl text-white my-4">
                <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-puzzle') }}"></use>
            </svg>
        </div>
        <div class="text-center pt-2">
            <h5>{{ $name }}</h5>
        </div>
        @foreach ($periods as $period)
            <div class="card-body row text-center">
                <div class="col">
                    <p class="fs-5 fw-semibold">IDR {{ number_format($period->price, 0, '.', '.') }}</p>
                    <div class="text-uppercase text-medium-emphasis small">{{ $period->category->name }}</div>
                </div>
                <div class="vr"></div>
                <div class="vr"></div>
                <div class="col">
                    <p class="fs-5 fw-semibold">{{ $period->stock }}</p>
                    <div class="text-uppercase text-medium-emphasis small">Stock</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
