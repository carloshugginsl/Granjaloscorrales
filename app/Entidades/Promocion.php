<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'Promociones';
    public $timestamps = false;

    protected $fillable = [
        'idpromocion', 'nombre', 'descripcion', 'imagen', 'precio', 'unidad','accion'
    ];

    protected $hidden = [

    ];
        
    public function cargarDesdeRequest($request) {
    $this->idpromocion = $request->input('id') != "0" ? $request->input('id') : $this->idpromocion;
    $this->nombre = $request->input('txtNombre');
    $this->descripcion = $request->input('txtDescripcion');
    $this->precio = $request->input('txtPrecio');
    $this->unidad = $request->input('lstUnidad');
    $this->accion = $request->input('txtAccion');


    }
   
    
    public function insertar(){
        $sql = "INSERT INTO promociones (
                nombre, 
                descripcion, 
                imagen, 
                precio,
                unidad,
                accion
            ) VALUES (?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->nombre,
            $this->descripcion,
            $this->imagen,
            $this->precio,
            $this->unidad,
            $this->accion
        ]);

        return $this->idpromocion = DB::getPdo()->lastInsertId();
    }

    public function actualizar() {
        $sql = "UPDATE promociones SET
            nombre='$this->nombre',
            descripcion= '$this->descripcion',
            imagen= '$this->imagen',
            precio= $this->precio,
            unidad= '$this->unidad',
            accion= '$this->accion'
            WHERE idpromocion=?";
        $affected = DB::update($sql, [$this->idpromocion]);
     }

    public function eliminar() { 
      $sql = "DELETE FROM promociones
       WHERE idpromocion=?";
    $affected = DB::delete($sql, [$this->idpromocion]);
    }

    public function obtenerPorId($idpromocion){
       $sql = "SELECT
                idpromocion,
                nombre, 
                descripcion, 
                imagen, 
                precio,
                unidad,
                accion
               FROM promociones WHERE idpromocion = $idpromocion";
       $lstRetorno = DB::select($sql);

       if (count($lstRetorno) > 0) {
           $this->idpromocion= $lstRetorno[0]->idpromocion;
           $this->nombre= $lstRetorno[0]->nombre;
           $this->descripcion= $lstRetorno[0]->descripcion;
           $this->imagen= $lstRetorno[0]->imagen;
           $this->precio= $lstRetorno[0]->precio;
           $this->unidad= $lstRetorno[0]->unidad;
           $this->accion= $lstRetorno[0]->accion;


           return $this;
       }
       return null;
    }
    public function obtenerTodos(){
       $sql = "SELECT
                idpromocion,
                nombre, 
                descripcion, 
                imagen, 
                precio,
                unidad,
                accion
               FROM promociones ORDER BY nombre";
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
           5 => 'A.accion',
       );
       $sql = "SELECT DISTINCT
                   A.idpromocion,
                   A.nombre,
                   A.descripcion,
                   A.imagen,
                   A.precio,
                   A.unidad,
                   A.accion
                   FROM promociones A
               WHERE 1=1
               ";

       //Realiza el filtrado
       if (!empty($request['search']['value'])) {
           $sql .= " AND ( A.nombre LIKE '%" . $request['search']['value'] . "%' ";
           $sql .= " OR A.descripcion LIKE '%" . $request['search']['value'] . "%' ";
           $sql .= " OR A.imagen LIKE '%" . $request['search']['value'] . "%' )";
           $sql .= " OR A.precio LIKE '%" . $request['search']['value'] . "%' )";
           $sql .= " OR A.unidad LIKE '%" . $request['search']['value'] . "%' )";
           $sql .= " OR A.accion LIKE '%" . $request['search']['value'] . "%' )";



       }
       $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

       $lstRetorno = DB::select($sql);

       return $lstRetorno;
    }

    public function obtenerPromocionId($id){
        $sql = "SELECT
                idpromocion,
                nombre, 
                descripcion, 
                imagen, 
                precio,
                unidad,
                accion
               FROM promociones where idpromocion = ".$id." ORDER BY nombre";
       $lstRetorno = DB::select($sql);
       return $lstRetorno;    
    }

}