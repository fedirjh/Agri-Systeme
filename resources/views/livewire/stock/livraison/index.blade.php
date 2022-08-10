<div class="container-fluid py-4">
    <x-notification/>
    <div class="row">
        <div class="col-12">
            @if($mode === 'create')
                @include('livewire.stock.livraison.create')
            @elseif($mode === 'view')
                @include('livewire.stock.livraison.view')
            @elseif($mode === 'edit')
                @include('livewire.stock.livraison.edit')
            @else
                @include('livewire.stock.livraison.list')
            @endif
        </div>
    </div>
</div>



