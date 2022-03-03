<?php
 //use Carbon\Carbon; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/*Route::get('/time' , function(){$date =new Carbon;echo $date ; } );*/


Route::group(array('domain' => '127.0.0.1'), function () {

    Route::get('/', 'ControladorWebHome@index');
    Route::get('/nosotros', 'ControladorWebNosotros@index');
    Route::post('/nosotros', 'ControladorWebNosotros@guardar');
    Route::get('/nosotrosok', 'ControladorWebNosotrosOk@index');
    Route::get('/producto', 'ControladorWebProducto@index');
    Route::get('/producto-detalle2/{id}', 'ControladorWebProducto@detalle2');
    Route::get('/promocion-detalle/{id}', 'ControladorWebPromocion@detalle');
    Route::post('/producto', 'ControladorWebProducto@insertarCarrito');
    Route::get('/producto-solo', 'ControladorWebProductoSolo@index');
    Route::get('/producto-solo', 'ControladorWebProductoSolo@insertarCarrito');
    Route::get('/promocion-solo', 'ControladorWebPromocion@index');
    Route::get('/contacto', 'ControladorWebContacto@index');
    Route::post('/contacto', 'ControladorWebContacto@enviar');
    Route::get('/contactado', 'ControladorWebContactado@index');
    Route::get('/mi-cuenta', 'ControladorWebMiCuenta@index');
    Route::post('/mi-cuenta', 'ControladorWebMiCuenta@guardar');
    Route::get('/logout', 'ControladorWebLogin@cerrarSesion');
    Route::get('/registro', 'ControladorWebRegistro@index');
    Route::post('/registro', 'ControladorWebRegistro@enviar');
    Route::get('/login', 'ControladorWebLogin@index');
    Route::post('/login', 'ControladorWebLogin@ingresar');
    Route::get('/carrito', 'ControladorWebCarrito@index');
    Route::post('/carrito', 'ControladorWebCarrito@finalizarPedido');
    Route::get('/carrito/eliminar/{id}', 'ControladorWebCarrito@eliminarProductoDelCarrito');
    Route::get('/olvido-su-clave', 'ControladorWebOlvidoSuClave@index');
    Route::post('/olvido-su-clave', 'ControladorWebOlvidoSuClave@recuperarClave');
    Route::post('/mercado-pago/aprobado', 'ControladorWebMercadoPago@aprobado');
    Route::post('/mercado-pago/pendiente', 'ControladorWebMercadoPago@pendiente');
    Route::post('/mercado-pago/error', 'ControladorWebMercadoPago@error');
    Route::get('/cambiar-clave', 'ControladorWebCambiarClave@index');
    Route::post('/cambiar-clave', 'ControladorWebCambiarClave@guardar');





    Route::get('/admin', 'ControladorHome@index');
    Route::post('/admin/patente/nuevo', 'ControladorPatente@guardar');

/* --------------------------------------------- */
/* CONTROLADOR LOGIN                           */
/* --------------------------------------------- */
    Route::get('/admin/login', 'ControladorLogin@index');
    Route::get('/admin/logout', 'ControladorLogin@logout');
    Route::post('/admin/logout', 'ControladorLogin@entrar');
    Route::post('/admin/login', 'ControladorLogin@entrar');

/* --------------------------------------------- */
/* CONTROLADOR RECUPERO CLAVE                    */
/* --------------------------------------------- */
    Route::get('/admin/recupero-clave', 'ControladorRecuperoClave@index');
    Route::post('/admin/recupero-clave', 'ControladorRecuperoClave@recuperar');

/* --------------------------------------------- */
/* CONTROLADOR PERMISO                           */
/* --------------------------------------------- */
    Route::get('/admin/usuarios/cargarGrillaFamiliaDisponibles', 'ControladorPermiso@cargarGrillaFamiliaDisponibles')->name('usuarios.cargarGrillaFamiliaDisponibles');
    Route::get('/admin/usuarios/cargarGrillaFamiliasDelUsuario', 'ControladorPermiso@cargarGrillaFamiliasDelUsuario')->name('usuarios.cargarGrillaFamiliasDelUsuario');
    Route::get('/admin/permisos', 'ControladorPermiso@index');
    Route::get('/admin/permisos/cargarGrilla', 'ControladorPermiso@cargarGrilla')->name('permiso.cargarGrilla');
    Route::get('/admin/permiso/nuevo', 'ControladorPermiso@nuevo');
    Route::get('/admin/permiso/cargarGrillaPatentesPorFamilia', 'ControladorPermiso@cargarGrillaPatentesPorFamilia')->name('permiso.cargarGrillaPatentesPorFamilia');
    Route::get('/admin/permiso/cargarGrillaPatentesDisponibles', 'ControladorPermiso@cargarGrillaPatentesDisponibles')->name('permiso.cargarGrillaPatentesDisponibles');
    Route::get('/admin/permiso/{idpermiso}', 'ControladorPermiso@editar');
    Route::post('/admin/permiso/{idpermiso}', 'ControladorPermiso@guardar');

/* --------------------------------------------- */
/* CONTROLADOR GRUPO                             */
/* --------------------------------------------- */
    Route::get('/admin/grupos', 'ControladorGrupo@index');
    Route::get('/admin/usuarios/cargarGrillaGruposDelUsuario', 'ControladorGrupo@cargarGrillaGruposDelUsuario')->name('usuarios.cargarGrillaGruposDelUsuario'); //otra cosa
    Route::get('/admin/usuarios/cargarGrillaGruposDisponibles', 'ControladorGrupo@cargarGrillaGruposDisponibles')->name('usuarios.cargarGrillaGruposDisponibles'); //otra cosa
    Route::get('/admin/grupos/cargarGrilla', 'ControladorGrupo@cargarGrilla')->name('grupo.cargarGrilla');
    Route::get('/admin/grupo/nuevo', 'ControladorGrupo@nuevo');
    Route::get('/admin/grupo/setearGrupo', 'ControladorGrupo@setearGrupo');
    Route::post('/admin/grupo/nuevo', 'ControladorGrupo@guardar');
    Route::get('/admin/grupo/{idgrupo}', 'ControladorGrupo@editar');
    Route::post('/admin/grupo/{idgrupo}', 'ControladorGrupo@guardar');

/* --------------------------------------------- */
/* CONTROLADOR USUARIO                           */
/* --------------------------------------------- */
    Route::get('/admin/usuarios', 'ControladorUsuario@index');
    Route::get('/admin/usuarios/nuevo', 'ControladorUsuario@nuevo');
    Route::post('/admin/usuarios/nuevo', 'ControladorUsuario@guardar');
    Route::post('/admin/usuarios/{usuario}', 'ControladorUsuario@guardar');
    Route::get('/admin/usuarios/cargarGrilla', 'ControladorUsuario@cargarGrilla')->name('usuarios.cargarGrilla');
    Route::get('/admin/usuarios/buscarUsuario', 'ControladorUsuario@buscarUsuario');
    Route::get('/admin/usuarios/{usuario}', 'ControladorUsuario@editar');

/* --------------------------------------------- */
/* CONTROLADOR MENU                             */
/* --------------------------------------------- */
    Route::get('/admin/sistema/menu', 'ControladorMenu@index');
    Route::get('/admin/sistema/menu/nuevo', 'ControladorMenu@nuevo');
    Route::post('/admin/sistema/menu/nuevo', 'ControladorMenu@guardar');
    Route::get('/admin/sistema/menu/cargarGrilla', 'ControladorMenu@cargarGrilla')->name('menu.cargarGrilla');
    Route::get('/admin/sistema/menu/eliminar', 'ControladorMenu@eliminar');
    Route::get('/admin/sistema/menu/{id}', 'ControladorMenu@editar');
    Route::post('/admin/sistema/menu/{id}', 'ControladorMenu@guardar');

});

/* --------------------------------------------- */
/* CONTROLADOR PATENTES                          */
/* --------------------------------------------- */
Route::get('/admin/patentes', 'ControladorPatente@index');
Route::get('/admin/patente/nuevo', 'ControladorPatente@nuevo');
Route::post('/admin/patente/nuevo', 'ControladorPatente@guardar');
Route::get('/admin/patente/cargarGrilla', 'ControladorPatente@cargarGrilla')->name('patente.cargarGrilla');
Route::get('/admin/patente/eliminar', 'ControladorPatente@eliminar');
Route::get('/admin/patente/nuevo/{id}', 'ControladorPatente@editar');
Route::post('/admin/patente/nuevo/{id}', 'ControladorPatente@guardar');

/* --------------------------------------------- */
/* CONTROLADOR CLIENTE                           */
/* --------------------------------------------- */
Route::get('/admin/cliente/nuevo', 'ControladorCliente@nuevo');
Route::post('/admin/cliente/nuevo', 'ControladorCliente@guardar');
Route::get('/admin/clientes', 'ControladorCliente@index');
Route::get('/admin/clientes/cargarGrilla', 'ControladorCliente@cargarGrilla')->name('cliente.cargarGrilla');
Route::get('/admin/cliente/eliminar', 'ControladorCliente@eliminar');
Route::get('/admin/cliente/{id}', 'ControladorCliente@editar');
Route::post('/admin/cliente/{id}', 'ControladorCliente@guardar');





/* --------------------------------------------- */
/* CONTROLADOR PEDIDO                           */
/* --------------------------------------------- */
Route::get('/admin/pedido/nuevo', 'ControladorPedido@nuevo');
Route::post('/admin/pedido/nuevo', 'ControladorPedido@guardar');
Route::get('/admin/pedidos', 'ControladorPedido@index');
Route::get('/admin/pedidos/cargarGrilla', 'ControladorPedido@cargarGrilla')->name('pedido.cargarGrilla');
Route::get('/admin/pedido/eliminar', 'ControladorPedido@eliminar');
Route::get('/admin/pedido/{id}', 'ControladorPedido@editar');
Route::post('/admin/pedido/{id}', 'ControladorPedido@guardar');



/* --------------------------------------------- */
/* CONTROLADOR PRODUCTO                           */
/* --------------------------------------------- */
Route::get('/admin/producto/nuevo', 'ControladorProducto@nuevo');
Route::post('/admin/producto/nuevo', 'ControladorProducto@guardar');
Route::get('/admin/productos', 'ControladorProducto@index');
Route::get('/admin/productos/cargarGrilla', 'ControladorProducto@cargarGrilla')->name('producto.cargarGrilla');
Route::get('/admin/producto/eliminar', 'ControladorProducto@eliminar');
Route::get('/admin/producto/{id}', 'ControladorProducto@editar');
Route::post('/admin/producto/{id}', 'ControladorProducto@guardar');





/* --------------------------------------------- */
/* CONTROLADOR PROMOCION                          */
/* --------------------------------------------- */
Route::get('/admin/promocion/nuevo', 'ControladorPromocion@nuevo');
Route::post('/admin/promocion/nuevo', 'ControladorPromocion@guardar');
Route::get('/admin/promociones', 'ControladorPromocion@index');
Route::get('/admin/promociones/cargarGrilla', 'ControladorPromocion@cargarGrilla')->name('promocion.cargarGrilla');
Route::get('/admin/promocion/eliminar', 'ControladorPromocion@eliminar');
Route::get('/admin/promocion/{id}', 'ControladorPromocion@editar');
Route::post('/admin/promocion/{id}', 'ControladorPromocion@guardar');








