<?php

namespace App\Http\Controllers;

use Illuminate\Routing\controller;
use App\Entidades\Estado;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';


class ControladorEstado extends Controller{   

      public function nuevo (){
            $titulo = "Nuevo estado";
            return view("estado.estado-nuevo", compact('titulo'));
            
      }
      public function guardar(Request $request) {
            try {
                //Define la entidad servicio
                $titulo = "Modificar Cliente";
                $estado = new estado();
                $estado->cargarDesdeRequest($request);
    
                //validaciones
                if ($estado->nombre == "") {
                    $msg["ESTADO"] = MSG_ERROR;
                    $msg["MSG"] = "Complete todos los datos";
                } else {
                    if ($_POST["id"] > 0) {
                        //Es actualizacion
                        $estado->actualizar();
    
                        $msg["ESTADO"] = MSG_SUCCESS;
                        $msg["MSG"] = OKINSERT;
                    } else {
                        //Es nuevo
                        $estado->insertar();
    
                        $msg["ESTADO"] = MSG_SUCCESS;
                        $msg["MSG"] = OKINSERT;
                    }

                    return view('estado.estado-listar', compact('titulo', 'msg'));
                }
            } catch (Exception $e) {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = ERRORINSERT;
            }
        
            return view('estado.estado-nuevo', compact('msg', 'estado', 'titulo',)) . '?id=' . $estado->idestado;
    
        }

}