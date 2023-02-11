@extends('welcome')
@section('content')
 <hr>
<button type="button" class="btn btn-primary CreatesAseet">
    Crear Activo 
</button>

<table class="table table-striped">
  <thead>
    <tr>
      {{-- <th scope="col">id</th> --}}
      <th scope="col">Serial</th>
      <th scope="col">Referncia</th>
      <th scope="col">marca comercial</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($asset as $item)
    <tr>
      {{-- <th scope="row">{{ $item->id }}</th> --}}
      <td>{{ $item->serial_code }}</td>        
      <td>{{ $item->refernece }}</td>
      <td>{{ $item->trademark }}</td>
      <td>
      <button type="button" class="btn btn-success btn-sm" onClick="editAsest('{{ $item->serial_code }}')" >Editar</button>
        {{-- <button type="button" class="btn btn-danger btn-sm">Eliminar</button> --}}
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>

@include('company.modal')
@endsection