<?php

namespace App\Http\Livewire\Stock;

use App\Models\Entity;
use Livewire\Component;

class EntityController extends Component
{

    public $ref ,$category ,$quantityTotal ,$remarque,$editId,$deleteId;
    public $mode ;

    public function mount()
    {
        $this->mode = 'list';
    }

    private function resetInputFields(){
        $this->ref = '';
        $this->category = '';
        $this->quantityTotal = '';
        $this->remarque = '';
        $this->editId = '';
    }

    public function store(){

        $validatedData = $this->validate([
            'ref' => 'required|max:50|unique:entities',
            'category' => 'required',
            'quantityTotal' => 'required',
            'remarque' => '',
        ]);

        Entity::create($validatedData);

        $this->mode = 'list';
        session()->flash('status','Entity has been created !');
        $this->resetInputFields();
    }

    public function update(){

        $item = Entity::find($this->editId);

        $validatedData = $this->validate([
            'ref' => 'required|max:50|unique:entities,ref,'.$item->id,
            'category' => 'required',
            'quantityTotal' => 'required',
            'remarque' => '',
        ]);

        $item->update($validatedData);

        $this->mode = 'list';
        session()->flash('status','Entity has been updated !');
        $this->resetInputFields();

    }

    public function edit($id){

        $item = Entity::findOrFail($id);
        $this->ref = $item->ref;
        $this->editId = $item->id;
        $this->quantityTotal = $item->quantityTotal;
        $this->category = $item->category;
        $this->remarque = $item->remarque;
        $this->mode = 'edit';

    }

    public function delete(){
        session()->flash('error', 'You can not delete !.');
    }

    public function render()
    {
        return view('livewire.stock.entity.index',['entities' => Entity::all()]);
    }
}
