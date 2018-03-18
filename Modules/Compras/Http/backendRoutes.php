<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/compras'], function (Router $router) {
    $router->bind('proveedor', function ($id) {
        return app('Modules\Compras\Repositories\ProveedorRepository')->find($id);
    });
    $router->get('proveedors', [
        'as' => 'admin.compras.proveedor.index',
        'uses' => 'ProveedorController@index',
        'middleware' => 'can:compras.proveedors.index'
    ]);
    $router->get('proveedors/create', [
        'as' => 'admin.compras.proveedor.create',
        'uses' => 'ProveedorController@create',
        'middleware' => 'can:compras.proveedors.create'
    ]);
    $router->post('proveedors', [
        'as' => 'admin.compras.proveedor.store',
        'uses' => 'ProveedorController@store',
        'middleware' => 'can:compras.proveedors.create'
    ]);
    $router->get('proveedors/{proveedor}/edit', [
        'as' => 'admin.compras.proveedor.edit',
        'uses' => 'ProveedorController@edit',
        'middleware' => 'can:compras.proveedors.edit'
    ]);
    $router->put('proveedors/{proveedor}', [
        'as' => 'admin.compras.proveedor.update',
        'uses' => 'ProveedorController@update',
        'middleware' => 'can:compras.proveedors.edit'
    ]);
    $router->delete('proveedors/{proveedor}', [
        'as' => 'admin.compras.proveedor.destroy',
        'uses' => 'ProveedorController@destroy',
        'middleware' => 'can:compras.proveedors.destroy'
    ]);
    $router->bind('producto', function ($id) {
        return app('Modules\Compras\Repositories\ProductoRepository')->find($id);
    });
    $router->get('productos', [
        'as' => 'admin.compras.producto.index',
        'uses' => 'ProductoController@index',
        'middleware' => 'can:compras.productos.index'
    ]);
    $router->get('productos/create', [
        'as' => 'admin.compras.producto.create',
        'uses' => 'ProductoController@create',
        'middleware' => 'can:compras.productos.create'
    ]);
    $router->post('productos', [
        'as' => 'admin.compras.producto.store',
        'uses' => 'ProductoController@store',
        'middleware' => 'can:compras.productos.create'
    ]);
    $router->get('productos/{producto}/edit', [
        'as' => 'admin.compras.producto.edit',
        'uses' => 'ProductoController@edit',
        'middleware' => 'can:compras.productos.edit'
    ]);
    $router->put('productos/{producto}', [
        'as' => 'admin.compras.producto.update',
        'uses' => 'ProductoController@update',
        'middleware' => 'can:compras.productos.edit'
    ]);
    $router->delete('productos/{producto}', [
        'as' => 'admin.compras.producto.destroy',
        'uses' => 'ProductoController@destroy',
        'middleware' => 'can:compras.productos.destroy'
    ]);
// append


});
