<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entidades\Cliente;
use Illuminate\Routing\Controller;
use Session;
use Hash;

class ControladorWebCambiarClave extends Controller
{
    public function index(){
          $msg = '';
            return view("web.cambiar-clave", compact('msg'));
    }

    public function guardar (Request $request)
    {

            $entidad = new Cliente();
            $entidad->clave = Hash::make($request->input('txtClave'));
            $entidad->idcliente = Session::get("idCliente");
            $entidad->cambiarClave();

            $msg = "Su clave se ha modificado exitosamente.";
            return view("web.cambiar-clave", compact('entidad', 'msg'));
      
     
      }
}
