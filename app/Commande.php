<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'etat','totale','idPanier'
    ];
    public function getwithType()
    {
    	return $this->belongsTo(Soustype::class);
    }

}
