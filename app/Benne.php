<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Benne extends Model
{

    use HasFactory;
    protected $fillable = ['nbenne','long','larg','haut','req'];

    public function transporteur(): BelongsTo
    {
        return $this->belongsTo(Transporteur::class,'transporteur_id');
    }

    public function hasAnyTransporteur(): bool
    {
        return null !== $this->transporteur();
    }

    public function associate($id)
    {
        $this->transporteur()->associate(Transporteur::findOrFail($id));
        $this->save();
    }

    public function disassociate()
    {
        $this->transporteur()->disassociate();
        $this->save();
    }
}
