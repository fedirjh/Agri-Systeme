<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Add Benne</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-plus text-info" aria-hidden="true"></i>
                    Create new Benne
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




                <div class="row col-12 col-md-6">

                    <div class="form-group col-12 col-md-6 ps-0 input-group-outline mt-3 @if(strlen($nbenne ?? '') > 0) is-filled @endif">
                        <label for="nom">Numéro de benne</label>
                        <input wire:model="nbenne"
                               type="text"
                               class="form-control border border-2 p-2"
                               id="nbenne"
                               placeholder="Enter Numero"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('nbenne')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-6 pe-0 input-group-outline mt-3 @if(strlen($long ?? '') > 0) is-filled @endif">
                        <label for="tel">Longeur</label>
                        <input wire:model="long"
                               type="number"
                               class="form-control border border-2 p-2"
                               id="long"
                               placeholder="Enter Longeur"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('long')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                </div>

                <div class="row col-12 col-md-6">
                    <div class="form-group col-12 col-md-6 ps-0 input-group-outline mt-3 @if(strlen($larg ?? '') > 0) is-filled @endif">
                        <label for="tel">Largeur</label>
                        <input wire:model="larg"
                               type="number"
                               class="form-control border border-2 p-2"
                               id="larg"
                               placeholder="Enter Largeur"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('larg')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-6 pe-0 input-group-outline mt-3 @if(strlen($haut ?? '') > 0) is-filled @endif">
                        <label for="tel">Hauteur</label>
                        <input wire:model="haut"
                               type="text"
                               class="form-control border border-2 p-2"
                               id="haut"
                               placeholder="Enter Hauteur"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('zone')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                </div>



            <div class="form-group col-12 col-md-6 input-group-outline mt-3">
                <label for="nom">Remarque</label>
                <div wire:ignore>
                    <div x-data x-ref="quill" x-init="quill = new Quill($refs.quill, {theme: 'snow'});
                                quill.on('text-change', function () {
                                    @this.set('req', quill.root.innerHTML);
                                });"
                    >
                        {!! $req !!}
                    </div>
                </div>
            </div>


<!--            <div class="form-group col-12 col-md-6 mt-3" wire:ignore x-data x-init="
                                    choices = new Choices($refs.mselect, {
                                        searchEnabled: true
                                    });
                                    $refs.mselect.addEventListener('change', function (event) {
                                        @this.set('transportAffect', $refs.mselect.value);
                                    })">
                <label for="transportAffect">Transporteur</label>
                <select  x-ref="mselect" class="form-select border border-2 p-2" id="choices-edit" wire:model="transportAffect">
                    <option value="0">Non Affectée</option>
                    @foreach($transporteurs as $transport)
                        <option value="{{$transport->id}}">
                            {{$transport->id}} - {{$transport->nom}}
                        </option>
                    @endforeach
                </select>
            </div>-->

            <button type="submit" class="btn btn-dark mt-5">Create Benne</button>
        </form>
    </div>
</div>
