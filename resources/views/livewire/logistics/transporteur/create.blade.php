<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Add Transporteur</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-plus text-info" aria-hidden="true"></i>
                    Create new Transporteur
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
                <div class="form-group col-12 col-md-6 ps-md-0 input-group-outline mt-3 @if(strlen($mat ?? '') > 0) is-filled @endif">
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


            <div class="form-group col-12 col-md-6 input-group-outline mt-3 @if(strlen($rq ?? '') > 0) is-filled @endif">
                <label for="nom">Name</label>
                <textarea wire:model="rq"
                          type="text"
                          class="form-control border border-2 p-2" id="summary-ckeditor"
                          placeholder="Enter Nom"
                          onfocus="focused(this)" onfocusout="defocused(this)"></textarea>
                @error('rq')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror

                @stack('js')
                <script>
                    ClassicEditor
                        .create(document.querySelector('#summary-ckeditor'))
                        .catch(error => {
                            console.error(error);
                        });    </script>
            </div>

            <button type="submit" class="btn btn-dark mt-5">Create Transporteur</button>
        </form>
    </div>
</div>