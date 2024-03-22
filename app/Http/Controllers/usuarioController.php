<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function index()
    {
        $datos = usuario::all();
        return view('index', ['datos' => $datos]);
    }

    public function store(Request $request)
    {
        $usuario = new usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->correo = $request->correo;
        $usuario->clave = $request->clave;
        $usuario->save();
        // return redirect('/usuario');
    }


    public function edit($id)
    {
        $usuario = usuario::findOrFail($id);
        return view('edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = usuario::findOrFail($id);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->correo = $request->correo;
        $usuario->clave = $request->clave;
        $usuario->save();
        return redirect('/usuario');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $usuario = usuario::findOrFail($id);
        $usuario->delete();
        return redirect('/usuario');
    }

}
