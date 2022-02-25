<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';
    public $timestamps = false;

    protected $fillable = [
        'idcarrito', 'fk_idproducto', 'fk_idcliente', 'cantidad',
    ];

    protected $hidden = [

    ];

    
    public function insertar(){
        $sql = "INSERT INTO carrito (
                fk_idproducto,
                fk_idcliente,
                cantidad
            ) VALUES (?, ?, ?);";
        $result = DB::insert($sql, [
            $this->fk_idproducto,
            $this->fk_idcliente,
            $this->cantidad
        ]);

        return $this->idcarrito = DB::getPdo()->lastInsertId();
    }

    public function actualizar() {
      $sql = "UPDATE carrito SET
          fk_idproducto ='$this->fk_idproducto',
          fk_idcliente='$this->fk_idcliente',
          cantidad='$this->cantidad',
          WHERE idcarrito=?";
      $affected = DB::update($sql, [$this->idcarrito]);
   }

   public function eliminar() { 
      $sql = "DELETE FROM carrito
       WHERE idcarrito=?";
      $affected = DB::delete($sql, [$this->idcarrito]);
   }

   public function vaciarPorCliente($idCliente) { 
    $sql = "DELETE FROM carrito WHERE fk_idcliente=?";
    $affected = DB::delete($sql, [$idCliente]);
    }

   public function obtenerPorId($idCarrito)
   {
       $sql = "SELECT
               idcarrito,
               fk_idproducto,
               fk_idcliente,
               cantidad
               FROM carrito WHERE idcarrito = $idCarrito";
       $lstRetorno = DB::select($sql);

       if (count($lstRetorno) > 0) {
           $this->idcarrito = $lstRetorno[0]->idcarrito;
           $this->fk_idproducto = $lstRetorno[0]->fk_idproducto;
           $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
           $this->cantidad = $lstRetorno[0]->cantidad;
           return $this;
       }
       return null;
   }

   public function obtenerPorCliente($idCliente)
   {
       $sql = "SELECT
               idcarrito,
               fk_idproducto,
               fk_idcliente,
               cantidad,
               B.nombre AS nombre_producto,
               B.precio,
               B.descripcion,
               B.imagen
               FROM carrito A
               INNER JOIN productos B ON A.fk_idproducto = B.idproducto
               WHERE fk_idcliente = $idCliente";
       $lstRetorno = DB::select($sql);

       return $lstRetorno;
   }
   
   public function obtenerTodos(){
       $sql = "SELECT
                 idcarrito,
                 fk_idproducto,
                 fk_idcliente,
                 cantidad
               FROM carrito ORDER BY nombre";
       $lstRetorno = DB::select($sql);
       return $lstRetorno;
   }

   


}