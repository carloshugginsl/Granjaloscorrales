<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Entidades\Postulacion;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Sistema\Patente;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';


class ControladorPostulacion extends Controller{   
    
    public function index()
    {
        $titulo = "Listado de Postulaciones";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("POSTULANTECONSULTA")) {
                $codigo = "POSTULANTECONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('postulacion.postulacion-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }    


      public function nuevo (){ 
        $titulo = "Nuevo Postulacion";
        $postulacion = new Postulacion(); 
        if(Usuario::autenticado() == true){
            if (!Patente::autorizarOperacion("POSTULANTEALTA")) {
                $codigo = "POSTULANTEALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $postulacion = new Postulacion();

                return view('postulacion.postulacion-nuevo', compact('titulo', 'postulacion'));
            }
        } else {
           return redirect('admin/login');
        }        
    }   

      public function guardar(Request $request) {
            try {
                //Define la entidad servicio
                $titulo = "Modificar postulacion";
                $postulacion = new Postulacion();
                $postulacion->cargarDesdeRequest($request);

                if ($_FILES["adjunto"]["error"] === UPLOAD_ERR_OK) {//Se adjunta imagen
                    $nombre = date("Ymdhmsi");
                    $archivo = $_FILES["adjunto"]["tmp_name"];
                    $extension = pathinfo($_FILES["adjunto"]["name"], PATHINFO_EXTENSION);

                    if($extension == "pdf" || $extension == "doc" || $extension == "docx"){
                    move_uploaded_file($archivo, env('APP_PATH') . "/public/files/$nombre.$extension"); //guardaelarchivo
                    $postulacion->archivo_cv = "$nombre.$extension";
                } else{
                    $postulacion->archivo_cv="";
                }
            }
    
                
    
                //validaciones
                if ($postulacion->nombre == "" || $postulacion->apellido == "") {
                    $msg["ESTADO"] = MSG_ERROR;
                    $msg["MSG"] = "Complete todos los datos";
                } else {
                    if ($_POST["id"] > 0) {

                    $postulacionAnt = new Postulacion();
                    $postulacionAnt->obtenerPorId($postulacion->idpostulacion);

                    if($_FILES["adjunto"]["error"] === UPLOAD_ERR_OK){
                        //Eliminar imagen anterior
                        @unlink(env('APP_PATH') . "/public/files/$postulacionAnt->archivo_cv");                          
                    } else {
                        $postulacion->archivo_cv = $postulacionAnt->archivo_cv;
                        }

                        //Es actualizacion
                        $postulacion->actualizar();
    
                        $msg["ESTADO"] = MSG_SUCCESS;
                        $msg["MSG"] = OKINSERT;
                    } else {
                        //Es nuevo
                        $postulacion->insertar();
    
                        $msg["ESTADO"] = MSG_SUCCESS;
                        $msg["MSG"] = OKINSERT;
                    }

                    return view('postulacion.postulacion-listar', compact('titulo', 'msg'));
                }
            } catch (Exception $e) {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = ERRORINSERT;
            }
        
            return view('postulacion.postulacion-nuevo', compact('msg', 'postulacion', 'titulo',)) . '?id=' . $postulacion->idpostulacion;
    
        }
        public function cargarGrilla()
        {
            $request = $_REQUEST;

            $entidad = new Postulacion();
            $aPostulaciones = $entidad->obtenerFiltrado();

            $data = array();
            $cont = 0;

            $inicio = $request['start'];
            $registros_por_pagina = $request['length'];


            for ($i = $inicio; $i < count($aPostulaciones) && $cont < $registros_por_pagina; $i++) {
                $row = array();
                $row[] = "<a href='/admin/postulacion/".$aPostulaciones[$i]->idpostulacion."' class='btn btn-secondary'><i class='fas fa-pencil-alt'></i></a>";
                $row[] = $aPostulaciones[$i]->nombre;
                $row[] = $aPostulaciones[$i]->apellido;
                $row[] = $aPostulaciones[$i]->telefono;
                $row[] = $aPostulaciones[$i]->correo;
                $cont++;
                $data[] = $row;
            }

            $json_data = array(
                "draw" => intval($request['draw']),
                "recordsTotal" => count($aPostulaciones), 
                "recordsFiltered" => count($aPostulaciones), 
                "data" => $data,
            );
            return json_encode($json_data);
        }

        public function editar($id)
        {
            $titulo = "Modificar Postulacion";
            if (Usuario::autenticado() == true) {
                if (!Patente::autorizarOperacion("POSTULANTEEDITAR")) {
                    $codigo = "POSTULANTEEDITAR";
                    $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                    return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
                } else {
                    $postulacion = new Postulacion();
                    $postulacion->obtenerPorId($id);
    
                    return view('postulacion.postulacion-nuevo', compact('postulacion', 'titulo'));
                }
            } else {
                return redirect('admin/login');
            }
        }
        public function eliminar(Request $request)
        {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("POSTULANTEBAJA")) {

                $entidad = new Postulacion();
                $entidad->idpostulacion = $id;
                $entidad->eliminar();

                $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente
            } else {
                $codigo = "POSTULANTEBAJA";
                $aResultado["err"] = "No tiene pemisos para la operaci&oacute;n.";
            }
            echo json_encode($aResultado);
        } else {
            return redirect('admin/login');
       }
    }

}
