<div class="col-sm-6 col-lg-3">
    <div class="card mb-4 text-white {{ $cardColour }}">
        <div class="card-body d-flex justify-content-between align-items-start">
            <div>
                <div class="fs-4 fw-semibold">
                    <svg class="icon">
                        <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-bar-chart') }}"></use>
                    </svg>
                    {{ $cardTitle }}
                </div>
                <div>{{ $cardSubtitle }}</div>
            </div>
            @if ($useDropdown)
                <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon">
                        <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-options') }}"></use>
                    </svg>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                </div>
            @endif
        </div>
    </div>
</div>