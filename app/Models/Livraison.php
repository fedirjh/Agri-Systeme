<?php

namespace App\Models;

use App\Transporteur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = [ 'status', 'remarque', 'quantityLivraison','quantityReception','livraisonDate','receptionDate'];

    public function agriculteur(): BelongsTo
    {
        return $this->belongsTo(Agriculteur::class,'agriculteur_id');
    }

    public function transporteur(): BelongsTo
    {
        return $this->belongsTo(Transporteur::class,'transporteur_id');
    }

    public function entities(): BelongsToMany
    {
        return $this->belongsToMany(Entity::class)->withPivot(['quantityLivraison','quantityReception']);
    }

    public function getLivraisonEntityValue($eid,$lid){
        return \DB::table('entity_livraison')->where(['entity_id'=>$eid,'livraison_id' => $lid])->first()->quantityLivraison ?? 0;
    }
}
