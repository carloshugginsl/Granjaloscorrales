<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;


class ControladorWebMercadoPago extends Controller
{
    public function aprobado(){

      redirect("/mi-cuenta");
    }

    public function pendiente(){
      redirect("/mi-cuenta");
    }

    public function error(){
      redirect("/mi-cuenta");
    }
}