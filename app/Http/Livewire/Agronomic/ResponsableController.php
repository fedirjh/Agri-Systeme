<?php

namespace App\Http\Livewire\Agronomic;

use App\Models\Responsable;
use Livewire\Component;

class ResponsableController extends Component
{
    public $nom_prenom, $cin, $tel, $email,$item_id,$deleteId;
    public $mode ;

    public function mount()
    {
        $this->mode = 'list';
    }

    public function render(){

        return view('livewire.agronomic.responsable.index', [
            'responsables' => Responsable::with('agriculteurs')->get()
        ]);

    }

    private function resetInputFields(){
        $this->nom_prenom = '';
        $this->cin = '';
        $this->tel = '';
        $this->email = '';
        $this->item_id = '';
    }

    public function store(){

        $validatedData = $this->validate([
            'nom_prenom'       => 'required|',
            'cin'              =>  'required|unique:responsables,cin,' ,
            'tel'              =>  'required' ,
            'email' => 'required|max:100|email|unique:responsables,email,',
        ]);

        $item = Responsable::create($validatedData);
        $item->save();
        $this->mode = 'list';
        session()->flash('status','Responsable Created Successfully.');
        $this->resetInputFields();
    }

    public function update()
    {
        $item = Responsable::find($this->item_id);

        $validatedData = $this->validate([
            'nom_prenom'       => 'required|',
            'cin'              =>  'required|unique:responsables,cin,'.$item->id ,
            'tel'              =>  'required' ,
            'email' => 'required|max:100|email|unique:responsables,email,'.$item->id,
        ]);

        $item = Responsable::find($this->item_id);
        $item->update($validatedData);

        $item->save();
        $this->mode = 'list';
        session()->flash('status', 'Responsable Updated Successfully.');
        $this->resetInputFields();
    }

    public function edit($id){

        $item = Responsable::findOrFail($id);
        $this->nom_prenom = $item->nom_prenom ;
        $this->item_id = $item->id;
        $this->cin = $item->cin;
        $this->tel = $item->tel;
        $this->email = $item->email;
        $this->mode = 'edit';
    }

    public function delete(){

        Responsable::find($this->deleteId)->delete();
        session()->flash('status', 'Responsable Deleted Successfully.');

    }

    public function deleteId($id){
        $this->deleteId = $id;
    }
}
