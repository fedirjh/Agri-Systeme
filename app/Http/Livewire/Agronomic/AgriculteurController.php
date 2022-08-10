<?php

namespace App\Http\Livewire\Agronomic;

use App\Models\Agriculteur;
use App\Models\Responsable;
use Livewire\Component;

class AgriculteurController extends Component
{
    // use WithPagination;
    public $responsables;
    public $responsableAffect;
    public $nom_prenom, $tel, $cin, $zone, $region,$editId,$deleteId,$status,$type;
    public $mode ;
    public $regions;

    public function mount()
    {
        $this->regions = ['Béja','Jendouba','Cape Bon','Sidi Bouzid','kairouan','Gafsa'];
        $this->mode = 'list';
        $this->responsables = Responsable::all();
    }

    public function render(){

        //$this->agriculteurs = Agriculteur::paginate(10);
        return view('livewire.agronomic.agriculteur.index', [
            'agriculteurs' => Agriculteur::all(),
        ]);

    }

    private function resetInputFields(){
        $this->nom_prenom = '';
        $this->tel = '';
        $this->cin = '';
        $this->zone = '';
        $this->region = '';
        $this->editId = '';
        $this->status = '';
        $this->type = 'agriculteur';
        $this->responsableAffect = "0";
    }

    public function affecter(){

        $agri = Agriculteur::find($this->editId);

        if( $this->responsableAffect !=  "0" ){
            $agri->associate($this->responsableAffect);
        } else {
            $agri->disassociate();
        }
        $agri->save();
        $this->mode = 'list';
        session()->flash('success', 'Agriculteur Affected Successfully.');
        $this->resetInputFields();
    }

    public function store(){

        $validatedData = $this->validate([
            'nom_prenom'       => 'required',
            'cin'              =>  'required' ,
            'tel'              =>  'required' ,
            'zone'             => 'required',
            'region'           => 'required',
            'type'           => 'required',
        ]);

        $item = Agriculteur::create($validatedData);

        /*if( $this->responsableAffect !=  "0" ){
            $item->associate($this->responsableAffect);
        } else {
            $item->disassociate();
        }
        $item->save();*/

        $this->mode = 'list';
        session()->flash('status','Agriculteur Created Successfully.');
        $this->resetInputFields();
        // return back()->withStatus('Agriculteur Created Successfully.');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nom_prenom'       => 'required',
            'cin'              =>  'required' ,
            'tel'              =>  'required' ,
            'zone'             => 'required',
            'region'           => 'required',
            'status'           => 'required',
            'type'           => 'required'
        ]);

        $agri = Agriculteur::find($this->editId);
        $agri->update($validatedData);

        /*if( $this->responsableAffect !=  "0" ){
            $agri->associate($this->responsableAffect);
        } else {
            $agri->disassociate();
        }*/

        $agri->save();

        $this->mode = 'list';
        session()->flash('status', 'Agriculteur Updated Successfully.');
        $this->resetInputFields();
    }

    public function edit($id,$mode){

        $agri = Agriculteur::findOrFail($id);
        $this->nom_prenom = $agri->nom_prenom;
        $this->editId = $agri->id;
        $this->tel = $agri->tel;
        $this->cin = $agri->cin;
        $this->zone = $agri->zone;
        $this->region = $agri->region;
        $this->status = $agri->status;
        $this->type = $agri->type;
        $this->responsableAffect = $agri->responsable_id ?? "0" ;
        $this->mode = $mode;
    }

    public function delete(){

        $item = Agriculteur::find($this->deleteId);
        $item->disassociate();
        $item->delete();
        session()->flash('status', 'Agriculteur Deleted Successfully.');
    }

}
