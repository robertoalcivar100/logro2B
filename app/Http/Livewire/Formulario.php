<?php

namespace App\Http\Livewire;

use App\Models\DetalleModel;
use App\Models\TipoModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Formulario extends Component
{
    public $detalle, $id_tipo, $id_seleccionado, $Bandera=false;
    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    
    public function render()
    {
        $detalles = DB::table('detalle')
        ->join('tipo','detalle.id_tipo','=','tipo.id')
        ->select('tipo.tipo','detalle.*')
        ->where('detalle.estado',1)->paginate(3);
        $tipos = TipoModel::where('estado',1)->get();
        return view('livewire.formulario',compact('tipos','detalles'));
    }

    public function save(){
        // $this->validate();
        DetalleModel::create([
            'detalle' => $this->detalle,
            'id_tipo' => $this->id_tipo,
            'estado' => 1
        ]);
        $this->reset();
    }

    public function asignarIdSeleccionado($id)
    {
        $this->id_seleccionado = $id;
        $this->edit();
    }

    public function edit(){
        $object = DetalleModel::find($this->id_seleccionado);
        $this->detalle = $object->detalle; 
        $this->id_tipo = $object->id_tipo;
        $this->Bandera = true;
    }

    public function update(){
        $object = DetalleModel::find($this->id_seleccionado);
        $object->detalle = $this->detalle;
        $object->id_tipo = $this->id_tipo;
        $object->update();
        $this->reset();
    }



    
}
