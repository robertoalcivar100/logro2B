@extends('app')
@section('contenido')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Color</th>
      <th>Categoria</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lista_vehiculos as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->marca}}</td>
      <td>{{$item->modelo}}</td>
      <td>{{$item->color}}</td>
      <td>{{$item->categoria}}</td>
      <td>
        <a href="{{url('edit')}}"><i class="bi bi-pencil-square"></i></a>
        <a href="{{url('delete'. $item->id)}}"><i class="bi bi-trash3-fill"></i></a>
      </td>
    </tr> 
    @endforeach
  </tbody>
</table>
@endsection
