<?php

namespace App\Http\Controllers;

use App\Entidades\Carrito;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Entidades\Producto;
use App\Entidades\Cliente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sucursal;
use Session;


class ControladorWebProducto extends Controller
{
    public function index()
    {       
        $producto = new Producto();
        $aProductos = $producto->obtenerTodos();
        return view('web.producto' , compact('aProductos'));
        
    }

    public function insertarCarrito(Request $request){
        if (Session::get("idCliente") != ""){
        $carrito = new Carrito();
        $carrito->fk_idproducto = $request->input("txtIdProducto");
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
        $producto = new Producto();
        $aProductos = $producto->obtenerProductoId($id);
        
        return view('web.producto-solo' , compact('aProductos'));
        
    }

    
}

