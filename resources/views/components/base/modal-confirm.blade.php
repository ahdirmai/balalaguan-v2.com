<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $modalId }}">{{ $title }}</h1>
                <button type="button" class="btn-close" data-coreui-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" style="white-space: normal">
                {{ $subTitle }}
            </div>
            <div class="modal-footer">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>