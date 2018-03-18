<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/clientes'], function (Router $router) {
    $router->bind('categoriacliente', function ($id) {
        return app('Modules\Clientes\Repositories\CategoriaClienteRepository')->find($id);
    });
    $router->get('categoriaclientes', [
        'as' => 'admin.clientes.categoriacliente.index',
        'uses' => 'CategoriaClienteController@index',
        'middleware' => 'can:clientes.categoriaclientes.index'
    ]);
    $router->get('categoriaclientes/create', [
        'as' => 'admin.clientes.categoriacliente.create',
        'uses' => 'CategoriaClienteController@create',
        'middleware' => 'can:clientes.categoriaclientes.create'
    ]);
    $router->post('categoriaclientes', [
        'as' => 'admin.clientes.categoriacliente.store',
        'uses' => 'CategoriaClienteController@store',
        'middleware' => 'can:clientes.categoriaclientes.create'
    ]);
    $router->get('categoriaclientes/{categoriacliente}/edit', [
        'as' => 'admin.clientes.categoriacliente.edit',
        'uses' => 'CategoriaClienteController@edit',
        'middleware' => 'can:clientes.categoriaclientes.edit'
    ]);
    $router->put('categoriaclientes/{categoriacliente}', [
        'as' => 'admin.clientes.categoriacliente.update',
        'uses' => 'CategoriaClienteController@update',
        'middleware' => 'can:clientes.categoriaclientes.edit'
    ]);
    $router->delete('categoriaclientes/{categoriacliente}', [
        'as' => 'admin.clientes.categoriacliente.destroy',
        'uses' => 'CategoriaClienteController@destroy',
        'middleware' => 'can:clientes.categoriaclientes.destroy'
    ]);
    $router->bind('cliente', function ($id) {
        return app('Modules\Clientes\Repositories\ClienteRepository')->find($id);
    });
    $router->get('clientes', [
        'as' => 'admin.clientes.cliente.index',
        'uses' => 'ClienteController@index',
        'middleware' => 'can:clientes.clientes.index'
    ]);
    $router->get('clientes/create', [
        'as' => 'admin.clientes.cliente.create',
        'uses' => 'ClienteController@create',
        'middleware' => 'can:clientes.clientes.create'
    ]);
    $router->post('clientes', [
        'as' => 'admin.clientes.cliente.store',
        'uses' => 'ClienteController@store',
        'middleware' => 'can:clientes.clientes.create'
    ]);
    $router->get('clientes/{cliente}/edit', [
        'as' => 'admin.clientes.cliente.edit',
        'uses' => 'ClienteController@edit',
        'middleware' => 'can:clientes.clientes.edit'
    ]);
    $router->put('clientes/{cliente}', [
        'as' => 'admin.clientes.cliente.update',
        'uses' => 'ClienteController@update',
        'middleware' => 'can:clientes.clientes.edit'
    ]);
    $router->delete('clientes/{cliente}', [
        'as' => 'admin.clientes.cliente.destroy',
        'uses' => 'ClienteController@destroy',
        'middleware' => 'can:clientes.clientes.destroy'
    ]);
// append


});
