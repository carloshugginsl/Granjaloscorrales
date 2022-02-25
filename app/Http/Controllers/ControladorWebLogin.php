<?php

namespace App\Http\Controllers;
 
use App\Entidades\Producto;
use App\Entidades\Cliente;
use Illuminate\Http\Request;
use Session;

class ControladorWebLogin extends Controller
{
    public function index()
    {            return view("web.login");
    }

    public function ingresar(Request $request){

        $correo = $request->input("txtCorreo");
        $clave = $request->input("txtClave");

        $usuario = new Cliente();
        $usuarioLogin = $usuario->ObtenerPorMail($correo);


        if($usuarioLogin && $usuario->verificarClave($clave, $usuarioLogin->clave)) {
            Session::put("idCliente", $usuarioLogin->idcliente);
            $producto = new Producto();
            $aProductos = $producto->obtenerTodos();
            return view('web.takeaway' , compact('aProductos'));
        
        } else {
            $msg = "Usuario o clave incorrecta";
            return view("web.login", compact('msg'));
        }
    }
    public function cerrarSesion(){
        Session::put("idCliente", "");
        return Redirect("/");
    }
}
