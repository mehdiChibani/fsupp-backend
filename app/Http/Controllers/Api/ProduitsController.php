<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Produit;
use Illuminate\Support\Facades\DB;
class ProduitsController extends BaseController
{
public function index()
{
    # code...
    $prods = Produit::all();
    return $this->sendResponse($prods->toArray(), 'Products readed succesfully');
}
public function getprodandtypes()
{
    # code...
    $prods = DB::table('produits')
    ->join('soustypes', function ($join) {
        $join->on('produits.idType', '=', 'soustypes.id');
    }


    )
    ->select('produits.*', 'soustypes.nom')

    ->get();
    return $this->sendResponse($prods->toArray(), 'Products readed succesfully');
}
public function getProdsBySt($id,$idm)
{
    # code...
    $prods = DB::table('produits')
    ->join('soustypes', function ($join) {
        $join->on('produits.idType', '=', 'soustypes.id');
    }
    )
    ->join('prodmag', function ($join) {
        $join->on('produits.idProd', '=', 'prodmag.idProd');
    }
    )
    ->select('soustypes.*','produits.*','prodmag.prix')
    -> where ('soustypes.id', $id)
    -> where ('prodmag.idMag', $idm)
    ->distinct()
    ->get();
    return $this->sendResponse($prods->toArray(), 'St readed succesfully');
}
public function getProdsDetails($id)
{
    # code...
    $prods = DB::table('produits')
    ->join('soustypes', function ($join) {
        $join->on('produits.idType', '=', 'soustypes.id');
    }
    )
    ->join('prodmag', function ($join) {
        $join->on('produits.idProd', '=', 'prodmag.idProd');
    }
    )
    ->select('prodmag.*','produits.*')
    -> where ('produits.idProd', $id)
    ->distinct()
    ->get();
    return $this->sendResponse($prods->toArray(), 'details readed succesfully');
}
}
