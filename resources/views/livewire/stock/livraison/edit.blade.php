<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Edit Entity</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-plus text-info" aria-hidden="true"></i>
                    Update Entity
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

            <div class="form-group col-12 col-md-6 mt-3" wire:ignore x-data x-init="
                                    choices = new Choices($refs.agri, {
                                        searchEnabled: true
                                    });
                                    $refs.agri.addEventListener('change', function (event) {
                                        @this.set('agriculteur_id', $refs.agri.value);
                                    })">
                <label for="transportAffect">Agriculteur</label>
                <select @if($status !=  0) disabled @endif x-ref="agri" class="form-select border border-2 p-2"
                        id="choices-edit"
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
                <select @if($status !=  0) disabled @endif x-ref="transp" class="form-select border border-2 p-2"
                        id="choices-edit"
                        wire:model="transporteur_id">
                    @foreach($transporteurs as $transport)
                        <option value="{{$transport->id}}">
                            {{$transport->id}} - {{$transport->nom}}
                        </option>
                    @endforeach
                </select>
            </div>


<!--            <pre><code>{{ json_encode($entitiesSelectedQtyRecp, JSON_PRETTY_PRINT) }}</code></pre>-->


            <div class="form-group col-12 col-md-6 input-group-outline mt-3 @if(strlen($status ?? '') > 0) is-filled @endif">
                <label for="tel">Etat de Livraison</label>
                <div class="d-flex">
                    @if($status ==  0)
                        <div class="form-check mb-3">
                            <input wire:model="status" name="status" class="form-check-input" type="radio" value="0">
                            <label class="custom-control-label" for="customRadio1">En Livraison</label>
                        </div>
                    @endif

                    @if($status == 0 || $status == 1)
                        <div class="form-check mb-3">
                            <input wire:model="status" name="status" class="form-check-input" type="radio" value="1">
                            <label class="custom-control-label" for="customRadio1">Livree</label>
                        </div>
                    @endif

                        @if($status == 1 || $status == 3 || $status == 2  )
                    <div class="form-check mb-3">
                        <input wire:model="status" name="status" class="form-check-input" type="radio" value="2">
                        <label class="custom-control-label" for="customRadio1">Receptionne</label>
                    </div>

                        @endif

                        @if($status == 1  || $status == 3)
                    <div class="form-check mb-3">
                        <input wire:model="status" name="status" class="form-check-input" type="radio" value="3">
                        <label class="custom-control-label" for="customRadio1">En Attente</label>
                    </div>
                        @endif

                        @if($status == 0 || $status == 3  || $status == 4 )
                    <div class="form-check mb-3">
                        <input wire:model="status" name="status" class="form-check-input" type="radio" value="4">
                        <label class="custom-control-label" for="customRadio1">Rejeté</label>
                    </div>
                        @endif
                </div>
            </div>

            <div class="form-group col-12 col-md-6 input-group-outline mt-3" wire:ignore x-data x-init="
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
                <select @if($status !=  0) disabled @endif wire:model="entitiesSelected" x-ref="multiple" id="roles"
                        class="border border-2 p-2" multiple>
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
                        <div class="row">
                            <div class="form-group col-auto input-group-outline mt-3">
                                <label class="text-capitalize" for="tel">Livraison Quantity</label>
                                <input wire:change="addToEntity($event.target.value,{{$entity->id}})"
                                       @if($status !=  0) disabled @endif
                                       type="number"
                                       wire:ignore x-data
                                       x-init="@this.addToEntity({{$itemEdit->getLivraisonEntityValue($entity->id,$editId)}}, {{$entity->id}});"
                                       value="{{$itemEdit->getLivraisonEntityValue($entity->id,$editId)}}"
                                       max="{{$entity->quantityTotal - $entity->quantityUsed + $itemEdit->getLivraisonEntityValue($entity->id,$editId)}}"
                                       class="form-control border border-2 p-2"
                                       placeholder="Enter Livraison Quantity"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="form-group col-auto input-group-outline mt-3">
                                <label class="text-capitalize" for="tel">Reception Quantity</label>
                                <input wire:change="addToEntityRecept($event.target.value,{{$itemEdit->getLivraisonEntityValue($entity->id,$editId)}},{{$entity->id}})"
                                       @if($status !=  2) disabled @endif
                                       type="number"
                                       wire:ignore x-data
                                       x-init="@this.addToEntityRecept({{$itemEdit->getLivraisonEntityValue($entity->id,$editId)}},{{$itemEdit->getLivraisonEntityValue($entity->id,$editId)}}, {{$entity->id}});"
                                       value="{{$itemEdit->getLivraisonEntityValue($entity->id,$editId)}}"
                                       max="{{$itemEdit->getLivraisonEntityValue($entity->id,$editId)}}"
                                       class="form-control border border-2 p-2"
                                       placeholder="Enter Reception Quantity"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            @if($status ==  4)
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
            @endif

            <button type="submit" class="btn btn-dark mt-5">Update Entity</button>
        </form>
    </div>
</div>