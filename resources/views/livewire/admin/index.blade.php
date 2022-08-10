<div class="container-fluid py-4">
    <x-notification/>
    <div class="row">
        <div class="col-12">
            @if($mode === 'create')
                @include('livewire.admin.create')
            @elseif($mode === 'edit')
                @include('livewire.admin.edit')
            @else
                @include('livewire.admin.list')
            @endif
        </div>
    </div>
</div>



