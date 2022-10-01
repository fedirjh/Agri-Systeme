<?php

namespace App\Http\Livewire\Logistics;

use App\Benne;
use App\Transporteur;
use Livewire\Component;

class TransporteurController extends Component
{
    // use WithPagination;
    //public $Transporteurs;
    public $card_id,$nom, $tel, $cin, $zone, $matricule,$item_id,$deleteId,$type,$garntie,$montant,$rq,$mat,$status,$contrat,$validatedData,$editId;
    public $mode;
    public $rule;

    public function mount()
    {
        $this->mode = 'list';
        $this->rule = [
            'nom'            =>       'required|',
            'tel'            =>        'required|min:8|max:10',
            'cin'            =>        'required',
            'zone'           =>        'required|',
            'matricule'      =>        'required|',
            'type'           =>        'required|',
            'garntie'        =>        'required|',
            'montant'        =>        'required|',
            'rq'             =>        'required|',
            'mat'            =>        'required',
            'status'            =>        '',
            'contrat'            =>        '',

        ];
    }

    public function render(){

        //$this->Transporteurs = Transporteur::paginate(10);
        return view('livewire.logistics.transporteur.index', [
            'transporteurs' => Transporteur::with('bennes')->get(),
        ]);

    }

    private function resetInputFields(){
        $this->nom = '';
        $this->editId = '';
        $this->card_id = '';
        $this->tel = '';
        $this->cin = '';
        $this->zone = '';
        $this->item_id = '';
        $this->rq = '';
        $this->montant = '';
        $this->garntie = '';
        $this->type = '';
        $this->deleteId = null;
        $this->matricule = '';
        $this->status = '';
        $this->contrat = '';
        $this->mat = '';
    }


    public function affecter(){

        $item = Transporteur::find($this->editId);
        $item->card_id = $this->card_id;
        $item->save();
        $this->mode = 'list';
        session()->flash('success', 'Transporteur Affected Successfully.');
        $this->resetInputFields();
    }

    public function store(){

        $this->status = 0;
        $this->contrat = 0;

        $this->validatedData = $this->validate($this->rule);
        Transporteur::create($this->validatedData);
        $this->mode = 'list';
        session()->flash('status','Transporteur Created Successfully.');
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate($this->rule);

        $item = Transporteur::find($this->item_id);
        $item->update($validatedData);

        $this->mode = 'list';
        session()->flash('status', 'Transporteur Updated Successfully.');
        $this->resetInputFields();
    }

    public function edit($id,$mode){

        $item = Transporteur::findOrFail($id);
        $this->editId = $item->id;
        $this->card_id = $item->card_id;
        $this->nom = $item->nom;
        $this->item_id = $item->id;
        $this->tel = $item->tel;
        $this->cin = $item->cin;
        $this->zone = $item->zone;
        $this->type = $item->type;
        $this->matricule = $item->matricule;
        $this->garntie = $item->garntie;
        $this->montant = $item->montant;
        $this->rq = $item->rq;
        $this->mat = $item->mat;
        $this->status = $item->status;
        $this->contrat = $item->contrat;
        $this->mode = $mode;
    }

    public function delete(){
        Transporteur::find($this->deleteId)->delete();
        session()->flash('status', 'Transporteur Deleted Successfully.');
    }

    public function setDeleteId($id){
        $this->deleteId = $id;
    }
}
