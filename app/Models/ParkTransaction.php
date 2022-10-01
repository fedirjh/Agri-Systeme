<?php

namespace App\Models;

use App\Transporteur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParkTransaction extends Model
{
    use HasFactory;
    protected $fillable = ['card_id','status','entry_time','exit_time'];

    public function transporteur(): BelongsTo
    {
        return $this->belongsTo(Transporteur::class,'card_id','card_id');
    }
}
