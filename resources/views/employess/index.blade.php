@extends('welcome')
@section('content')
 <hr>
<button type="button" class="btn btn-primary CreatesEmployees">
    Crear Empeleado 
</button>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Tipo de documento</th>
      <th scope="col">#</th>
      <th scope="col">Lugar</th>
      <th scope="col">Departamento</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($employess as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->name }}</td>

      <td>@if ($item->document_type == 1)
            Cedula de ciudadania
          @elseif($item->document_type == 2)
            Tarjeta de identidad
          @else
             Pasaporte
         @endif
        
      </td>
      <td>{{ $item->document_number }}</td>
      <td>{{ $item->position }}</td>
      <td>{{ $item->department }}</td>
      <td>
        <button type="button" class="btn btn-success btn-sm" onclick="editEmployess ({{ $item->id }})" >Editar</button>
        {{-- <button type="button" class="btn btn-danger btn-sm">Eliminar</button> --}}

      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>

@include('employess.modal')
@endsection
