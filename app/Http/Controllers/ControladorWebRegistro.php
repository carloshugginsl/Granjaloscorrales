<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entidades\Cliente;
class ControladorWebRegistro extends Controller
{
    public function index(Request $request)
    {
        
            return view("web.registro");
        }

    public function enviar(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->input("txtNombre");
        $cliente->apellido = $request->input("txtApellido");
        $cliente->telefono = $request->input("txtTelefono");
        $cliente->correo = $request->input("txtCorreo");
        $cliente->clave = $cliente->encriptarClave($request->input("txtClave"));
        $cliente->domicilio = $request->input("txtDomicilio");

        $cliente->insertar();    

        return view("web.registrook");

    }
}

