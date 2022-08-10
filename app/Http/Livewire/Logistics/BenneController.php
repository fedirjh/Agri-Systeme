<?php

namespace App\Http\Livewire\Logistics;

use App\Benne;
use App\Transporteur;
use Livewire\Component;

class BenneController extends Component
{
    // use WithPagination;
    public $transporteurs;
    public $transportAffect;
    public $nbenne, $long, $larg, $haut, $req,$editId,$deleteId;
    public $mode ;

    public function mount()
    {
        $this->mode = 'list';
        $this->transporteurs = Transporteur::all();
    }

    public function render(){

        //$this->Bennes = Benne::paginate(10);
        return view('livewire.logistics.benne.index', [
            'bennes' => Benne::with('transporteur')->get()
        ]);

    }

    private function resetInputFields(){
        $this->nbenne = '';
        $this->long = '';
        $this->larg = '';
        $this->haut = '';
        $this->req = '';
        $this->editId = '';
        $this->transportAffect = "0";
    }

    public function affecter(){

        $item = Benne::find($this->editId);

        if( $this->transportAffect !=  "0" ){
            $item->associate($this->transportAffect);
        } else {
            $item->disassociate();
        }
        $item->save();
        $this->mode = 'list';
        session()->flash('success', 'Benne Affected Successfully.');
        $this->resetInputFields();
    }

    public function store(){

        $validatedData = $this->validate([
            'nbenne'       =>     'required|',
            'long'         =>     'required|between:0,99.99' ,
            'larg'         =>     'required|between:0,99.99' ,
            'haut'         =>     'required|between:0,99.99',
            'req'          =>     'required|',
        ]);

        $item = Benne::create($validatedData);
        /*if( $this->transportAffect !=  "0" ){
            $item->associate($this->transportAffect);
        } else {
            $item->disassociate();
        }*/
        $item->save();
        $this->mode = 'list';
        session()->flash('status','Benne Created Successfully.');
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nbenne'       =>     'required|',
            'long'         =>     'required|between:0,99.99' ,
            'larg'         =>     'required|between:0,99.99' ,
            'haut'         =>     'required|between:0,99.99',
            'req'          =>     'required|',
        ]);

        $item = Benne::find($this->editId);
        $item->update($validatedData);

       /* if( $this->transportAffect !=  "0" ){
            $item->associate($this->transportAffect);
        } else {
            $item->disassociate();
        }*/

        $item->save();
        $this->mode = 'list';
        session()->flash('status', 'Benne Updated Successfully.');
        $this->resetInputFields();
    }

    public function edit($id,$mode){

        $item = Benne::findOrFail($id);
        $this->nbenne = $item->nbenne;
        $this->editId = $item->id;
        $this->long = $item->long;
        $this->larg = $item->larg;
        $this->haut = $item->haut;
        $this->req = $item->req;
        $this->transportAffect = $item->transporteur_id ?? "0" ;
        $this->mode = $mode;
    }

    public function delete(){

        $item = Benne::find($this->deleteId);
        $item->disassociate();
        $item->delete();
        session()->flash('status', 'Benne Deleted Successfully.');
    }

}
