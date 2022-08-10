<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Add Agriculteurs</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-plus text-info" aria-hidden="true"></i>
                    Create new Agriculteur
                </p>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <button class="btn bg-gradient-dark mb-0"  wire:click="$set('mode', 'list')">
                    <i class="material-icons">arrow_left</i>&nbsp;&nbsp;Back To List</button>
            </div>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <form wire:submit.prevent="store" class="d-flex flex-column align-items-center">

            <div class="form-group col-12 col-md-6 input-group-outline mt-3 @if(strlen($nom_prenom ?? '') > 0) is-filled @endif">
                <label for="nom_prenom">Name</label>
                <input wire:model="nom_prenom"
                       type="text"
                       class="form-control border border-2 p-2"
                       id="nom_prenom"
                       placeholder="Enter Nom"
                       onfocus="focused(this)" onfocusout="defocused(this)">
                @error('nom_prenom')
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
                    <div class="form-group col-12 col-md-6 ps-md-0 input-group-outline mt-3 @if(strlen($zone ?? '') > 0) is-filled @endif">
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

                    <div class="form-group col-12 col-md-6 pe-md-0 mt-3" wire:ignore x-data x-init="
                                    choices = new Choices($refs.region, {
                                        searchEnabled: true
                                    });
                                    $refs.region.addEventListener('change', function (event) {
                                        @this.set('region', $refs.region.value);
                                    })">
                        <label for="transportAffect">Région</label>
                        <select  x-ref="region" class="form-select border border-2 p-2" id="choices-edit" wire:model="region">
                            <option value="">Select Region</option>
                            @foreach($regions as $item)
                                <option value="{{$item}}">
                                    {{$item}}
                                </option>
                            @endforeach
                        </select>
                        @error('region')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>
<!--                    <div class="form-group col-12 col-md-6 pe-0 input-group-outline mt-3 @if(strlen($region ?? '') > 0) is-filled @endif">
                        <label for="tel">Région</label>
                        <input wire:model="region"
                               type="text"
                               class="form-control border border-2 p-2"
                               id="region"
                               placeholder="Enter Région"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('region')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>-->

                </div>

<div class="form-group col-12 col-md-6 mt-3" wire:ignore x-data x-init="
                                    choices = new Choices($refs.typeAgri, {
                                        searchEnabled: true
                                    });
                                    $refs.typeAgri.addEventListener('change', function (event) {
                                        @this.set('type', $refs.typeAgri.value);
                                    })">
                <label for="transportAffect">Type</label>
                <select  x-ref="typeAgri" class="form-select border border-2 p-2" id="choices-edit" wire:model="type">
                    <option value="Agriculteur">Agriculteur</option>
                    <option value="Collecteur">Collecteur</option>
                </select>
            </div>

            <button type="submit" class="btn btn-dark mt-5">Create Agriculteur</button>
        </form>
    </div>
</div>
