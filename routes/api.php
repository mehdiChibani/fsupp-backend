<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('categ', 'API\CategoriesController@index');
Route::get('prods', 'API\ProduitsController@index');
Route::get('prodstypes', 'API\ProduitsController@getprodandtypes');
Route::get('magasins', 'API\MagasinsController@index');
Route::get('prodmagasins/{id}', 'API\MagasinsController@getprodmags');
Route::get('getmagsbytype/{id}', 'API\MagasinsController@getmagsbytype');
Route::get('getStBymag/{id}', 'API\SousTypesController@getStBymag');
Route::get('getProdsBySt/{id}/{idm}', 'API\ProduitsController@getProdsBySt');
Route::get('getProdsDetails/{id}', 'API\ProduitsController@getProdsDetails');
Route::get('lgnpan', 'API\LignePaniersController@index');
Route::post('lgnpan', 'API\LignePaniersController@store');
Route::post('lgncmd', 'API\CommandesController@store');
