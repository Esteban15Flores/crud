@extends('layouts.app')
@section('content')
<div class="container">

<a href="{{ url('/usuario/create') }}">Crear registro</a>
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
                <a href="{{ url('/usuario/'.$usuario->id.'/edit') }}">Editar</a>    
             | 
                
                <form action="{{ url('/usuario/'.$usuario->id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection