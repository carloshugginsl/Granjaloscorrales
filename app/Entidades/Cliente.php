<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    public $timestamps = false;

    protected $fillable = [
        'idcliente', 'nombre', 'apellido', 'telefono', 'correo', 'clave', 'domicilio'
    ];

    protected $hidden = [

    ];
    
    public function cargarDesdeRequest($request) {
        $this->idcliente = $request->input('id') != "0" ? $request->input('id') : $this->idCliente;
        $this->nombre = $request->input('txtNombre');
        $this->apellido = $request->input('txtApellido');
        $this->telefono = $request->input('txtTelefono');
        $this->correo = $request->input('txtCorreo');
        $this->clave = $request->input('txtClave');
        $this->domicilio = $request->input('txtDomicilio');
    }
    
    public function insertar(){
        $sql = "INSERT INTO clientes (
                nombre,
                apellido,
                telefono,
                correo, 
                clave,
                domicilio
            ) VALUES (?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->nombre,
            $this->apellido,
            $this->telefono,
            $this->correo,
            $this->clave,
            $this->domicilio

        ]);

        return $this->idcliente = DB::getPdo()->lastInsertId();
    }

    public function actualizar() {
      $sql = "UPDATE clientes SET
          nombre='$this->nombre',
          apellido='$this->apellido',
          telefono='$this->telefono',
          correo='$this->correo',
          clave='$this->clave',
          domicilio='$this->domicilio'
          WHERE idcliente=?";
      $affected = DB::update($sql, [$this->idcliente]);
    }
    
    public function actualizarMiCuenta() {
    $sql = "UPDATE clientes SET
        nombre='$this->nombre',
        apellido='$this->apellido',
        telefono='$this->telefono',
        correo='$this->correo',
        domicilio='$this->domicilio'
        WHERE idcliente=?";
    $affected = DB::update($sql, [$this->idcliente]);
    }

    public function cambiarClave() {
        $sql = "UPDATE clientes SET
            clave='$this->clave'
            WHERE idcliente=?";
    $affected = DB::update($sql, [$this->idcliente]);
    }


   public function eliminar() { 
      $sql = "DELETE FROM clientes
       WHERE idcliente=?";
      $affected = DB::update($sql, [$this->idcliente]);
    }

   public function obtenerPorId($idcliente){
       $sql = "SELECT
               idcliente,
               nombre,
               apellido,
               telefono,
               correo, 
               clave,
               domicilio
               FROM clientes WHERE idcliente = $idcliente";
       $lstRetorno = DB::select($sql);

       if (count($lstRetorno) > 0) {
           $this->idcliente= $lstRetorno[0]->idcliente;
           $this->nombre = $lstRetorno[0]->nombre;
           $this->apellido = $lstRetorno[0]->apellido;
           $this->telefono = $lstRetorno[0]->telefono;
           $this->correo = $lstRetorno[0]->correo;
           $this->clave = $lstRetorno[0]->clave;
           $this->domicilio = $lstRetorno[0]->domicilio;
           return $this;
       }
       return null;
   }
   public function obtenerTodos(){
       $sql = "SELECT
               idcliente,
               nombre,
               apellido,
               telefono,
               correo, 
               clave,
               domicilio
               FROM clientes ORDER BY nombre";
       $lstRetorno = DB::select($sql);
       return $lstRetorno;
   }

    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.nombre',
            1 => 'A.apellido',
            2 => 'A.telefono',
            3 => 'A.correo',
            4 => 'A.domicilio',
        );
        $sql = "SELECT DISTINCT
                    A.idcliente,
                    A.nombre,
                    A.apellido,
                    A.telefono,
                    A.correo,
                    A.domicilio
                    FROM clientes A
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.apellido LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.telefono LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.correo LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.domicilio LIKE '%" . $request['search']['value'] . "%' )";


        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);
    
        return $lstRetorno;
    }

    public function encriptarClave($clave){
        $claveEncriptada = password_hash($clave, PASSWORD_DEFAULT);
        return $claveEncriptada;
    }

    public function verificarClave($claveIngresada, $claveEnBBDD){
        return password_verify($claveIngresada, $claveEnBBDD);
    }

    public function obtenerPorMail($mail) {
        $sql = "SELECT
                    idcliente,
                    nombre,
                    apellido,
                    telefono,
                    correo, 
                    clave,
                    domicilio
                    FROM clientes  
                    WHERE correo = '$mail'";
        $lstRetorno = DB::select($sql);

        if(count($lstRetorno)>0){
            $this->idcliente= $lstRetorno[0]->idcliente;
            $this->nombre = $lstRetorno[0]->nombre;
            $this->apellido = $lstRetorno[0]->apellido;
            $this->telefono = $lstRetorno[0]->telefono;
            $this->correo = $lstRetorno[0]->correo;
            $this->clave = $lstRetorno[0]->clave;
            $this->domicilio = $lstRetorno[0]->domicilio;
            return $lstRetorno[0];
        }
        return null;
    }
}