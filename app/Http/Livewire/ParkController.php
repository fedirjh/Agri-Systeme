<?php

namespace App\Http\Livewire;

use App\Models\ParkTransaction;
use Livewire\Component;

class ParkController extends Component
{
    public $transactions;

    /*public function mount()
    {

    }*/

    public function render()
    {
        $this->transactions  = ParkTransaction::with('transporteur')->get();
        return view('livewire.park.index', [
            'transactions' => $this->transactions,
        ]);
    }

    public function updateComponent(){
        $t = ParkTransaction::with('transporteur')->get();
        if ($t->count() > $this->transactions->count()){
            $this->transactions = $t;
        }
    }
}
