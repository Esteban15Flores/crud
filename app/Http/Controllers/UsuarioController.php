<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datoss['usuarios']=Usuario::paginate();
        return view('usuario.index', $datoss);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $datos= request()->all();
       
        $campos=[
            'nombre'=>'required|string|max:100',
            'correo'=>'required|email',
            'curp'=>'required|string|max:100',
            'dosis'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'dosis.required'=>'La dosis es requerida'
        ];
        $this->validate($request, $campos, $mensaje);

        $datos= request()->except('_token');
        Usuario::insert($datos); 
      //  return response()->json($datos);
      return redirect('usuario')->with('mensaje','Registro Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $usuario = Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'correo'=>'required|email',
            'curp'=>'required|string|max:100',
            'dosis'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'dosis.required'=>'La dosis es requerida'
        ];
        $this->validate($request, $campos, $mensaje);
        //
        $datos= request()->except(['_method','_token']);
        Usuario::where('id','=',$id)->update($datos);
        $usuario = Usuario::findOrFail($id);
       // return view('usuario.edit', compact('usuario'));
       return redirect('usuario')->with('mensaje','Registro Modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Usuario::destroy($id);
        return redirect('usuario')->with('mensaje','Registro Eliminado');
    }

    public function opciones()
    {
        //
        $datoss['usuarios']=Usuario::paginate(5);
        return view('usuario.index', $datoss);
    }
}
