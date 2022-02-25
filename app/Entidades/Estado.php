<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    public $timestamps = false;

    protected $fillable = [
        'idestado', 'nombre'
    ];

    protected $hidden = [

    ];
    public function cargarDesdeRequest($request) {
        $this->idestado = $request->input('id') != "0" ? $request->input('id') : $this->idestado;
        $this->nombre = $request->input('txtNombre');
    }

   public function obtenerTodos(){
       $sql = "SELECT
               idestado,
               nombre
               FROM estados ORDER BY nombre";
       $lstRetorno = DB::select($sql);
       return $lstRetorno;

    }
}