<div class="card my-4">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Liste Des Bennes</h6>
                <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">{{count($bennes)}}</span> Total
                </p>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <button class="btn bg-gradient-dark mb-0  btn-sm" wire:click="$set('mode', 'create')">
                    <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                </button>
                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1"
                        data-name="bennes-agri" data-type="csv" type="button"
                        name="button"><i class="material-icons text-sm">file_download</i>&nbsp;&nbsp;Export</button>
                <button class="btn btn-outline-primary btn-sm print mb-0 mt-sm-0 mt-1"
                        data-name="bennes-agri" type="button"
                        name="button"><i class="material-icons text-sm">print</i>&nbsp;&nbsp;Print</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center" id="datatable-search">
            <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-4">
                    ID
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Numero de benne
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Longeur
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    largeur
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Hauteur
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Transporteur
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Remarque
                </th>
                <th class="text-secondary opacity-7"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($bennes as $benne)
                <tr wire:key="{{ "benne".$benne->id }}">
                    <td class="text-sm font-weight-normal align-middle ps-4">
                        {{$benne->id}}
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm font-weight-bold mb-0">
                            {{ $benne->nbenne}}
                        </p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <h6 class="mb-0 font-weight-bold text-sm">{{ $benne->long}}</h6>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm text-secondary font-weight-bold mb-0">{{ $benne->larg}}</p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm text-secondary font-weight-bold mb-0">{{ $benne->haut}}</p>
                    </td>

                    <td class="align-middle text-sm ps-2">
                        <div class="d-flex align-items-center">
                            @if(!$benne->transporteur)
                                <span class="text-secondary text-sm font-weight-bold">Non Affecté</span>
                            @else
                                <span class="text-success text-sm font-weight-bold">{{ $benne->transporteur->nom}}</span>
                            @endif
                        </div>
                    </td>

                    <td class="align-middle text-sm ps-2">
                        <p class="text-xs font-weight-bold mb-0">{{ $benne->req}}</p>
                    </td>
<!--                    <td class="text-sm" >
                        <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview Benne" wire:click="view({{ $benne->id }})">
                            <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                        </a>
                        <a data-id="transM-{{ $benne->id }}" href="javascript:;" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Benne" wire:click="edit({{ $benne->id }})">
                            <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                        </a>
                        <a data-id="trans-{{ $benne->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:;" wire:click="$set('deleteId',{{ $benne->id }})">
                            <i data-bs-toggle="tooltip" data-bs-original-title="Delete Benne" class="material-icons text-secondary position-relative text-lg">delete</i>
                        </a>
                    </td>-->
                    <td class="align-middle text-center">
                        <button rel="tooltip" class="btn btn-info btn-link btn-sm mb-0" wire:click="view({{$benne->id }})" data-original-title=""
                                title="">
                            <span class="material-icons">view_timeline</span> View
                            <div class="ripple-container"></div>
                        </button>

                        <button rel="tooltip" class="btn btn-success btn-link btn-sm mb-0" wire:click="edit({{$benne->id }},'edit')" data-original-title=""
                           title="">
                            <i class="material-icons">edit</i> Edit
                            <div class="ripple-container"></div>
                        </button>

                        <button type="button" class="btn btn-warning btn-link btn-sm mb-0"
                                wire:click="edit({{$benne->id }},'affect')" data-original-title=""
                                title="">
                            Affecter
                            <div class="ripple-container"></div>
                        </button>

                        <button type="button" class="btn btn-danger btn-link btn-sm mb-0"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                wire:click="$set('deleteId',{{$benne->id }})" data-original-title=""
                                title="">
                            <i class="material-icons">close</i> Delete
                            <div class="ripple-container"></div>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!--/*$bennes->links('components.pagination')*/-->
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

