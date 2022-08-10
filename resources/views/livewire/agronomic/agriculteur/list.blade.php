<div class="card my-4">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Liste Des Agriculteurs</h6>
                <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">{{count($agriculteurs)}}</span> Total
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
                    CIN
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    NAME
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    TEL
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                    Type
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    ZONE / REGION
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    STATUS
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Responsable
                </th>
                <th class="text-secondary opacity-7"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($agriculteurs as $agriculteur)
                <tr>
                    <td class="text-sm font-weight-normal align-middle ps-4">
                        {{$agriculteur->id}}
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm font-weight-bold mb-0">
                            {{ $agriculteur->cin}}
                        </p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <h6 class="mb-0 font-weight-bold text-sm">{{ $agriculteur->nom_prenom}}</h6>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm text-secondary font-weight-bold mb-0">{{ $agriculteur->tel}}</p>
                    </td>
                    <td class="align-middle text-sm">
                        <p class="text-capitalize text-sm text-secondary font-weight-bold mb-0">{{ $agriculteur->type}}</p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-xs font-weight-bold mb-0">{{ $agriculteur->region}}</p>
                        <p class="text-xs text-secondary mb-0">{{ $agriculteur->zone}}</p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <div class="d-flex align-items-center">
                            @if($agriculteur->status== 0)
                                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center">
                                    <i class="material-icons text-xs" aria-hidden="true">done</i>
                                </button>
                                <span class="text-success text-sm font-weight-bold">Active</span>
                        @elseif($agriculteur->status == 1)
                            <button class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 me-2 btn-sm d-flex align-items-center justify-content-center">
                                <i class="material-icons text-xs" aria-hidden="true">clear</i>
                            </button>
                            <span class="text-secondary text-sm font-weight-bold">Inactive</span>
                        @endif
                        </div>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <div class="d-flex align-items-center">
                            @if(!$agriculteur->responsable)
                                <span class="text-secondary text-sm font-weight-bold">Non Affecté</span>
                            @else
                                <span class="text-success text-sm font-weight-bold">{{ $agriculteur->responsable->nom_prenom}}</span>
                            @endif
                        </div>
                    </td>
<!--                    <td class="text-sm">
                        <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview Agriculteur" wire:click="view({{ $agriculteur->id }})">
                            <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                        </a>
                        <a href="javascript:;" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Agriculteur" wire:click.prevent="edit({{ $agriculteur->id }})">
                            <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:;" wire:click="$set('deleteId',{{ $agriculteur->id }})">
                            <i data-bs-toggle="tooltip" data-bs-original-title="Delete Agriculteur" class="material-icons text-secondary position-relative text-lg">delete</i>
                        </a>
                    </td>-->
                    <td class="align-middle text-center">
                        <button rel="tooltip" class="btn btn-info btn-link btn-sm mb-0" wire:click="view({{$agriculteur->id }})" data-original-title=""
                                title="">
                            <span class="material-icons">view_timeline</span> View
                            <div class="ripple-container"></div>
                        </button>

                        <button rel="tooltip" class="btn btn-success btn-link btn-sm mb-0" wire:click="edit({{$agriculteur->id }},'edit')" data-original-title=""
                           title="">
                            <i class="material-icons">edit</i> Edit
                            <div class="ripple-container"></div>
                        </button>

                        <button type="button" class="btn btn-warning btn-link btn-sm mb-0"
                                wire:click="edit({{$agriculteur->id }},'affect')" data-original-title=""
                                title="">
                            Affecter
                            <div class="ripple-container"></div>
                        </button>

                        <button type="button" class="btn btn-danger btn-link btn-sm mb-0"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                wire:click="$set('deleteId',{{$agriculteur->id }})" data-original-title=""
                                title="">
                            <i class="material-icons">close</i> Delete
                            <div class="ripple-container"></div>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!--/*$agriculteurs->links('components.pagination')*/-->
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

