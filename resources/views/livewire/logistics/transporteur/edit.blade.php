<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Edit Transporteur</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-edit text-info" aria-hidden="true"></i>
                    Update Transporteur
                </p>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <button class="btn bg-gradient-dark mb-0"  wire:click="$set('mode', 'list')">
                    <i class="material-icons">arrow_left</i>&nbsp;&nbsp;Back To List</button>
            </div>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <form wire:submit.prevent="update" class="d-flex flex-column align-items-center">

            <div class="form-group col-12 col-md-6 input-group-outline mt-3 @if(strlen($nom ?? '') > 0) is-filled @endif">
                <label for="nom">Name</label>
                <input wire:model="nom"
                       type="text"
                       class="form-control border border-2 p-2"
                       id="nom"
                       placeholder="Enter Nom"
                       onfocus="focused(this)" onfocusout="defocused(this)">
                @error('nom')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>


            <div class="row col-12 col-md-6">
                <div class="form-group col-12 col-md-6 ps-0 input-group-outline mt-3 @if(strlen($tel ?? '') > 0) is-filled @endif">
                    <label for="tel">Telephone</label>
                    <input wire:model="tel"
                           type="number"
                           class="form-control border border-2 p-2"
                           id="tel"
                           placeholder="Enter Tel"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('tel')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6 pe-0 input-group-outline mt-3 @if(strlen($cin ?? '') > 0) is-filled @endif">
                    <label for="tel">CIN</label>
                    <input wire:model="cin"
                           type="number"
                           class="form-control border border-2 p-2"
                           id="cin"
                           placeholder="Enter CIN"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('cin')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>

            </div>

            <div class="row col-12 col-md-6">
                <div class="form-group col-12 col-md-6 ps-0 input-group-outline mt-3 @if(strlen($zone ?? '') > 0) is-filled @endif">
                    <label for="tel">Zone</label>
                    <input wire:model="zone"
                           type="text"
                           class="form-control border border-2 p-2"
                           id="zone"
                           placeholder="Enter Zone"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('zone')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>

                <div class="form-group col-12 col-md-6 pe-0 input-group-outline mt-3 @if(strlen($matricule ?? '') > 0) is-filled @endif">
                    <label for="tel">Matricule</label>
                    <input wire:model="matricule"
                           type="text"
                           class="form-control border border-2 p-2"
                           id="matricule"
                           placeholder="Enter Matricule"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('matricule')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>

            </div>

            <div class="row col-12 col-md-6">
                <div class="form-group col-12 col-md-6 ps-0 input-group-outline mt-3 @if(strlen($mat ?? '') > 0) is-filled @endif">
                    <label for="tel">MAF</label>
                    <input wire:model="mat"
                           type="text"
                           class="form-control border border-2 p-2"
                           id="mat"
                           placeholder="Enter MAF"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('mat')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>

                <div class="form-group col-12 col-md-6 pe-md-0 mt-3" wire:ignore x-data x-init="
                                    choices = new Choices($refs.typeAgri, {
                                        searchEnabled: true
                                    });
                                    $refs.typeAgri.addEventListener('change', function (event) {
                                        @this.set('type', $refs.typeAgri.value);
                                    })">
                    <label for="typeAgri">Type Véhicule</label>
                    <select  x-ref="typeAgri" class="form-select border border-2 p-2" id="choices-edit" wire:model="type">
                        <option value="Poid Lourd">Poid Lourd</option>
                        <option value="Semi Remorque">Semi Remorque</option>
                    </select>
                </div>

            </div>

            <div class="row col-12 col-md-6">
                <div class="form-group col-12 col-md-6 ps-md-0 mt-3" wire:ignore x-data x-init="
                                    choices = new Choices($refs.garntieX, {
                                        searchEnabled: true
                                    });
                                    $refs.garntieX.addEventListener('change', function (event) {
                                        @this.set('garntie', $refs.garntieX.value);
                                    })">
                    <label for="typeAgri">Garantie</label>
                    <select  x-ref="garntieX" class="form-select border border-2 p-2" id="choices-edit" wire:model="garntie">
                        <option value="Cheque">Cheque</option>
                        <option value="Traite">Traite</option>
                    </select>
                </div>

                <div class="form-group col-12 col-md-6 pe-md-0 input-group-outline mt-3 @if(strlen($montant ?? '') > 0) is-filled @endif">
                    <label for="tel">Montant de Garantie</label>
                    <input wire:model="montant"
                           type="number"
                           class="form-control border border-2 p-2"
                           id="montant"
                           placeholder="Enter Montant"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('montant')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>

            </div>


            <div class="form-group col-12 col-md-6 input-group-outline mt-3">
                <label for="nom">Remarque</label>
                <div wire:ignore>
                    <div x-data x-ref="quill" x-init="quill = new Quill($refs.quill, {theme: 'snow'});
                                quill.on('text-change', function () {
                                    @this.set('rq', quill.root.innerHTML);
                                });"
                    >
                        {!! $rq !!}
                    </div>
                </div>
            </div>

            <div class="row col-12 col-md-6">
                <div class="form-group col-12 col-md-6 ps-0 input-group-outline mt-3 @if(strlen($status ?? '') > 0) is-filled @endif">
                    <label for="tel">Status</label>
                    <div class="d-flex">
                        <div class="form-check mb-3">
                            <input wire:model="status" name="status" class="form-check-input" type="radio" value="0">
                            <label class="custom-control-label" for="customRadio1">Active</label>
                        </div>
                        <div class="form-check mb-3">
                            <input wire:model="status" name="status" class="form-check-input" type="radio" value="1">
                            <label class="custom-control-label" for="customRadio1">Inactive</label>
                        </div>
                    </div>
                </div>

                <div class="form-group col-12 col-md-6 pe-0 input-group-outline mt-3 @if(strlen($contrat ?? '') > 0) is-filled @endif">
                    <label for="tel">Etat de Conrat</label>
                    <div class="d-flex">
                        <div class="form-check mb-3">
                            <input wire:model="contrat" name="contrat" class="form-check-input" type="radio" value="0">
                            <label class="custom-control-label" for="customRadio1">En Attend</label>
                        </div>
                        <div class="form-check mb-3">
                            <input wire:model="contrat" name="contrat" class="form-check-input" type="radio" value="1">
                            <label class="custom-control-label" for="customRadio1">Accepter</label>
                        </div>
                        <div class="form-check mb-3">
                            <input wire:model="contrat" name="contrat" class="form-check-input" type="radio" value="2">
                            <label class="custom-control-label" for="customRadio1">Rejeter</label>
                        </div>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-dark mt-5">Update Transporteur</button>
        </form>
    </div>
</div>
