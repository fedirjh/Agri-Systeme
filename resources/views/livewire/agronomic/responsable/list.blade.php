<div class="card my-4">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Liste Des Responsables</h6>
                <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">{{count($responsables)}}</span> Total
                </p>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <button class="btn bg-gradient-dark mb-0  btn-sm" wire:click="$set('mode', 'create')">
                    <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                </button>
                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1"
                        data-name="transporteurs-agri" data-type="csv" type="button"
                        name="button"><i class="material-icons text-sm">file_download</i>&nbsp;&nbsp;Export</button>
                <button class="btn btn-outline-primary btn-sm print mb-0 mt-sm-0 mt-1"
                        data-name="transporteurs-agri" type="button"
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
                    Email
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    TEL
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Agriculteurs
                </th>
                <th class="text-secondary opacity-7"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($responsables as $responsable)
                <tr>
                    <td class="text-sm font-weight-normal align-middle ps-4">
                        {{$responsable->id}}
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm font-weight-bold mb-0">
                            {{ $responsable->cin}}
                        </p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <h6 class="mb-0 font-weight-bold text-sm">{{ $responsable->nom_prenom}}</h6>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm text-secondary font-weight-bold mb-0">{{ $responsable->email }}</p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm text-secondary font-weight-bold mb-0">{{ $responsable->tel }}</p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        @foreach ($responsable->agriculteurs->take(2) as $item)
                            <button type="button" class="btn btn-info btn-sm mb-0">
                                {{ $item->nom_prenom }}
                            </button>
                        @endforeach
                            @if(count($responsable->agriculteurs) > 2)
                                <button type="button" class="btn btn-info btn-sm mb-0">
                                    + {{ count($responsable->agriculteurs) - 2 }}
                                </button>
                            @endif
                    </td>
<!--
                    <td class="text-sm">
                        <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview Transporteur" wire:click="view({{ $responsable->id }})">
                            <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                        </a>
                        <a data-id="transM-{{ $responsable->id }}" href="javascript:;" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Transporteur" wire:click="edit({{ $responsable->id }})">
                            <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                        </a>
                        <a data-id="trans-{{ $responsable->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:;" wire:click="$set('deleteId',{{ $responsable->id }})">
                            <i data-bs-toggle="tooltip" data-bs-original-title="Delete Transporteur" class="material-icons text-secondary position-relative text-lg">delete</i>
                        </a>
                    </td>-->
                    <td class="align-middle text-center">
                        <button rel="tooltip" class="btn btn-info btn-link btn-sm mb-0" wire:click="view({{$responsable->id }})" data-original-title=""
                                title="">
                            <span class="material-icons">view_timeline</span> View
                            <div class="ripple-container"></div>
                        </button>

                        <button rel="tooltip" class="btn btn-success btn-link btn-sm mb-0" wire:click="edit({{$responsable->id }})" data-original-title=""
                           title="">
                            <i class="material-icons">edit</i> Edit
                            <div class="ripple-container"></div>
                        </button>

                        <button type="button" class="btn btn-danger btn-link btn-sm mb-0"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                wire:click="$set('deleteId',{{$responsable->id }})" data-original-title=""
                                title="">
                            <i class="material-icons">close</i> Delete
                            <div class="ripple-container"></div>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!--/*$responsables->links('components.pagination')*/-->
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

