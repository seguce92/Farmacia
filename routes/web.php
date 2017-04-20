<?php

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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/admin/user/{user}/menu', 'AdminUserControler@menu')->name('user.menu');;
Route::get('/settings/{user}', 'AdminUserControler@editProfile')->name('user.edit.profile');
Route::post('/admin/user/menu/{user}', 'AdminUserControler@menuStore');

Route::get('/admin/option/create/{padre}', 'OptionMenuController@create');
Route::get('/admin/option/orden', 'OptionMenuController@updateOrden');
Route::post('/admin/option/orden', 'OptionMenuController@updateOrden');

Route::resource('/admin/user',"AdminUserControler");
Route::resource('/admin/option',"OptionMenuController");
Route::resource('/admin/rols',"RolController");

Route::resource('inventario/icategorias', 'IcategoriaController');
Route::resource('inventario/unimeds', 'UnimedController');
Route::resource('inventario/iestados', 'IestadoController');
Route::resource('inventario/items', 'ItemController');

Route::resource('compras/proveedores', 'ProveedorController');
Route::resource('compras/cestados', 'CestadoController');
Route::resource('compras/tcomprobantes', 'TcomprobanteController');
Route::resource('compras/compras', 'CompraController');

Route::resource('ventas/vestados', 'VestadoController');
Route::resource('ventas/clientes', 'ClienteController');
Route::resource('ventas/ventas', 'VentaController');
Route::get('ventas/cancelar/{tempVenta}', 'VentaController@cancelar')->name('ventas.cancelar');
Route::get('ventas/anular/{venta}', 'VentaController@anular')->name('ventas.anular');

Route::resource('medicamentos/laboratorios', 'LaboratorioController');
Route::resource('medicamentos/fcategorias', 'FcategoriaController');
Route::resource('medicamentos/farmacos', 'FarmacoController');
Route::resource('medicamentos/medicamentos', 'MedicamentoController');

Route::get('graficas/ventas/dia', 'DashBoardController@graficaVentasDia');
Route::get('graficas/ventas/mes', 'DashBoardController@graficaVentasMes');
Route::get('graficas/ventas/anio', 'DashBoardController@graficaVentasAnio');

Route::resource('admin/horarios', 'HorarioController');