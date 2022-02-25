<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'Pedidos';
    public $timestamps = false;

    protected $fillable = [
        'idpedido', 'fk_idcliente', 'fk_idestado', 'total', 'comentario', 'fecha', 'producto'
    ];

    protected $hidden = [

    ];

    public function cargarDesdeRequest($request){
    $this->idpedido = $request->input('id') != "0" ? $request->input('id') : $this->idpedido;
    $this->fk_idcliente = $request->input('lstCliente');
    $this->fk_idestado = $request->input('lstEstado');
    $this->total = $request->input('txtTotal');
    $this->comentario = $request->input('txtComentarios');
    if(isset($request["lstAnio"]) && isset($request["lstMes"]) && isset($request["lstDia"])){
        $this->fecha = $request['lstAnio'] . "-" . $request["lstMes"] . "-" . $request["lstDia"];
        }
    } 
    
    public function insertar(){
        $sql = "INSERT INTO pedidos (
                fk_idcliente,
                fk_idestado,
                total, 
                comentario,
                fecha
            ) VALUES (?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->fk_idcliente,
            $this->fk_idestado,
            $this->total,
            $this->comentario,
            $this->fecha
        ]);

        return $this->idpedido = DB::getPdo()->lastInsertId();
    }

    public function actualizar() {
      $sql = "UPDATE pedidos SET
            fk_idcliente= $this->fk_idcliente,
            fk_idestado= $this->fk_idestado,
            total= $this->total,
            comentario= '$this->comentario',
            fecha= '$this->fecha'
          WHERE idpedido=?";
      $affected = DB::update($sql, [$this->idpedido]);
   }

   public function eliminar() { 
      $sql = "DELETE FROM pedidos
       WHERE idpedido=?";
      $affected = DB::delete($sql, [$this->idpedido]);
    }

   public function obtenerPorId($idpedido){
       $sql = "SELECT
                idpedido,
                fk_idcliente,
                fk_idestado,
                total, 
                comentario,
                fecha
               FROM pedidos WHERE idpedido = $idpedido";
               
       $lstRetorno = DB::select($sql);

       if (count($lstRetorno) > 0) {
           $this->idpedido= $lstRetorno[0]->idpedido;
           $this->fk_idcliente= $lstRetorno[0]->fk_idcliente;
           $this->fk_idestado= $lstRetorno[0]->fk_idestado;
           $this->total= $lstRetorno[0]->total;
           $this->comentario= $lstRetorno[0]->comentario;
           $this->fecha= $lstRetorno[0]->fecha;

           return $this;
       }
       return null;
   }
   public function obtenerTodos(){
       $sql = "SELECT
                idpedido,
                fk_idcliente,
                fk_idestado,
                total, 
                comentario,
                fecha
               FROM pedidos ORDER BY nombre";
       $lstRetorno = DB::select($sql);
       return $lstRetorno;
   }

   public function obtenerFiltrado(){
    $request = $_REQUEST;
    $columns = array(
        0 => 'A.fecha',
        1 => 'B.nombre',
        2 => 'C.nombre',
        3 => 'A.total',
    );
    $sql = "SELECT DISTINCT
                A.idpedido,
                A.fk_idcliente,
                B.nombre as cliente, 
                A.fk_idestado,
                C.nombre as estado,
                A.total,
                A.fecha
            FROM pedidos A
            INNER JOIN clientes B ON A.fk_idcliente = B.idcliente
            INNER JOIN estados c ON A.fk_idestado = C.idestado
            WHERE 1=1";


    //Realiza el filtrado
    if (!empty($request['search']['value'])) {
        $sql .= " AND ( B.nombre LIKE '%" . $request['search']['value'] . "%' ";
        $sql .= " OR C.nombre LIKE '%" . $request['search']['value'] . "%' ";

    }
    $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

    $lstRetorno = DB::select($sql);

    return $lstRetorno;
    }



   public function obtenerPorCliente($idCliente)
   {
        $sql = "SELECT DISTINCT
                A.idpedido,
                A.fecha,
                A.total,
                B.nombre as estado
            FROM pedidos A
            INNER JOIN estados B ON A.fk_idestado = B.idestado
            WHERE A.fk_idcliente = $idCliente AND A.fk_idestado != '3' AND A.fk_idestado != '4'";

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
    
}