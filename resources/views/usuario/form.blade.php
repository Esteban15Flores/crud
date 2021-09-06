<h1>{{$modo}} registro</h1>
<label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="{{ isset($usuario->nombre)?$usuario->nombre:''}}">
    <br>
    <label for="correo">Correo</label>
    <input type="text" name="correo" value="{{isset($usuario->correo)?$usuario->correo:''}}">
    <br>
    <label for="curp">CURP</label>
    <input type="text" name="curp" value="{{isset($usuario->curp)?$usuario->curp:''}}">
    <br>
    <label for="dosis">Dosis</label>
    <input type="text" name="dosis" value="{{isset($usuario->dosis)?$usuario->dosis:''}}">
    <br>
    <label for=""></label>
    <input type="submit" value="{{$modo}} Datos">
    <br>
    <a href="{{ url('/usuario/') }}">Regresar</a>