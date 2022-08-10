<div class="container-fluid py-4">
    <x-notification/>
    <div class="row">
        <div class="col-12">
            @if($mode === 'create')
                @include('livewire.agronomic.agriculteur.create')
            @elseif($mode === 'edit')
                @include('livewire.agronomic.agriculteur.edit')
            @elseif($mode === 'affect')
                @include('livewire.agronomic.agriculteur.affecter')
            @else
                @include('livewire.agronomic.agriculteur.list')
            @endif
        </div>
    </div>
</div>



