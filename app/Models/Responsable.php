<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    protected $fillable = ['nom_prenom','cin','tel','email'];
    
    public function agriculteurs(){
        return $this->hasMany(Agriculteur::class,'responsable_id');
    }

    public function assignAgriculteur($agriculteur){
        $this->agriculteurs()->attach($agriculteur);
    }
}
