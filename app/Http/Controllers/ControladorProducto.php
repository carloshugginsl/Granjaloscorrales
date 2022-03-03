<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Entidades\Producto;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Sistema\Patente;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';


class ControladorProducto extends Controller{   
    
    public function index()
    {
        $titulo = "Listado de Producto";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PRODUCTOCONSULTA")) {
                $codigo = "PRODUCTOCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('producto.producto-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function nuevo (){
        $titulo = "Nuevo Producto";
        $cliente = new Producto(); 
        if(Usuario::autenticado() == true){
            if (!Patente::autorizarOperacion("PRODUCTOSALTA")) {
                $codigo = "PRODUCTOSALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $producto = new Producto();

                return view('producto.producto-nuevo', compact('titulo', 'producto'));
            }
        } else {
           return redirect('admin/login');
        }        
    }

      public function guardar(Request $request) {
        try {
            //Define la entidad servicio
            $titulo = "Modificar Producto";
            $producto = new Producto();
            $producto->cargarDesdeRequest($request);



            if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {//Se adjunta imagen
                $nombre = date("Ymdhmsi");
                $archivo = $_FILES["imagen"]["tmp_name"];
                $extension = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);

                if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                    move_uploaded_file($archivo, env('APP_PATH') . "/public/files/$nombre.$extension"); //guardaelarchivo
                    $producto->imagen = "$nombre.$extension";
                } else{ 
                    $producto->imagen="";
                }
            }


            //validaciones
                if ($producto->nombre == "") {
                    $msg["ESTADO"] = MSG_ERROR;
                    $msg["MSG"] = "Complete todos los datos";
                } else {
                    if ($_POST["id"] > 0) {
                    
                    $productAnt = new Producto();
                    $productAnt->obtenerPorId($producto->idproducto);
    

                    if($_FILES["imagen"]["error"] === UPLOAD_ERR_OK){
                        //Eliminar imagen anterior
                        @unlink(env('APP_PATH') . "/public/files/$productAnt->imagen");                          
                    } else {
                        $producto->imagen = $productAnt->imagen;
                        }
    
                        //Es actualizacion
                        $producto->actualizar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                } else {
                    //Es nuevo
                    $producto->insertar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                }

                return view('producto.producto-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }
    
        return view('producto.producto-nuevo', compact('msg', 'producto', 'titulo',)) . '?id=' . $producto->idproducto;

        }

        public function cargarGrilla()
        {
            $request = $_REQUEST;

            $entidad = new Producto();
            $aProductos = $entidad->obtenerFiltrado();

            $data = array();
            $cont = 0;

            $inicio = $request['start'];
            $registros_por_pagina = $request['length'];


            for ($i = $inicio; $i < count($aProductos) && $cont < $registros_por_pagina; $i++) {
                $row = array();
                $row[] = "<a href='/admin/producto/".$aProductos[$i]->idproducto."' class='btn btn-secondary'><i class='fas fa-pencil-alt'></i></a>";
                $row[] = "<img src='/files/".$aProductos[$i]->imagen."'class='img-thumbnail'>";
                $row[] = $aProductos[$i]->nombre;
                $row[] = $aProductos[$i]->descripcion;
                $row[] = "$". number_format($aProductos[$i]->precio, 2, ", ", ".");
                $row[] = $aProductos[$i]->unidad;
                $cont++;
                $data[] = $row;
            }

            $json_data = array(
                "draw" => intval($request['draw']),
                "recordsTotal" => count($aProductos), 
                "recordsFiltered" => count($aProductos), 
                "data" => $data,
            );
            return json_encode($json_data);

        }

        public function editar($id)
        {
            $titulo = "Modificar Producto";
            if (Usuario::autenticado() == true) {
                if (!Patente::autorizarOperacion("PRODUCTOEDITAR")) {
                    $codigo = "PRODUCTOEDITAR";
                    $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                    return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
                } else {
                    $producto = new Producto();
                    $producto->obtenerPorId($id);
    
                    return view('producto.producto-nuevo', compact('producto', 'titulo'));
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

                $entidad = new Producto();
                $entidad->idproducto = $id;
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
