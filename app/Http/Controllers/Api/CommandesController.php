<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Commande;
use  Validator ;
class CommandesController extends BaseController
{
public function index()
{
    # code...
    $Commandes = Commande::all();
    return $this->sendResponse($Commandes->toArray(), 'Books read succesfully');
}
public function store(Request $request)
{
    # code...
    $input = $request->all();
    $validator =    Validator::make($input, [
    'date'=> 'required',
    'etat'=> 'required',
    'totale'=>'required',
    ] );
    if ($validator -> fails()) {
        # code...
        return $this->sendError('error validation', $validator->errors());
    }
    $lgncmd = array (
        "date"  =>$input["date"],
        "etat"  =>$input["etat"],
        "totale" =>$input["totale"],
        "idPanier" =>1,
    );
    $lgncmd = Commande::create($lgncmd);
    return $this->sendResponse($lgncmd->toArray(), 'lgncmd created succesfully');

}



}
