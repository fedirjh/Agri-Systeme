<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Add Entity</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-plus text-info" aria-hidden="true"></i>
                    Create new Entity
                </p>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <button class="btn bg-gradient-dark mb-0" wire:click="$set('mode', 'list')">
                    <i class="material-icons">arrow_left</i>&nbsp;&nbsp;Back To List
                </button>
            </div>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <form wire:submit.prevent="store" class="d-flex flex-column align-items-center">

            <div class="row col-12 col-md-6">
                <div class="form-group col-12 col-md-6 ps-md-0 input-group-outline mt-3 @if(strlen($ref ?? '') > 0) is-filled @endif">
                    <label for="name">Ref</label>
                    <input wire:model="ref"
                           type="text"
                           class="form-control border border-2 p-2"
                           id="ref"
                           placeholder="Enter Ref"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('ref')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6 pe-md-0 input-group-outline mt-3 @if(strlen($category ?? '') > 0) is-filled @endif">
                    <label for="name">Category</label>
                    <input wire:model="category"
                           type="text"
                           class="form-control border border-2 p-2"
                           id="category"
                           placeholder="Enter Category"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('category')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
            </div>

            <div class="form-group col-12 col-md-6 input-group-outline mt-3 @if(strlen($quantityTotal ?? '') > 0) is-filled @endif">
                <label for="tel">Qquantity Total</label>
                <input wire:model="quantityTotal"
                       type="number"
                       class="form-control border border-2 p-2"
                       id="quantityTotal"
                       placeholder="Enter Quantity Total"
                       onfocus="focused(this)" onfocusout="defocused(this)">
                @error('quantityTotal')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>

            <div class="form-group col-12 col-md-6 input-group-outline mt-3">
                <label for="nom">Remarque</label>
                <div wire:ignore>
                    <div x-data x-ref="quill" x-init="quill = new Quill($refs.quill, {theme: 'snow'});
                                quill.on('text-change', function () {
                                    @this.set('remarque', quill.root.innerHTML);
                                });"
                    >
                        {!! $remarque !!}
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-dark mt-5">Create Entity</button>
        </form>
    </div>
</div>
