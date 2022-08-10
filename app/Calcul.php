<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calcul extends Model
{
    protected $fillable = ['region','varite','cycle','densite','datep','nbrp','superficie','rdm','dater','quantite'] ;
}
