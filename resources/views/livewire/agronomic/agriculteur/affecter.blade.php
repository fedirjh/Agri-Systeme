<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Affecter Agriculteurs</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-edit text-info" aria-hidden="true"></i>
                    Affecter Agriculteur
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

            <div class="form-group col-12 col-md-6 input-group-outline mt-3 @if(strlen($nom_prenom ?? '') > 0) is-filled @endif">
                <label for="nom_prenom">Name</label>
                <input wire:model="nom_prenom"
                       type="text"
                       class="form-control border border-2 p-2"
                       id="nom_prenom"
                       placeholder="Enter Nom"
                       disabled
                       onfocus="focused(this)" onfocusout="defocused(this)">
                @error('nom_prenom')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>

            <div class="form-group col-12 col-md-6 mt-3" wire:ignore x-data x-init="
                                    choices = new Choices($refs.mselect, {
                                        searchEnabled: true
                                    });
                                    $refs.mselect.addEventListener('change', function (event) {
                                        @this.set('responsableAffect', $refs.mselect.value);
                                    })">
                <label for="transportAffect">Responsable</label>
                <select  x-ref="mselect" class="form-select border border-2 p-2" id="choices-edit" wire:model="responsableAffect">
                    <option value="0">Non Affectée</option>
                    @foreach($responsables as $item)
                        <option value="{{$item->id}}">
                            {{$item->id}} - {{$item->nom_prenom}}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-dark mt-5">Affecter Agriculteur</button>
        </form>
    </div>
</div>
