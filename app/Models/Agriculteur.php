<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agriculteur extends Model
{
    use HasFactory;

    protected $fillable = ['nom_prenom', 'cin', 'tel', 'zone', 'region', 'status','type'];

    public function hasAnyResponsable()
    {
        return null !== $this->responsable();
    }

    public function responsable(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Responsable::class,'responsable_id');
    }

    public function associate($id)
    {
        $this->responsable()->associate(Responsable::findOrFail($id));
        $this->save();
    }

    public function disassociate()
    {
        $this->responsable()->disassociate();
        $this->save();
    }

}
