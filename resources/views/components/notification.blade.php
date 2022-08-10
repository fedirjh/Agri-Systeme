<div>
    @if (Session::has('status'))
        <div class="position-fixed bottom-1 end-1 z-index-2" wire:ignore x-data x-init="(new bootstrap.Toast($refs.toaststatus, { delay: 2000 })).show()">
            <div class="toast fade p-2 mt-2 bg-gradient-info hide" x-ref="toaststatus" data-bs-delay="3000" data-bs-autohide="true" role="dialog" aria-live="assertive" id="infoToast" aria-atomic="true">
                <div class="toast-header bg-transparent border-0">
                    <i class="material-icons text-white me-2">
                        notifications
                    </i>
                    <span class="me-auto text-white font-weight-bold">Success</span>
                    <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close" aria-hidden="true"></i>
                </div>
                <hr class="horizontal light m-0">
                <div class="toast-body text-white">
                    {{ Session::get('status') }}
                </div>
            </div>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="position-fixed bottom-1 end-1 z-index-2" wire:ignore x-data x-init="(new bootstrap.Toast($refs.toasterror, { delay: 2000 })).show()">
            <div class="toast fade p-2 mt-2 bg-gradient-danger hide" x-ref="toasterror" data-bs-delay="3000" data-bs-autohide="true" role="dialog" aria-live="assertive" id="infoToast" aria-atomic="true">
                <div class="toast-header bg-transparent border-0">
                    <i class="material-icons text-white me-2">
                        notifications
                    </i>
                    <span class="me-auto text-white font-weight-bold">Error</span>
                    <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close" aria-hidden="true"></i>
                </div>
                <hr class="horizontal light m-0">
                <div class="toast-body text-white">
                    {{ Session::get('error') }}
                </div>
            </div>
        </div>
    @endif

        @if (Session::has('success'))
            <div class="position-fixed bottom-1 end-1 z-index-2" wire:ignore x-data x-init="(new bootstrap.Toast($refs.toastsuccess, { delay: 2000 })).show()">
                <div class="toast fade p-2 mt-2 bg-gradient-success hide" x-ref="toastsuccess" data-bs-delay="3000" data-bs-autohide="true" role="dialog" aria-live="assertive" id="infoToast" aria-atomic="true">
                    <div class="toast-header bg-transparent border-0">
                        <i class="material-icons text-white me-2">
                            notifications
                        </i>
                        <span class="me-auto text-white font-weight-bold">Error</span>
                        <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close" aria-hidden="true"></i>
                    </div>
                    <hr class="horizontal light m-0">
                    <div class="toast-body text-white">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
        @endif
</div>