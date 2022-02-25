<?php

namespace App\Http\Controllers;

use App\Entidades\Carrito;
use App\Entidades\Sucursal;
use App\Entidades\Pedido;
use App\Entidades\Pedido_detalle;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Item;
use MercadoPago\Payer;
use MercadoPago\Preference;
use Session;

class ControladorWebCarrito extends Controller
{
    public function index()
    {   
        return view("web.carrito");
    }


}