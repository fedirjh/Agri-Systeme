<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Rapport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class RapportController extends Component
{
    public $user;
    public $region, $varite, $cycle, $densite,$date_plantation,$editId,$deleteId,$nombre_plant,$rendement,$regions;
    public $mode ;

    public function mount()
    {
        $this->regions = ['Béja','Jendouba','Cape Bon','Sidi Bouzid','kairouan','Gafsa'];
        $this->mode = 'list';
    }

    public function render()
    {
        return view('livewire.rapport.index', [
            'rapports' => Rapport::all(),
        ]);
    }

    private function resetInputFields(){
        $this->region = '';
        $this->varite = '';
        $this->cycle = '';
        $this->densite = '';
        $this->editId = '';
        $this->date_plantation = '';
        $this->nombre_plant = '';
        $this->rendement = '';
    }


    /**
     * @throws ValidationException
     */
    public function store(){

        $this->validate([
            'region'           => 'required|',
            'varite'       => 'required',
            'cycle'        =>  'required',
            'densite'         =>  'required|',
            'date_plantation'      => 'required',
            'nombre_plant'       => 'required',
            'rendement'       => 'required|',
        ]);

        $rapport= new Rapport();
        $rapport->region = $this->region;
        $rapport->varite = $this->varite;
        $rapport->cycle = $this->cycle;
        $rapport->densite = $this->densite;
        $rapport->date_plantation= new Carbon($this->date_plantation);
        $rapport->nombre_plant = $this->nombre_plant;
        $rapport->rendement = $this->rendement;
        $superficie = (int) $this->nombre_plant / (int) $this->densite ;
        $rapport->superficie = $superficie;

        $rapport->date_recolte = Carbon::now()->addDays($this->cycle);
        $rapport->quantite = $superficie * (int) $this->rendement;
        $rapport->save();

        $this->mode = 'list';
        session()->flash('status','Rapport has been created !');
        $this->resetInputFields();

        // return back()->withStatus('Agriculteur Created Successfully.');
    }

    public function update(){

        $this->validate ([
            'region'           => 'required|',
            'varite'       => 'required',
            'cycle'        =>  'required',
            'densite'         =>  'required|',
            'date_plantation'      => 'required',
            'nombre_plant'       => 'required',
            'rendement'       => 'required|',
        ]);
        $rapport= Rapport::findOrFail($this->editId);
        $rapport->region = $this->region;
        $rapport->varite = $this->varite;
        $rapport->cycle = $this->cycle;
        $rapport->densite = $this->densite;
        $rapport->date_plantation = new Carbon($this->date_plantation);
        $rapport->nombre_plant = $this->nombre_plant;
        $rapport->rendement = $this->rendement;
        $superficie = (int) $this->nombre_plant / (int) $this->densite ;
        $rapport->superficie = $superficie;

        // $rapport->date_plantation= Carbon::now();

        $rapport->date_recolte = Carbon::now()->addDays($this->cycle);
        $rapport->quantite = $superficie * (int) $this->rendement;
        $rapport->save();

        $this->mode = 'list';
        session()->flash('status','Rapport has been updated !');
        $this->resetInputFields();

        // return back()->withStatus('Agriculteur Created Successfully.');
    }


    public function edit($id){

        $item = Rapport::findOrFail($id);
        $this->region = $item->region;
        $this->varite = $item->varite;
        $this->cycle = $item->cycle;
        $this->densite = $item->densite;
        $this->editId = $item->id;
        $this->date_plantation = $item->date_plantation;
        $this->nombre_plant = $item->nombre_plant;
        $this->rendement = $item->rendement;
        $this->mode = 'edit';
    }

    public function delete(){
        $item = Rapport::find($this->deleteId);
        $item->delete();
        session()->flash('status', 'Rapport has been deleted !.');
    }
}
