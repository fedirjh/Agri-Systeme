<div class="container-fluid py-4">
    <x-notification/>
    <div class="row">
        <div class="col-12">
            @if($mode === 'create')
                @include('livewire.logistics.transporteur.create')
            @elseif($mode === 'edit')
                @include('livewire.logistics.transporteur.edit')
            @else
                @include('livewire.logistics.transporteur.list')
            @endif
        </div>
    </div>
</div>



