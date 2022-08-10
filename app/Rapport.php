<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    protected $fillable = ['region','varite','cycle','densite','date_plantation','nombre_plant','superficie','rendement','date_recolte','quantite'] ;

}
