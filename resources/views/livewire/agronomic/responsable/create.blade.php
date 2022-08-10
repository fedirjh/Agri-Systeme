<div class="card my-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h5>Add Responsable</h5>
                <p class="text-sm mb-0">
                    <i class="fa fa-plus text-info" aria-hidden="true"></i>
                    Create new Responsable
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

            <div class="form-group col-12 col-md-6 input-group-outline mt-3 @if(strlen($nom_prenom ?? '') > 0) is-filled @endif">
                <label for="nom">Name</label>
                <input wire:model="nom_prenom"
                       type="text"
                       class="form-control border border-2 p-2"
                       id="nom_prenom"
                       placeholder="Enter Nom"
                       onfocus="focused(this)" onfocusout="defocused(this)">
                @error('nom_prenom')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>


                <div class="row col-12 col-md-6">
                    <div class="form-group col-12 col-md-6 ps-0 input-group-outline mt-3 @if(strlen($tel ?? '') > 0) is-filled @endif">
                        <label for="tel">Telephone</label>
                        <input wire:model="tel"
                               type="number"
                               class="form-control border border-2 p-2"
                               id="tel"
                               placeholder="Enter Tel"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('tel')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-6 pe-0 input-group-outline mt-3 @if(strlen($cin ?? '') > 0) is-filled @endif">
                        <label for="tel">CIN</label>
                        <input wire:model="cin"
                               type="number"
                               class="form-control border border-2 p-2"
                               id="cin"
                               placeholder="Enter CIN"
                               onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('cin')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                </div>


                <div class="form-group col-12 col-md-6 input-group-outline mt-3 @if(strlen($email ?? '') > 0) is-filled @endif">
                    <label for="tel">Email</label>
                    <input wire:model="email"
                           type="email"
                           class="form-control border border-2 p-2"
                           id="email"
                           placeholder="Enter Email"
                           onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('email')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>

            <button type="submit" class="btn btn-dark mt-5">Create Responsable</button>
        </form>
    </div>
</div>
