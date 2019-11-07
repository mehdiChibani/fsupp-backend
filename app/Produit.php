<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference', 'image','idType'
    ];
    public function getwithType()
    {
    	return $this->belongsTo(Soustype::class);
    }

}
