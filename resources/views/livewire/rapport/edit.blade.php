<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Edit Responsable</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-edit text-info" aria-hidden="true"></i>
                    Update Responsable
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
        <form wire:submit.prevent="update" class="d-flex flex-column align-items-center">

            <div class="form-group col-12 col-md-6 pe-md-0 mt-3" wire:ignore x-data x-init="
                                    choices = new Choices($refs.region, {
                                        searchEnabled: true
                                    });
                                    $refs.region.addEventListener('change', function (event) {
                                        @this.set('region', $refs.region.value);
                                    })">
                <label for="transportAffect">Région</label>
                <select x-ref="region" class="form-select border border-2 p-2" id="choices-edit" wire:model="region">
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


            <div class="row col-12 col-md-6">
                <div class="form-group col-12 col-md-6 ps-md-0 input-group-outline mt-3 @if(strlen($varite ?? '') > 0) is-filled @endif">
                    <label for="tel">Varite</label>
                    <input wire:model="varite"
                           type="text"
                           class="form-control border border-2 p-2"
                           id="varite"
                           placeholder="Enter Varite"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('varite')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6 pe-md-0 input-group-outline mt-3 @if(strlen($cycle ?? '') > 0) is-filled @endif">
                    <label for="tel">Cycle Végitative</label>
                    <input wire:model="cycle"
                           type="number"
                           class="form-control border border-2 p-2"
                           id="cycle"
                           placeholder="Enter Cycle Végitative"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('cycle')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>

            </div>

            <div class="row col-12 col-md-6">
                <div class="form-group col-12 col-md-6 ps-md-0 input-group-outline mt-3 @if(strlen($date_plantation ?? '') > 0) is-filled @endif">
                    <label for="tel">Date de plantation</label>
                    <input wire:model="date_plantation"
                           type="date"
                           class="form-control border border-2 p-2"
                           id="date_plantation"
                           placeholder="Enter date de plantation"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('date_plantation')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6 pe-md-0 input-group-outline mt-3 @if(strlen($nombre_plant ?? '') > 0) is-filled @endif">
                    <label for="tel">Nombre de plants</label>
                    <input wire:model="nombre_plant"
                           type="number"
                           class="form-control border border-2 p-2"
                           id="nombre_plant"
                           placeholder="Enter Nombre de plants"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('nombre_plant')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
            </div>


            <div class="row col-12 col-md-6">
                <div class="form-group col-12 col-md-6 ps-md-0 input-group-outline mt-3 @if(strlen($rendement ?? '') > 0) is-filled @endif">
                    <label for="tel">Rendement moyen</label>
                    <input wire:model="rendement"
                           type="number"
                           class="form-control border border-2 p-2"
                           id="rendement"
                           placeholder="Enter Rendement moyen"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('rendement')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6 pe-md-0 input-group-outline mt-3 @if(strlen($densite ?? '') > 0) is-filled @endif">
                    <label for="tel">Densite</label>
                    <input wire:model="densite"
                           type="number"
                           class="form-control border border-2 p-2"
                           id="densite"
                           placeholder="Enter densite"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('densite')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
            </div>

            <div class="row col-12 col-md-6">
                <div class="form-group col-12 col-md-6 ps-md-0 input-group-outline mt-3">
                    <label for="tel">Superificie</label>
                    <input type="number" readonly
                           value="{{ $this->densite>0 ? ((int) $this->nombre_plant / (int) $this->densite):0}}"
                           class="form-control border border-2 p-2"
                           id="rendement"
                           placeholder="Enter Rendement moyen"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="form-group col-12 col-md-6 pe-md-0 input-group-outline mt-3">
                    <label for="tel">Quantite</label>
                    <input readonly
                           type="number"
                           value="{{$this->densite>0 ?  (((int) $this->nombre_plant / (int) $this->densite) * (int) $rendement):0}}"
                           class="form-control border border-2 p-2"
                           id="densite"
                           placeholder="Enter densite"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('densite')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-dark mt-5">Update Rapport</button>
        </form>
    </div>
</div>
