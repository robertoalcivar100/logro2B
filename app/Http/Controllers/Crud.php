<?php

namespace App\Http\Controllers;

use App\Models\CategoriasModel;
use App\Models\VehiculoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Crud extends Controller
{
    public function showFormulario(){
        $categorias = CategoriasModel::all();
        return view('formulario', compact('categorias'));
    }

    public function save(Request $request){
        $vehiculo = new VehiculoModel();
        $vehiculo->marca = $request->marca;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->color = $request->color;
        $vehiculo->estado = 1;
        $vehiculo->id_categoria = $request->id_categoria;
        $vehiculo->save();
        return back();
    }

    public function ViewVehicles(){
        $lista_vehiculos = DB::table('vehiculos')
        ->join('categorias','vehiculos.id_categoria','=','categorias.id')
        ->select('vehiculos.*','categorias.*')->where('vehiculos.estado',1)->get();
        return view('vehiculos',compact('lista_vehiculos'));
    }

    public function delete($id){
        $vehiculo = VehiculoModel::find($id);
        $vehiculo->estado = 0;
        $vehiculo->save();
        return back();
    }
}
