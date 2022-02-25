<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'Productos';
    public $timestamps = false;

    protected $fillable = [
        'idproducto', 'nombre', 'descripcion', 'imagen', 'precio', 'unidad'
    ];

    protected $hidden = [

    ];
        
    public function cargarDesdeRequest($request) {
    $this->idproducto = $request->input('id') != "0" ? $request->input('id') : $this->idproducto;
    $this->nombre = $request->input('txtNombre');
    $this->descripcion = $request->input('txtDescripcion');
    $this->precio = $request->input('txtPrecio');
    $this->unidad = $request->input('lstUnidad');

    }
   
    
    public function insertar(){
        $sql = "INSERT INTO productos (
                nombre, 
                descripcion, 
                imagen, 
                precio,
                unidad
            ) VALUES (?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->nombre,
            $this->descripcion,
            $this->imagen,
            $this->precio,
            $this->unidad
        ]);

        return $this->idproducto = DB::getPdo()->lastInsertId();
    }

    public function actualizar() {
        $sql = "UPDATE productos SET
            nombre='$this->nombre',
            descripcion= '$this->descripcion',
            imagen= '$this->imagen',
            precio= $this->precio,
            unidad= '$this->unidad'
            WHERE idproducto=?";
        $affected = DB::update($sql, [$this->idproducto]);
     }

    public function eliminar() { 
      $sql = "DELETE FROM productos
       WHERE idproducto=?";
    $affected = DB::delete($sql, [$this->idproducto]);
    }

    public function obtenerPorId($idproducto){
       $sql = "SELECT
                idproducto,
                nombre, 
                descripcion, 
                imagen, 
                precio,
                unidad
               FROM productos WHERE idproducto = $idproducto";
       $lstRetorno = DB::select($sql);

       if (count($lstRetorno) > 0) {
           $this->idproducto= $lstRetorno[0]->idproducto;
           $this->nombre= $lstRetorno[0]->nombre;
           $this->descripcion= $lstRetorno[0]->descripcion;
           $this->imagen= $lstRetorno[0]->imagen;
           $this->precio= $lstRetorno[0]->precio;
           $this->unidad= $lstRetorno[0]->unidad;

           return $this;
       }
       return null;
    }
    public function obtenerTodos(){
       $sql = "SELECT
                idproducto,
                nombre, 
                descripcion, 
                imagen, 
                precio,
                unidad
               FROM productos ORDER BY nombre";
       $lstRetorno = DB::select($sql);
       return $lstRetorno;
    }

    public function obtenerProductoId($id){
        $sql = "SELECT
                 idproducto,
                 nombre, 
                 descripcion, 
                 imagen, 
                 precio,
                 unidad
                FROM productos where idproducto = ".$id." ORDER BY nombre";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
     }

    public function obtenerFiltrado()
    {
       $request = $_REQUEST;
       $columns = array(
           0 => 'A.imagen',
           1 => 'A.nombre',
           2 => 'A.descripcion',
           3 => 'A.precio',
           4 => 'A.unidad',
       );
       $sql = "SELECT DISTINCT
                   A.idproducto,
                   A.nombre,
                   A.descripcion,
                   A.imagen,
                   A.precio,
                   A.unidad
                   FROM productos A
               WHERE 1=1
               ";

       //Realiza el filtrado
       if (!empty($request['search']['value'])) {
           $sql .= " AND ( A.nombre LIKE '%" . $request['search']['value'] . "%' ";
           $sql .= " OR A.descripcion LIKE '%" . $request['search']['value'] . "%' ";
           $sql .= " OR A.imagen LIKE '%" . $request['search']['value'] . "%' )";
           $sql .= " OR A.precio LIKE '%" . $request['search']['value'] . "%' )";
           $sql .= " OR A.unidad LIKE '%" . $request['search']['value'] . "%' )";


       }
       $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

       $lstRetorno = DB::select($sql);

       return $lstRetorno;
    }
}