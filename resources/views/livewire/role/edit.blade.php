<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Add Agriculteurs</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-edit text-info" aria-hidden="true"></i>
                    Update Admin
                </p>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <button class="btn bg-gradient-dark mb-0"  wire:click="$set('mode', 'list')">
                    <i class="material-icons">arrow_left</i>&nbsp;&nbsp;Back To List</button>
            </div>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <form wire:submit.prevent="update" class="d-flex flex-column align-items-center">

            <div class="form-group col-12 col-md-6 input-group-outline mt-3 @if(strlen($name ?? '') > 0) is-filled @endif">
                <label for="name">Role Name</label>
                <input wire:model="name"
                       type="text"
                       class="form-control border border-2 p-2"
                       id="name"
                       placeholder="Enter Role Name"
                       onfocus="focused(this)" onfocusout="defocused(this)">
                @error('name')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>

            <div class="form-group col-12 col-md-6 input-group-outline mt-3">
                <label for="name">Permissions</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                    <label class="form-check-label" for="checkPermissionAll">All</label>
                </div>
                <hr>
                @php $i = 2; @endphp
                @foreach ($permission_groups as $group)
                    <div class="row" wire:ignore>
                        <div class="col-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input manageRoles" id="{{ $i }}Management" value="{{$i}}">
                                <label class="form-check-label" for="checkPermission">{{ $group["name"] }}</label>
                            </div>
                        </div>

                        <div class="col-9 role-{{ $i }}-management-checkbox">
                            @php
                                $permissionsbyGroup = App\User::getpermissionsByGroupName($group["name"]);
                                $j = 1;
                            @endphp
                            @foreach ($permissionsbyGroup as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                           wire:model="permissions"
                                           id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                    <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @php  $j++; @endphp
                            @endforeach
                            <br>
                        </div>

                    </div>
                    <hr>
                    @php  $i++; @endphp
                @endforeach


            </div>

            <button type="submit" class="btn btn-dark mt-5">Update Role</button>
        </form>
    </div>
    <script>

        document.getElementById('checkPermissionAll').onclick = function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const values = []
            for (let checkbox of checkboxes) {
                if (!["1","2","3","4","5","6","7"].includes(checkbox.value))
                    values.push(checkbox.value)
                checkbox.checked = this.checked;
            }
            @this.set('permissions', this.checked?values:[]);
        }

        document.querySelectorAll('.manageRoles').forEach((item) => {
            item.onclick = function() {
                const id = this.value

                const checkboxes = document.querySelectorAll(`.role-${id}-management-checkbox input[type="checkbox"]`);
                console.log(checkboxes)
                let values = @this.permissions;
                let v = []

                for (let checkbox of checkboxes) {
                    v.push(checkbox.value)
                    checkbox.checked = this.checked;
                }
                values = this.checked ? values.concat(v): values.filter((item) => !v.includes(item));
                @this.set('permissions', values);
            }
        })

    </script>
</div>
