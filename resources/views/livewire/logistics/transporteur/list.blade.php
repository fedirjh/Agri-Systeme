<div class="card my-4">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Liste Des Transporteurs</h6>
                <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">{{count($transporteurs)}}</span> Total
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
                    TEL
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    ZONE
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Bennes
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    STATUS
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Contrat
                </th>
                <th class="text-secondary opacity-7"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($transporteurs as $transporteur)
                <tr>
                    <td class="text-sm font-weight-normal align-middle ps-4">
                        {{$transporteur->id}}
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm font-weight-bold mb-0">
                            {{ $transporteur->cin}}
                        </p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <h6 class="mb-0 font-weight-bold text-sm">{{ $transporteur->nom}}</h6>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm text-secondary font-weight-bold mb-0">{{ $transporteur->tel}}</p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-xs font-weight-bold mb-0">{{ $transporteur->zone}}</p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        @foreach ($transporteur->bennes->take(2) as $item)
                            <button type="button" class="btn btn-info btn-sm mb-0">
                                {{ $item->nbenne }}
                            </button>
                        @endforeach
                            @if(count($transporteur->bennes) > 2)
                                <button type="button" class="btn btn-info btn-sm mb-0">
                                    + {{ count($transporteur->bennes) - 2 }}
                                </button>
                            @endif
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <div class="d-flex align-items-center">
                            @if($transporteur->status== 0)
                                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center">
                                    <i class="material-icons text-xs" aria-hidden="true">done</i>
                                </button>
                                <span class="text-success text-sm font-weight-bold">Active</span>
                        @elseif($transporteur->status == 1)
                            <button class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 me-2 btn-sm d-flex align-items-center justify-content-center">
                                <i class="material-icons text-xs" aria-hidden="true">clear</i>
                            </button>
                            <span class="text-secondary text-sm font-weight-bold">Inactive</span>
                        @endif
                        </div>
                    </td>

                    <td class="align-middle text-sm ps-2">
                        <div class="d-flex align-items-center">
                            @if($transporteur->contrat== 0)
                                <span class="text-secondary text-sm font-weight-bold">En attend</span>
                            @elseif($transporteur->contrat == 1)
                                <span class="text-success text-sm font-weight-bold">Accepté</span>
                            @elseif($transporteur->contrat == 2)
                                <span class="text-danger text-sm font-weight-bold">Rejeté</span>
                            @endif
                        </div>
                    </td>

<!--                    <td class="text-sm">
                        <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview Transporteur" wire:click="view({{ $transporteur->id }})">
                            <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                        </a>
                        <a data-id="transM-{{ $transporteur->id }}" href="javascript:;" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Transporteur" wire:click="edit({{ $transporteur->id }})">
                            <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                        </a>
                        <a data-id="trans-{{ $transporteur->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:;" wire:click="$set('deleteId',{{ $transporteur->id }})">
                            <i data-bs-toggle="tooltip" data-bs-original-title="Delete Transporteur" class="material-icons text-secondary position-relative text-lg">delete</i>
                        </a>
                    </td>-->
                    <td class="align-middle text-center">
                        <button rel="tooltip" class="btn btn-info btn-link btn-sm mb-0" wire:click="view({{$transporteur->id }})" data-original-title=""
                                title="">
                            <span class="material-icons">view_timeline</span> View
                            <div class="ripple-container"></div>
                        </button>

                        <button rel="tooltip" class="btn btn-success btn-link btn-sm mb-0" wire:click="edit({{$transporteur->id }},'edit')" data-original-title=""
                                title="">
                            <i class="material-icons">edit</i> Edit
                            <div class="ripple-container"></div>
                        </button>

                        <button type="button" class="btn btn-warning btn-link btn-sm mb-0"
                                wire:click="edit({{$transporteur->id }},'affect')" data-original-title=""
                                title="">
                            Affecter
                            <div class="ripple-container"></div>
                        </button>

                        <button type="button" class="btn btn-danger btn-link btn-sm mb-0"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                wire:click="$set('deleteId',{{$transporteur->id }})" data-original-title=""
                                title="">
                            <i class="material-icons">close</i> Delete
                            <div class="ripple-container"></div>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!--/*$transporteurs->links('components.pagination')*/-->
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

