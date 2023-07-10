<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculoModel extends Model
{
    protected $table = "vehiculos";
    public $timestamps = false;
    public $fillable = ['marca','modelo','color','estado','id_categoria'];
}
