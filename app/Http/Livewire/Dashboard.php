<?php

namespace App\Http\Livewire;

use App\Benne;
use App\Models\Agriculteur;
use App\Models\Entity;
use App\Models\Livraison;
use App\Models\Responsable;
use App\Transporteur;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $liraisons = Livraison::all();
        $inUse = Entity::all()->sum('quantityUsed');
        $stock = Entity::all()->sum('quantityTotal');
        return view('livewire.dashboard',[
            'transporteurs' => Transporteur::all(),
            'bennes' => Benne::all(),
            'agriculteurs' => Agriculteur::all(),
            'responsables' => Responsable::all(),
            'stock' => $stock,
            'inUse' => $inUse,
            'enLivraison' => $liraisons->where('status',0)->sum('quantityLivraison'),
            'livred' => $liraisons->where('status',1)->sum('quantityLivraison'),
            //'recept' => $liraisons->where('status',2)->sum('quantityLivraison'),
            'enAttente' => $liraisons->where('status',3)->sum('quantityLivraison'),
            'reject' => $liraisons->where('status',4)->sum('quantityLivraison'),
            'entities' => Entity::all(),//->sum('quantityTotal')
            'liraisons' => $liraisons,
        ]);
    }
}
