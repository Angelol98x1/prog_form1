<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto/formulario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email',
            'mensaje' => 'required'
        ]);

        Contacto::create($request->all());

        return redirect()->route('contacto.index')
            ->with('success', '¡Mensaje enviado correctamente!');
    }
        
    public function listar()
    {
        $contactos = Contacto::orderBy('created_at', 'desc')->get();
        return view('contacto/listar', compact('contactos'));
    }
}
