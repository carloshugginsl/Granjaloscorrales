<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Entidades\Pedido;
use App\Entidades\Cliente;
use App\Entidades\Estado;
use App\Entidades\Producto;
use App\Entidades\Pedido_detalle;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Sistema\Patente;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';


class ControladorPedido extends Controller{

    public function index()
    {
        $titulo = "Listado de pedidos";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PEDIDOCONSULTA")) {
                $codigo = "PEDIDOCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('pedido.pedido-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }
    
      public function nuevo (){
            $titulo = "Nuevo pedido";
            $pedido = new Pedido();
            if(Usuario::autenticado() == true){
                if (!Patente::autorizarOperacion("PEDIDOALTA")) {
                    $codigo = "PEDIDOALTA";
                    $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                    return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
                } else {
                    $pedido = new Pedido();
            
                /* CAMBIOS PARA EL DESPLEGABLE */
        
            $cliente = new Cliente();
            $array_clientes = $cliente->obtenerTodos();

            $estado = new Estado();
            $array_estados = $estado->obtenerTodos();
            
            $producto = new Producto();
            $array_productos = $producto->obtenerTodos();


           return view("pedido.pedido-nuevo", compact('titulo', 'array_clientes', 'array_estados', 'array_productos','pedido'));
                } 

            } else {
                return redirect('admin/login');
            }
        
        }
          

      public function guardar(Request $request) {
            try {
                //Define la entidad servicio
                $titulo = "Modificar Pedido";
                $pedido = new Pedido();
                $pedido->cargarDesdeRequest($request);
                
                //validaciones
                if ($pedido->fk_idcliente == "" || $pedido->fk_idestado =="" ) {
                    $msg["ESTADO"] = MSG_ERROR;
                    $msg["MSG"] = "Complete todos los datos";
                } else {
                    if ($_POST["id"] > 0) {
                        //Es actualizacion
                        $pedido->actualizar();
    
                        $msg["ESTADO"] = MSG_SUCCESS;
                        $msg["MSG"] = OKINSERT;
                    } else {
                        //Es nuevo
                        $pedido->insertar();
    
                        $msg["ESTADO"] = MSG_SUCCESS;
                        $msg["MSG"] = OKINSERT;
                    }

                    return view('pedido.pedido-listar', compact('titulo', 'msg'));
                }
            } catch (Exception $e) {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = ERRORINSERT;
            }
           
            $cliente = new Cliente();
            $array_clientes = $cliente->obtenerTodos();

            $estado = new Estado();
            $array_estados = $estado->obtenerTodos();

            return view('pedido.pedido-nuevo', compact('msg', 'pedido', 'titulo','array_clientes','array_estados')) . '?id=' . $pedido->idpedido; 
    
        }
        
        public function cargarGrilla()
        {
            $request = $_REQUEST;

            $entidad = new Pedido();
            $aPedidos = $entidad->obtenerFiltrado();

            $data = array();
            $cont = 0;

            $inicio = $request['start'];
            $registros_por_pagina = $request['length'];


            for ($i = $inicio; $i < count($aPedidos) && $cont < $registros_por_pagina; $i++) {
                $row = array();
                $row[] = "<a href='/admin/pedido/".$aPedidos[$i]->idpedido."' class='btn btn-secondary'><i class='fas fa-pencil-alt'></i></a>";
                $row[] = $aPedidos[$i]->fecha;
                $row[] = $aPedidos[$i]->cliente;
                $row[] = $aPedidos[$i]->estado;
                //$row[] = $aPedidos[$i]->comentario;
                $row[] = "$". number_format($aPedidos[$i]->total, 2, ", ", ".");
                $cont++;
                $data[] = $row;
            }

            $json_data = array(
                "draw" => intval($request['draw']),
                "recordsTotal" => count($aPedidos), 
                "recordsFiltered" => count($aPedidos), 
                "data" => $data,
            );
            return json_encode($json_data);
        }

        public function editar($id)
        {
            $titulo = "Modificar Pedido";
            if (Usuario::autenticado() == true) {
                if (!Patente::autorizarOperacion("PEDIDOEDITAR")) {
                    $codigo = "PEDIDOEDITAR";
                    $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                    return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
                } else {
                    $pedido = new Pedido();
                    $pedido->obtenerPorId($id);

                    //$detalle_pedido = new Pedido_detalle();
                    $detalle_pedido= Pedido_detalle::obtenerPorIdPedido($id);

                    
                    $cliente = new Cliente();
                    $array_clientes = $cliente->obtenerTodos();
        
                    $estado = new Estado();
                    $array_estados = $estado->obtenerTodos();
                    


                    return view("pedido.pedido-nuevo", compact('pedido', 'titulo', 'array_clientes', 'array_estados', 'detalle_pedido'));   

                }
            } else {
                return redirect('admin/login');
            }
        }
        public function eliminar(Request $request)
        {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("PEDIDOBAJA")) {

                $entidad = new Pedido();
                $entidad->idpedido = $id;
                $entidad->eliminar();

                $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente
            } else {
                $codigo = "PEDIDOBAJA";
                $aResultado["err"] = "No tiene pemisos para la operaci&oacute;n.";
            }
            echo json_encode($aResultado);
        } else {
            return redirect('admin/login');
       }
    }

}