@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">

{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<a href="{{ url('/usuario/create') }}" class="btn btn-success">Crear registro</a>
<br>
<br>
<table class="table table light">

    <thead class="thead-light">
        <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>CURP</th>
        <th>Dosis</th>
        <th>Fecha</th>
        <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->nombre }}</td>
            <td>{{ $usuario->correo }}</td>
            <td>{{ $usuario->curp }}</td>
            <td>{{ $usuario->dosis }}</td>
            <td>{{ $usuario->created_at }}</td>
            <td>
                <a href="{{ url('/usuario/'.$usuario->id.'/edit') }}" class="btn btn-primary">Editar</a>    
             | 
                
                <form action="{{ url('/usuario/'.$usuario->id) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection