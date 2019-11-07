<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Magasin;
use Illuminate\Support\Facades\DB;
class MagasinsController extends BaseController
{
public function index()
{
    # code...
    $Magasins = Magasin::all();
    return $this->sendResponse($Magasins->toArray(), 'Magasins readed succesfully');
}
public function getprodmags($id)
{
    # code...
    $prods = DB::table('magasins')
    ->join('prodmag', function ($join) {
        $join->on('magasins.idMag', '=', 'prodmag.idMag');
    }
    )
    ->join('produits', function ($join) {
        $join->on('produits.idProd', '=', 'prodmag.idProd');
    })
    ->select('produits.*', 'prodmag.*','magasins.*')
    -> where ('produits.idProd', $id)
    ->get();
    return $this->sendResponse($prods->toArray(), 'Products readed succesfully');
}
public function getmagsbytype($id)
{
    # code...
    $prods = DB::table('magasins')
    ->join('categories', function ($join) {
        $join->on('magasins.idCateg', '=', 'categories.idCateg');
    }
    )
    ->select('categories.nomCateg','magasins.*')
    -> where ('categories.idCateg', $id)
    ->get();
    return $this->sendResponse($prods->toArray(), 'mags readed succesfully');
}

}


