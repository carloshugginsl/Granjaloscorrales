<?php

namespace App\Http\Controllers;

use App\Entidades\Carrito;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Entidades\Promocion;
use App\Entidades\Cliente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sucursal;
use Session;


class ControladorWebPromocion extends Controller
{
    public function index()
    {       
        $promocion = new Promocion();
        $aPromocions = $promocion->obtenerTodos();
        return view('web.promocion' , compact('aPromocions'));
        
    }

    public function insertarCarrito(Request $request){
        if (Session::get("idCliente") != ""){
        $carrito = new Carrito();
        $carrito->fk_idpromocion = $request->input("txtIdPromocion");
        $carrito->fk_idcliente = Session::get("idCliente");;
        $carrito->cantidad =  $request->input("txtCantidad");
        $carrito->insertar();
        return redirect ('/carrito');
        }else{
            return redirect('login');
        }

    }

    public function detalle($id)
    {     
        $promocion = new Promocion();
        $aPromociones = $promocion->obtenerPromocionId($id);
        
        return view('web.promocion-solo' , compact('aPromociones'));
        
    }

    
}