<h1>{{$modo}} registro</h1>

@if(count($errors)>0)
 <div class="alert alert-danger" role="alert">
   <ul>  
    @foreach($errors->all() as $error)
         <li> {{$error}} </li>
    @endforeach
   </ul> 
 </div>

@endif

<div class="form-group">
<label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($usuario->nombre)?$usuario->nombre:old('nombre')}}">

</div>    
<div class="form-group">
    <label for="correo">Correo</label>
    <input type="text" class="form-control" name="correo" value="{{isset($usuario->correo)?$usuario->correo:old('correo')}}">
</div>
<div class="form-group">
    <label for="curp">CURP</label>
    <input type="text" class="form-control" name="curp" value="{{isset($usuario->curp)?$usuario->curp:old('curp')}}">
</div>
<div class="form-group">
    <label for="dosis">Dosis</label>
    <input type="text" class="form-control" name="dosis" value="{{isset($usuario->dosis)?$usuario->dosis:old('dosis')}}">
</div>
    <label for=""></label>
    <input class="btn btn-success" type="submit" value="{{$modo}} Datos">

    <a class="btn btn-primary" href="{{ url('/usuario/') }}">Regresar</a>