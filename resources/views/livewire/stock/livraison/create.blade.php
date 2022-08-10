<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Add Livraison</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-plus text-info" aria-hidden="true"></i>
                    Create new Livraison
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

            <div class="form-group col-12 col-md-6 mt-3" wire:ignore x-data x-init="
                                    choices = new Choices($refs.agri, {
                                        searchEnabled: true
                                    });
                                    $refs.agri.addEventListener('change', function (event) {
                                        @this.set('agriculteur_id', $refs.agri.value);
                                    })">
                <label for="transportAffect">Agriculteur</label>
                <select x-ref="agri" class="form-select border border-2 p-2" id="choices-edit"
                        wire:model="agriculteur_id">
                    @foreach($agriculteurs as $agri)
                        <option value="{{$agri->id}}">
                            {{$agri->id}} - {{$agri->nom_prenom}}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-12 col-md-6 mt-3" wire:ignore x-data x-init="
                                    choices = new Choices($refs.transp, {
                                        searchEnabled: true
                                    });
                                    $refs.transp.addEventListener('change', function (event) {
                                        @this.set('transporteur_id', $refs.transp.value);
                                    })">
                <label for="transportAffect">Transporteur</label>
                <select x-ref="transp" class="form-select border border-2 p-2" id="choices-edit"
                        wire:model="transporteur_id">
                    @foreach($transporteurs as $transport)
                        <option value="{{$transport->id}}">
                            {{$transport->id}} - {{$transport->nom}}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-12 col-md-6 input-group-outline mt-3"  wire:ignore x-data x-init="
                                    choices = new Choices($refs.multiple, {
                                        delimiter: ',',
                                        editItems: true,
                                        maxItemCount: 7,
                                        removeItemButton: true
                                    });
                                    $refs.multiple.addEventListener('change', function (event) {
                                        values = []
                                        Array.from($refs.multiple.options).forEach(function (option) {
                                            values.push(option.value)
                                        })
                                        @this.set('entitiesSelected', values);
                                    })">
                <label for="tel">Entities</label>
                <select wire:model="entitiesSelected"  x-ref="multiple" id="roles" class="border border-2 p-2" multiple>
                    @foreach ($entities as $entity)
                        <option value="{{ $entity->id}}">{{ $entity->ref }}</option>
                    @endforeach
                </select>
            </div>

            @foreach ($entities as $entity)
                @if(in_array($entity->id,$entitiesSelected))
                    <div class="form-group col-12 col-md-6 input-group-outline mt-3">
                        <label class="text-capitalize" for="tel">{{ $entity->ref }}</label>
                        <p class="form-text text-muted text-xs ms-1 d-inline">
                            (Stock Disponible : {{$entity->quantityTotal - $entity->quantityUsed}})
                        </p>
                        <input wire:change="addToEntity($event.target.value,{{$entity->id}})"
                               type="number"
                               max="{{$entity->quantityTotal - $entity->quantityUsed}}"
                               class="form-control border border-2 p-2"
                               placeholder="Enter Quantity Total"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                @endif
            @endforeach

<!--            <div class="form-group col-12 col-md-6 input-group-outline mt-3">
                <label for="tel">Entities</label>
            </div>

            @foreach($entities as $entity)
                <div class="row col-12 col-md-6 mt-3">
                    <div class="form-group col-6 col-md-6 input-group-outline">
                        <div class="form-check">
                            <input wire:model="entitiesSelected" name="entitiesSelected" class="form-check-input" type="checkbox" value="{{$entity->id}}">
                            <label class="custom-control-label" for="customRadio1">{{$entity->ref}}</label>
                        </div>
                    </div>
                    <div class="form-group col-6 col-md-6 input-group-outline">
                        <input type="number" @if(!in_array($entity->id,$entitiesSelected)) disabled @endif
                               wire:change="addToEntity($event.target.value,{{$entity->id}})"
                               class="form-control border border-2 p-2" id="nbenne"
                               placeholder="Enter Qantity"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>
            @endforeach-->
            <!--            <div class="form-group col-12 col-md-6 input-group-outline mt-3">
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
    </div>-->

            <button type="submit" class="btn btn-dark mt-5">Create Livraison</button>
        </form>
    </div>
</div>
