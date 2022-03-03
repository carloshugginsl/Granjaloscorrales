<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Metodo extends Model
{
    protected $table = 'metodos';
    public $timestamps = false;

    protected $fillable = [
        'idmetodo', 'nombre'
    ];

    public function cargarDesdeRequest($request) {
        $this->idmetodo = $request->input('id') != "0" ? $request->input('id') : $this->idmetodo;
        $this->nombre = strtoupper($request->input('txtNombre'));
    }
    
    public function insertar(){
        $sql = "INSERT INTO metodos (
                nombre
        ) VALUES (? );";
        $result = DB::insert($sql, [
            $this->nombre,
        ]);

        return $this->idmetodo = DB::getPdo()->lastInsertId();
    }

    public function actualizar() {
      $sql = "UPDATE metodos SET
          nombre='$this->nombre',
          WHERE idmetodo=?";
      $affected = DB::update($sql, [$this->idmetodo]);
   }

   public function eliminar() { 
      $sql = "DELETE FROM metodos
        WHERE idmetodo=?";
      $affected = DB::delete($sql, [$this->idmetodo]);
    }

   public function obtenerPorId($idmetodo){
       $sql = "SELECT
               idmetodo,
               nombre
               FROM metodos WHERE idmetodo = $idmetodo";
       $lstRetorno = DB::select($sql);

       if (count($lstRetorno) > 0) {
           $this->idmetodo= $lstRetorno[0]->idmetodo;
           $this->nombre= $lstRetorno[0]->nombre;
           return $this;
       }
       return null;
   }

   public function obtenerTodos(){
       $sql = "SELECT
               idmetodo,
               nombre
               FROM metodos ORDER BY nombre";
       $lstRetorno = DB::select($sql);
       return $lstRetorno;
   }
   public function obtenerFiltrado()
   {
       $request = $_REQUEST;
       $columns = array(
           0 => 'A.nombre',
       );
       $sql = "SELECT DISTINCT
                   A.idmetodo,
                   A.nombre,
                   FROM metodos A
               WHERE 1=1
               ";

       //Realiza el filtrado
       if (!empty($request['search']['value'])) {
           $sql .= " AND ( A.nombre LIKE '%" . $request['search']['value'] . "%' ";
       }
       $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

       $lstRetorno = DB::select($sql);

       return $lstRetorno;
   }
}