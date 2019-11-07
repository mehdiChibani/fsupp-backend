<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Lignepanier;
use App\Panier;
use  Validator ;
use Illuminate\Support\Facades\DB;
class LignePaniersController extends BaseController
{
public function index()
{
    # code...
    $Lignepaniers = Lignepanier::all();
    return $this->sendResponse($Lignepaniers->toArray(), 'lignes readed succesfully');
}
public function store(Request $request)
{
    $input = $request->all();
    $validator =    Validator::make($input, [
    'QtCmd'=> 'required',
    'IdProd'=> 'required',
    'totale'=> 'required',
    ] );
    if ($validator -> fails()) {
        # code...
        return $this->sendError('error validation', $validator->errors());
    }
    $pan = DB::table('paniers')
    -> where ('paniers.idClient', 1)
    ->get();
    $totale=8;
    $user=8;
    foreach ($pan as $pan1) {
        $totale=$pan1->totale;
        $user=$pan1->id;
    }

    //return $this->sendResponse($pan->toArray(), 'Book  created succesfully');
    # code...
    $panier=new Panier();
    $lgnpan = array (
        "IdProd"  =>$input["IdProd"],
        "QtCmd"  =>$input["QtCmd"],
        "idPanier" =>"1",
    );
    $lgnpanI = Lignepanier::create($lgnpan);
    ///$panier->totale =$totale+(double)$input["totale"];
    //$panier->idClient =$user;
    Panier::where('id', $user)
    ->update(['totale' => $totale+(double)$input["totale"]]);
    return $this->sendResponse($lgnpanI->toArray(), 'lgnpan created succesfully');
}

}
