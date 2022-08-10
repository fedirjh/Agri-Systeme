<div class="card my-4">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Liste Des Roles</h6>
                <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">{{count($roles)}}</span> Total
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
                    Name
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Permissions
                </th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td class="text-sm font-weight-normal align-middle ps-4">
                        {{$role->id}}
                    </td>
                    <td class="align-middle text-sm ps-2">
                        <p class="text-sm font-weight-bold mb-0">
                            {{ $role->name}}
                        </p>
                    </td>
                    <td class="align-middle text-sm ps-2">
                        @foreach ($role->permissions->take(5) as $perm)
                            <button type="button" class="btn btn-info btn-sm mb-0">
                                {{ $perm->name }}
                            </button>
                        @endforeach
                        @if(count($role->permissions) > 5)
                                <button type="button" class="btn btn-info btn-sm mb-0">
                                    + {{ count($role->permissions) - 5 }}
                                </button>
                        @endif

                    </td>
                    <td class="text-sm">
                        <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview Agriculteur" wire:click="view({{ $role->id }})">
                            <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                        </a>
                        <a href="javascript:;" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Agriculteur" wire:click.prevent="edit({{ $role->id }})">
                            <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:;" wire:click="$set('deleteId',{{ $role->id }})">
                            <i data-bs-toggle="tooltip" data-bs-original-title="Delete Agriculteur" class="material-icons text-secondary position-relative text-lg">delete</i>
                        </a>
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

