<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Sousetype;
use Illuminate\Support\Facades\DB;
class SousTypesController extends BaseController
{
public function index()
{
    # code...
    $Sousetype = Sousetype::all();
    return $this->sendResponse($Sousetype->toArray(), 'St readed succesfully');
}
public function getStBymag($id)
{
    # code...
    $prods = DB::table('soustypes')
    ->join('produits', function ($join) {
        $join->on('soustypes.id', '=', 'produits.idType');
    }
    )
    ->join('prodmag', function ($join) {
        $join->on('produits.idProd', '=', 'prodmag.idProd');
    }
    )
    ->join('magasins', function ($join) {
        $join->on('prodmag.idMag', '=', 'magasins.idMag');
    }
    )
    ->select('soustypes.*','magasins.*')
    -> where ('prodmag.idMag', $id)

    ->distinct()
    ->get();
    return $this->sendResponse($prods->toArray(), 'St readed succesfully');
}
}
