<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Categorie;

class CategoriesController extends BaseController
{
public function index()
{
    # code...
    $categories = Categorie::all();
    return $this->sendResponse($categories->toArray(), 'Categories readed succesfully');
}


}
