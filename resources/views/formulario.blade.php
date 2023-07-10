@extends('app')
@section('contenido')
<div>
    <form action="{{url('Save')}}" method="POST" class="form" style="width: 800px; position: relative;left: 10px;">
        @csrf
        <label for="marca" class="form-text">Marca</label>
        <input id="marca" type="text" class="form-control mt-2  p-1" name="marca">
        <label for="modelo" class="form-text">Modelo</label>
        <input id="modelo" type="text" class="form-control mt-2  p-1" name="modelo">
        <label for="color" class="form-text">Color</label>
        <input id="color" type="text" class="form-control mt-2  p-1" name="color">
        <label for= "categoria" class="form-text">Categoria</label>
        <select name="id_categoria" id="categoria" class="form-control">
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
        <br>
        <button type="submit" class="btn btn-danger mt-3">Registar Vehículo</button>
        <a href="{{url('Vehiculos')}}"><button type="button" class="btn btn-primary mt-3">Ver Productos</button></a>
    </form>
</div>
@endsection