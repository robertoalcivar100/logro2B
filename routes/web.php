<?php

use App\Http\Controllers\Crud;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('Formulario',[Crud::class,'showFormulario']);
Route::post('Save',[Crud::class,'save']);
Route::get('Vehiculos',[Crud::class,'ViewVehicles']);
Route::get('delete{id}',[Crud::class,'delete']);