<?php

namespace App;

use App\Models\ParkTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transporteur extends Model
{

    use HasFactory;
    protected $fillable = ['nom','tel','cin','mat','zone','matricule','type','garntie','montant','rq','status','contrat'];
   

    public function bennes(): HasMany{
        return $this->hasMany(Benne::class,'transporteur_id');
    }

    public function transactions(): HasMany{
        return $this->hasMany(ParkTransaction::class,'card_id','card_id');
    }

    public function assignBenne($benne){
        $this->bennes()->attach($benne);
    }
}
