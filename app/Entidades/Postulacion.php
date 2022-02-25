<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    protected $table = 'Postulaciones';
    public $timestamps = false;

    protected $fillable = [
        'idpostulacion','nombre', 'apellido', 'telefono', 'correo', 'archivo_cv' 
    ];

    protected $hidden = [

    ];

    public function cargarDesdeRequest($request) {
        $this->idpostulacion = $request->input('id') != "0" ? $request->input('id') : $this->idpostulacion;
        $this->nombre = $request->input('txtNombre');
        $this->apellido = $request->input('txtApellido');
        $this->telefono = $request->input('txtTelefono');
        $this->correo = $request->input('txtCorreo');
    }
    
    public function insertar(){
        $sql = "INSERT INTO postulaciones (
                nombre, 
                apellido, 
                telefono, 
                correo, 
                archivo_cv 
            ) VALUES (?, ?, ?, ?, ?);";
       $result = DB::insert($sql, [
            $this->nombre,
            $this->apellido,
            $this->telefono,
            $this->correo,
            $this->archivo_cv,
        ]);

        return $this->idpostulacion = DB::getPdo()->lastInsertId();
    }

    public function actualizar() {
      $sql = "UPDATE postulaciones SET
          nombre='$this->nombre',
          apellido='$this->apellido',
          telefono= $this->telefono,
          correo='$this->correo',
          archivo_cv='$this->archivo_cv'
          WHERE idpostulacion=?";
      $affected = DB::update($sql, [$this->idpostulacion]);
   }

   public function eliminar() { 
      $sql = "DELETE FROM postulaciones
       WHERE idpostulacion=?";
      $affected = DB::update($sql, [$this->idpostulacion]);
    }

   public function obtenerPorId($idpostulacion){
       $sql = "SELECT
               idpostulacion,
               nombre,
               apellido,
               telefono,
               correo, 
               archivo_cv
               FROM postulaciones WHERE idpostulacion = $idpostulacion";
       $lstRetorno = DB::select($sql);

       if (count($lstRetorno) > 0) {
           $this->idpostulacion= $lstRetorno[0]->idpostulacion;
           $this->nombre = $lstRetorno[0]->nombre;
           $this->apellido = $lstRetorno[0]->apellido;
           $this->telefono = $lstRetorno[0]->telefono;
           $this->correo = $lstRetorno[0]->correo;
           $this->archivo_cv = $lstRetorno[0]->archivo_cv;
           return $this;
       }
       return null;
   }
   public function obtenerTodos(){
       $sql = "SELECT
               idpostulacion,
               nombre,
               apellido,
               telefono,
               correo, 
               archivo_cv
               FROM postulaciones ORDER BY nombre";
       $lstRetorno = DB::select($sql);
       return $lstRetorno;
   }
   public function obtenerFiltrado(){
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.nombre',
            1 => 'A.apellido',
            2 => 'A.telefono',
            3 => 'A.correo',
        );
        $sql = "SELECT DISTINCT
                    A.idpostulacion,
                    A.nombre,
                    A.apellido,
                    A.telefono,
                    A.correo   
                    FROM postulaciones A
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.apellido LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.telefono LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.correo LIKE '%" . $request['search']['value'] . "%' )";

        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
}