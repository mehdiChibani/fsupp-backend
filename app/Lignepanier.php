<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lignepanier extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'QtCmd','idPanier', 'IdProd',
    ];

}
