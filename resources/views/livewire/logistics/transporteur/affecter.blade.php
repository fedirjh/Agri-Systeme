<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Affecter Card ID</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-edit text-info" aria-hidden="true"></i>
                    Affecter Card ID
                </p>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <button class="btn bg-gradient-dark mb-0"  wire:click="$set('mode', 'list')">
                    <i class="material-icons">arrow_left</i>&nbsp;&nbsp;Back To List</button>
            </div>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <form wire:submit.prevent="affecter" class="d-flex flex-column align-items-center">

                <div class="form-group col-12 col-md-6 input-group-outline mt-3 is-filled">
                    <label for="nom">Transporteur</label>
                    <input wire:model="nom"
                           type="text"
                           disabled
                           class="form-control border border-2 p-2"
                           id="nbenne"
                           placeholder="Enter Numero"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                </div>


            <div class="form-group col-12 col-md-6 input-group-outline mt-3 @if(strlen($card_id ?? '') > 0) is-filled @endif">
                <label for="nom">Numéro de carte rfid</label>
                <input wire:model="card_id"
                       type="number"
                       class="form-control border border-2 p-2"
                       id="card_id"
                       placeholder="Enter Card number"
                       onfocus="focused(this)" onfocusout="defocused(this)">
                @error('card_id')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>


            <button type="submit" class="btn btn-dark mt-5">Affecter Benne</button>
        </form>
    </div>
</div>
