<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Add Admins</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-plus text-info" aria-hidden="true"></i>
                    Create new Admin
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
            <div class="form-group col-12 col-md-6 ps-0 input-group-outline mt-3 @if(strlen($name ?? '') > 0) is-filled @endif">
                <label for="name">Name</label>
                <input wire:model="name"
                       type="text"
                       class="form-control border border-2 p-2"
                       id="name"
                       placeholder="Enter Nom"
                       onfocus="focused(this)" onfocusout="defocused(this)">
                @error('name')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>
                <div class="form-group col-12 col-md-6 pe-0 input-group-outline mt-3 @if(strlen($username ?? '') > 0) is-filled @endif">
                    <label for="name">Username</label>
                    <input wire:model="username"
                           type="text"
                           class="form-control border border-2 p-2"
                           id="username"
                           placeholder="Enter Pseudo"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('username')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
            </div>

            <div class="form-group col-12 col-md-6 input-group-outline mt-3 @if(strlen($email ?? '') > 0) is-filled @endif">
                <label for="tel">Email</label>
                <input wire:model="email"
                       type="email"
                       class="form-control border border-2 p-2"
                       id="tel"
                       placeholder="Enter Email"
                       onfocus="focused(this)" onfocusout="defocused(this)">
                @error('email')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>


                <div class="row col-12 col-md-6">
                    <div class="form-group col-12 col-md-6 ps-0 input-group-outline mt-3 @if(strlen($password ?? '') > 0) is-filled @endif">
                        <label for="tel">Password</label>
                        <input wire:model="password"
                               type="password"
                               class="form-control border border-2 p-2"
                               id="password"
                               placeholder="Enter password"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('zone')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="form-group col-12 col-md-6 pe-0 input-group-outline mt-3 @if(strlen($password_confirmation ?? '') > 0) is-filled @endif">
                        <label for="tel">Confirm Password</label>
                        <input wire:model="password_confirmation"
                               type="password"
                               class="form-control border border-2 p-2"
                               id="password_confirmation"
                               placeholder="Enter password"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('password_confirmation')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

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
                                        @this.set('role', values);
                                    })">
                <label for="tel">Assign Roles</label>
                <select name="roles[]" wire:model="role"  x-ref="multiple" id="roles" class="border border-2 p-2" multiple>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-dark mt-5">Create Admin</button>
        </form>
    </div>
</div>
