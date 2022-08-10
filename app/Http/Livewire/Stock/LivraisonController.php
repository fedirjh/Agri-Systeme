<?php

namespace App\Http\Livewire\Stock;

use App\Models\Agriculteur;
use App\Models\Entity;
use App\Models\Livraison;
use App\Transporteur;
use DB;
use Livewire\Component;

class LivraisonController extends Component
{
    public $quantityLivraison, $quantityReception, $livraisonDate, $receptionDate ,$status ,$remarque,$editId,$deleteId,
        $agriculteur_id,$transporteur_id,$agriculteur,$transporteur,$cdate,$mDate;
    public $mode ;
    public $entities ,$agriculteurs,$transporteurs;
    public $entitiesSelected = [];
    public $entitiesSelectedQty = [];
    public $entitiesSelectedQtyRecp = [];
    public $itemEdit = null;

    public function mount()
    {
        $this->mode = 'list';
        $this->entities = Entity::all();
        $this->agriculteurs  = Agriculteur::all();
        $this->transporteurs = Transporteur::all();
        //$this->entitiesSelectedQty = array_map(function(){return 0;},array_flip($this->entities->pluck('id')->toArray()));
    }

    public function addToEntity($value,$id){
        //if (!isset($this->entitiesSelectedQty[$id])){
            $this->entitiesSelectedQty[$id] = ['quantityLivraison' => $value];
        //}else {
          //  $this->entitiesSelectedQty[] = [$id => $value];
       // }
        $this->entitiesSelectedQty = array_filter($this->entitiesSelectedQty, function($v, $k) {
            return in_array($k,$this->entitiesSelected);
        }, ARRAY_FILTER_USE_BOTH);
    }

    public function addToEntityRecept($value,$vr,$id){
        //if (!isset($this->entitiesSelectedQty[$id])){
        $this->entitiesSelectedQtyRecp[$id] = ['quantityReception' => $value,'quantityLivraison' => $value];
        //}else {
        //  $this->entitiesSelectedQty[] = [$id => $value];
        // }
        $this->entitiesSelectedQtyRecp = array_filter($this->entitiesSelectedQtyRecp, function($v, $k) {
            return in_array($k,$this->entitiesSelected);
        }, ARRAY_FILTER_USE_BOTH);
    }

    private function resetInputFields(){
        $this->quantityLivraison = '';
        $this->quantityReception = '';
        $this->livraisonDate = '';
        $this->receptionDate = '';
        $this->status = '';
        $this->remarque = '';
        $this->editId = '';
        $this->agriculteur_id = '';
        $this->transporteur_id = '';

        $this->entitiesSelected = [];
        $this->itemEdit = null;
        $this->entitiesSelectedQty = [];
        $this->entitiesSelectedQtyRecp = [];
    }

    public function store(){

        $validatedData = $this->validate([
            'agriculteur_id' => 'required',
            'transporteur_id' => 'required',
            'entitiesSelected'   => ['required', 'array'],
        ]);

        $this->entitiesSelectedQty = array_filter($this->entitiesSelectedQty, function($v, $k) {
            return in_array($k,$this->entitiesSelected);
        }, ARRAY_FILTER_USE_BOTH);

        $livraison = Livraison::create($validatedData);
        $livraison->transporteur()->associate($this->transporteur_id);
        $livraison->agriculteur()->associate($this->agriculteur_id);
        $livraison->entities()->sync($this->entitiesSelectedQty);
        $livraison->quantityLivraison = $livraison->entities()->sum('quantityLivraison');
        $livraison->save();

        foreach ($this->entitiesSelectedQty as $key => $value) {
            $item = Entity::find($key);
            $item->quantityUsed = $item->quantityUsed + $value['quantityLivraison'];
            $item->save();
        }

        $this->mode = 'list';

        session()->flash('status','Entity has been created !');
        $this->resetInputFields();
    }

    public function update(){

        $item = Livraison::find($this->editId);

        $validatedData = $this->validate([
            'agriculteur_id' => 'required',
            'transporteur_id' => 'required',
            'entitiesSelected'   => ['required', 'array'],
            'status' => 'required',
            'remarque' => ''
        ]);

        $item->update($validatedData);

        $item->transporteur()->associate($this->transporteur_id);
        $item->agriculteur()->associate($this->agriculteur_id);

        if ($this->status == 2) {
            $item->entities()->sync($this->entitiesSelectedQtyRecp);
            $item->quantityReception = $item->entities()->sum('quantityReception');
        }else{
            $item->entities()->sync($this->entitiesSelectedQty);
            $item->quantityLivraison = $item->entities()->sum('quantityLivraison');
        }

        $item->save();

        foreach ($this->entitiesSelectedQty as $key => $value) {
            $item = Entity::find($key);
            $oldLiv = DB::table('entity_livraison')->where(['entity_id'=>$key,'livraison_id' => $this->editId])->first()->quantityLivraison ?? 0;
            $oldRec = DB::table('entity_livraison')->where(['entity_id'=>$key,'livraison_id' => $this->editId])->first()->quantityReception ?? 0;

            if ($this->status == 2) {
                $item->quantityUsed = $item->quantityUsed - $oldRec;
            }else{
                $item->quantityUsed = $item->quantityUsed - $oldLiv + $value['quantityLivraison'];
            }

            $item->save();
        }


        $this->mode = 'list';
        session()->flash('status','Livraison has been updated !');
        $this->resetInputFields();

    }

    public function edit($id){

        $item = Livraison::findOrFail($id);
        $this->quantityLivraison = $item->quantityLivraison;
        $this->quantityReception = $item->quantityReception;
        $this->editId = $item->id;
        $this->status = $item->status;
        $this->agriculteur_id = $item->agriculteur_id;
        $this->transporteur_id = $item->transporteur_id;

        $this->agriculteur = $item->agriculteur;
        $this->transporteur = $item->transporteur;
        $this->remarque = $item->remarque;
        $this->cdate = $item->created_at;
        $this->mDate = $item->updated_at;

        $this->entitiesSelected = $item->entities()->pluck('entity_id')->toArray();
        $this->entitiesSelectedQty = [];
        $this->itemEdit = $item;

        $this->mode = 'edit';

    }

    public function view($id){

        $item = Livraison::findOrFail($id);
        $this->quantityLivraison = $item->quantityLivraison;
        $this->quantityReception = $item->quantityReception;
        $this->editId = $item->id;
        $this->status = $item->status;
        $this->agriculteur_id = $item->agriculteur_id;
        $this->transporteur_id = $item->transporteur_id;
        $this->remarque = $item->remarque;
        $this->agriculteur = $item->agriculteur;
        $this->transporteur = $item->transporteur;
        $this->entitiesSelected = $item->entities;
        $this->entitiesSelectedQty = [];
        $this->itemEdit = $item;
        $this->cdate = $item->created_at;
        $this->mDate = $item->updated_at;
        $this->mode = 'view';

    }

    public function delete(){
        session()->flash('error', 'You can not delete !.');
    }

    public function render()
    {
        return view('livewire.stock.livraison.index',['livraisons' => Livraison::all()]);
    }
}
