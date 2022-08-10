<div class="container-fluid py-4">
    <x-notification/>
    <div class="row">
        <div class="col-12">
            @if($mode === 'create')
                @include('livewire.stock.entity.create')
            @elseif($mode === 'edit')
                @include('livewire.stock.entity.edit')
            @else
                @include('livewire.stock.entity.list')
            @endif
        </div>
    </div>
</div>



