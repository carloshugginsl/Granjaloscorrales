<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Entidades\Promocion;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Sistema\Patente;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';


class ControladorPromocion extends Controller{   
    
    public function index()
    {
        $titulo = "Listado de Promocion";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PRODUCTOCONSULTA")) {
                $codigo = "PRODUCTOCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('promocion.promocion-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function nuevo (){
        $titulo = "Nuevo Promocion";
        $cliente = new Promocion(); 
        if(Usuario::autenticado() == true){
            if (!Patente::autorizarOperacion("PRODUCTOSALTA")) {
                $codigo = "PRODUCTOSALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $promocion = new Promocion();

                return view('promocion.promocion-nuevo', compact('titulo', 'promocion'));
            }
        } else {
           return redirect('admin/login');
        }        
    }

      public function guardar(Request $request) {
        try {
            //Define la entidad servicio
            $titulo = "Modificar promocion";
            $promocion = new Promocion();
            $promocion->cargarDesdeRequest($request);



            if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {//Se adjunta imagen
                $nombre = date("Ymdhmsi");
                $archivo = $_FILES["imagen"]["tmp_name"];
                $extension = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);

                if($extension == "png" || $extension == "jpg" || $extension == "jgpeg"){
                    move_uploaded_file($archivo, env('APP_PATH') . "/public/files/$nombre.$extension"); //guardaelarchivo
                    $promocion->imagen = "$nombre.$extension";
                } else{ 
                    $promocion->imagen="";
                }
            }


            //validaciones
                if ($promocion->nombre == "") {
                    $msg["ESTADO"] = MSG_ERROR;
                    $msg["MSG"] = "Complete todos los datos";
                } else {
                    if ($_POST["id"] > 0) {
                    
                    $promotionAnt = new Promocion();
                    $promotionAnt->obtenerPorId($promocion->idpromocion);
    

                    if($_FILES["imagen"]["error"] === UPLOAD_ERR_OK){
                        //Eliminar imagen anterior
                        @unlink(env('APP_PATH') . "/public/files/$promotionAnt->imagen");                          
                    } else {
                        $promocion->imagen = $promotionAnt->imagen;
                        }
    
                        //Es actualizacion
                        $promocion->actualizar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                } else {
                    //Es nuevo
                    $promocion->insertar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                }

                return view('promocion.promocion-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }
    
        return view('promocion.promocion-nuevo', compact('msg', 'promocion', 'titulo',)) . '?id=' . $promocion->idpromocion;

        }

        public function cargarGrilla()
        {
            $request = $_REQUEST;

            $entidad = new Promocion();
            $aPromociones = $entidad->obtenerFiltrado();

            $data = array();
            $cont = 0;

            $inicio = $request['start'];
            $registros_por_pagina = $request['length'];


            for ($i = $inicio; $i < count($aPromociones) && $cont < $registros_por_pagina; $i++) {
                $row = array();
                $row[] = "<a href='/admin/promocion/".$aPromociones[$i]->idpromocion."' class='btn btn-secondary'><i class='fas fa-pencil-alt'></i></a>";
                $row[] = "<img src='/files/".$aPromociones[$i]->imagen."'class='img-thumbnail'>";
                $row[] = $aPromociones[$i]->nombre;
                $row[] = $aPromociones[$i]->descripcion;
                $row[] = "$". number_format($aPromociones[$i]->precio, 2, ", ", ".");
                $row[] = $aPromociones[$i]->unidad;
                $row[] = $aPromociones[$i]->accion;
                $cont++;
                $data[] = $row;
            }

            $json_data = array(
                "draw" => intval($request['draw']),
                "recordsTotal" => count($aPromociones), 
                "recordsFiltered" => count($aPromociones), 
                "data" => $data,
            );
            return json_encode($json_data);

        }

        public function editar($id)
        {
            $titulo = "Modificar promocion";
            if (Usuario::autenticado() == true) {
                if (!Patente::autorizarOperacion("PRODUCTOEDITAR")) {
                    $codigo = "PRODUCTOEDITAR";
                    $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                    return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
                } else {
                    $promocion = new Promocion();
                    $promocion->obtenerPorId($id);
    
                    return view('promocion.promocion-nuevo', compact('promocion', 'titulo'));
                }
            } else {
                return redirect('admin/login');
            }
        }
        public function eliminar(Request $request)
        {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("PRODUCTOELIMINAR")) {

                $entidad = new promocion();
                $entidad->idpromocion = $id;
                $entidad->eliminar();

                $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente
            } else {
                $codigo = "PRODUCTOELIMINAR";
                $aResultado["err"] = "No tiene pemisos para la operaci&oacute;n.";
            }
            echo json_encode($aResultado);
        } else {
            return redirect('admin/login');
       }
    }
}
