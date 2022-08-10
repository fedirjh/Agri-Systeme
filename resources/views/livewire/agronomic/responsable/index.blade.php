<div class="container-fluid py-4">
    <x-notification/>
    <div class="row">
        <div class="col-12">
            @if($mode === 'create')
                @include('livewire.agronomic.responsable.create')
            @elseif($mode === 'edit')
                @include('livewire.agronomic.responsable.edit')
            @else
                @include('livewire.agronomic.responsable.list')
            @endif
        </div>
    </div>
</div>



