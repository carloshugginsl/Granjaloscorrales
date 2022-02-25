<?php

namespace App\Http\Controllers;

use App\Entidades\Promocion;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Session;

class ControladorWebHome extends Controller
{
    public function index()
    {
            $promocion = new Promocion();
            $array_promociones = $promocion->obtenerTodos();


            return view("web.home", compact('array_promociones'));
    }

    public function detalle($id)
    {     
        $promocion = new Promocion();
        $aPromociones = $promocion->obtenerPromocionId($id);
        
        return view('web.promocion-solo' , compact('aPromociones'));
        
    }
}


