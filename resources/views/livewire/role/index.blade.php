<div class="container-fluid py-4">
    <x-notification/>
    <div class="row">
        <div class="col-12">
            @if($mode === 'create')
                @include('livewire.role.create')
            @elseif($mode === 'edit')
                @include('livewire.role.edit')
            @else
                @include('livewire.role.list')
            @endif
        </div>
    </div>
</div>



