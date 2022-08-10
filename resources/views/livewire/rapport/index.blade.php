<div class="container-fluid py-4">
    <x-notification/>
    <div class="row">
        <div class="col-12">
            @if($mode === 'create')
                @include('livewire.rapport.create')
            @elseif($mode === 'edit')
                @include('livewire.rapport.edit')
            @else
                @include('livewire.rapport.list')
            @endif
        </div>
    </div>
</div>



