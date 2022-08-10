<div class="card my-4">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Liste Des Entities</h6>
                <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">{{count($entities)}}</span> Total
                </p>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <button class="btn bg-gradient-dark mb-0  btn-sm" wire:click="$set('mode', 'create')">
                    <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                </button>
                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1"
                        data-name="agriculteurs-agri" data-type="csv" type="button"
                        name="button"><i class="material-icons text-sm">file_download</i>&nbsp;&nbsp;Export</button>
                <button class="btn btn-outline-primary btn-sm print mb-0 mt-sm-0 mt-1"
                        data-name="agriculteurs-agri" type="button"
                        name="button"><i class="material-icons text-sm">print</i>&nbsp;&nbsp;Print</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center"  id="datatable-search">
            <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-4">
                    ID
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Ref
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Qty Total
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Qty In Stock
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Qty In Use
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Categorie
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Remarque
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($entities as $entity)
                <tr>
                    <td class="text-sm font-weight-normal align-middle ps-4">
                        {{$entity->id}}
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm font-weight-bold mb-0">
                            {{ $entity->ref}}
                        </p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <h6 class="mb-0 font-weight-bold text-sm">{{ $entity->quantityTotal}}</h6>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <h6 class="mb-0 font-weight-bold text-sm">{{ $entity->quantityTotal - $entity->quantityUsed}}</h6>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <h6 class="mb-0 font-weight-bold text-sm">{{ $entity->quantityUsed}}</h6>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm font-weight-bold mb-0">
                            {{ $entity->category}}
                        </p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm font-weight-bold mb-0">
                            {{ $entity->remarque}}
                        </p>
                    </td>
                    <td class="text-sm">
                        <button rel="tooltip" class="btn btn-info btn-link btn-sm mb-0" wire:click="view({{$entity->id }})" data-original-title=""
                                title="">
                            <span class="material-icons">view_timeline</span> View
                            <div class="ripple-container"></div>
                        </button>

                        <button rel="tooltip" class="btn btn-success btn-link btn-sm mb-0" wire:click="edit({{$entity->id }})" data-original-title=""
                                title="">
                            <i class="material-icons">edit</i> Edit
                            <div class="ripple-container"></div>
                        </button>
                        <button type="button" class="btn btn-danger btn-link btn-sm mb-0"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                wire:click="$set('deleteId',{{$entity->id }})" data-original-title=""
                                title="">
                            <i class="material-icons">close</i> Delete
                            <div class="ripple-container"></div>
                        </button>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center ">
                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Confirm Delete</h5>
                    </div>
                    <div class="modal-footer justify-content-center ">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" wire:click="delete()">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

