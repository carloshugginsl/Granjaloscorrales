<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use App\Entidades\Pedido;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Session;

class ControladorWebMiCuenta extends Controller
{
    public function index()
    {
        $entidad = new Cliente();
        $entidad->obtenerPorId(Session::get("idCliente"));

        $pedido = new Pedido();
        $aPedido = $pedido->obtenerPorCliente(Session::get("idCliente"));
        return view("web.mi-cuenta", compact('entidad', 'aPedido'));
    }

    public function guardar (Request $request)
    {
            $entidad = new Cliente();
            $entidad->nombre = $request->input('txtNombre');
            $entidad->apellido = $request->input('txtApellido');
            $entidad->telefono = $request->input('txtTelefono');
            $entidad->correo = $request->input('txtCorreo');
            $entidad->domicilio = $request->input('txtDomicilio');
            $entidad->idcliente = Session::get("idCliente");
            $entidad->actualizarMiCuenta();
            $msg = "Actualizado correctamente.";
            $idcliente = $entidad->idcliente;

            $pedido = new Pedido();
            $aPedido = $pedido->obtenerPorCliente($idcliente);

        return view("web.mi-cuenta", compact('entidad', 'msg','aPedido'));
    }
}