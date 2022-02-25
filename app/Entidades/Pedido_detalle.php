<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Pedido_detalle extends Model
{
    protected $table = 'pedido_detalle';
    public $timestamps = false;

    protected $fillable = [
        'idpedidodetalle','fk_idpedido', 'fk_idproducto', 'cantidad', 'precio_unitario', 'subtotal' 
    ];

    protected $hidden = [

    ];
    public function cargarDesdeRequest($request) {
        $this->idpedidodetalle = $request->input('id') != "0" ? $request->input('id') : $this->idpedido;
        $this->nombre = $request->input('txtNombre');
        $this->id_padre = $request->input('lstMenuPadre');
        $this->orden = $request->input('txtOrden') != "" ? $request->input('txtOrden') : 0;
        $this->activo = $request->input('lstActivo');
        $this->url = $request->input('txtUrl');
        $this->css = $request->input('txtCss');
    }
    
    public function insertar(){
        $sql = "INSERT INTO pedido_detalle (
                fk_idpedido, 
                fk_idproducto, 
                cantidad, 
                precio_unitario, 
                subtotal
            ) VALUES (?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->fk_idpedido,
            $this->fk_idproducto,
            $this->cantidad,
            $this->precio_unitario,
            $this->subtotal,
        ]);

        return $this->idpedidodetalle = DB::getPdo()->lastInsertId();
    }

    public function actualizar() {
      $sql = "UPDATE pedido_detalle SET
            fk_idpedido='$this->fk_idpedido',
            fk_idproducto='$this->fk_idproducto',
            cantidad='$this->cantidad',
            precio_unitario='$this->precio_unitario',
            subtotal='$this->subtotal'
          WHERE idpedidodetalle=?";
      $affected = DB::update($sql, [$this->idpedidodetalle]);
   }

   public function eliminar() { 
      $sql = "DELETE FROM pedido_detalle
       WHERE idpedidodetalle=?";
      $affected = DB::update($sql, [$this->idpedidodetalle]);
    }

   public function obtenerPorId($idproductodetalle){
       $sql = "SELECT
                idproductodetalle,
                fk_idpedido, 
                fk_idproducto, 
                cantidad, 
                precio_unitario, 
                subtotal
               FROM pedido_detalle WHERE idpedidodetalle = $idpedidodetalle";
       $lstRetorno = DB::select($sql);

       if (count($lstRetorno) > 0) {
           $this->idproductodetalle= $lstRetorno[0]->idproductodetalle;
           $this->fk_idpedido= $lstRetorno[0]->fk_idpedido;
           $this->fk_idproducto= $lstRetorno[0]->fk_idproducto;
           $this->cantidad= $lstRetorno[0]->cantidad;
           $this->precio_unitario= $lstRetorno[0]->precio_unitario;
           $this->subtotal= $lstRetorno[0]->subtotal;

           return $this;
       }
       return null;
   }

   public static function obtenerPorIdPedido($idpedido){
    $sql = "SELECT
             idpedidodetalle,
             fk_idpedido, 
             fk_idproducto, 
             cantidad, 
             precio_unitario, 
             subtotal,
             B.nombre AS nombre_producto,
             B.precio,
             B.descripcion,
             B.imagen
            FROM pedido_detalle A 
            INNER JOIN productos B ON A.fk_idproducto = B.idproducto
            WHERE fk_idpedido = $idpedido";

    $lstRetorno = DB::select($sql);
    return($lstRetorno);

    /*if (count($lstRetorno) > 0) {
        $arreglo = Array();
        foreach ($lstRetorno as $value){ 
            $arreglo['idpedidodetalle']= $value->idpedidodetalle;
            $arreglo['fk_idpedido']= $value->fk_idpedido;
            $arreglo['fk_idproducto']= $value->fk_idproducto;
            $arreglo['cantidad']= $value->cantidad;
            $arreglo['precio_unitario']= $value->precio_unitario;
            $arreglo['subtotal']= $value->subtotal;
        }
        return $arreglo;
    }
    return null;*/
    }

   public function obtenerTodos(){
       $sql = "SELECT
                idproductodetalle,
                fk_idpedido, 
                fk_idproducto, 
                cantidad, 
                precio_unitario, 
                subtotal
               FROM producto_detalle ORDER BY nombre";
       $lstRetorno = DB::select($sql);
       return $lstRetorno;
   }
}