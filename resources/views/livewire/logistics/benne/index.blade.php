<div class="container-fluid py-4">
    <x-notification/>
    <div class="row">
        <div class="col-12">
            @if($mode === 'create')
                @include('livewire.logistics.benne.create')
            @elseif($mode === 'edit')
                @include('livewire.logistics.benne.edit')
            @elseif($mode === 'affect')
                @include('livewire.logistics.benne.affecter')
            @else
                @include('livewire.logistics.benne.list')
            @endif
        </div>
    </div>
</div>



