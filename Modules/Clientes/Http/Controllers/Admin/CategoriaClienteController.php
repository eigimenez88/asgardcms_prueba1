<?php

namespace Modules\Clientes\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Clientes\Entities\CategoriaCliente;
use Modules\Clientes\Http\Requests\CreateCategoriaClienteRequest;
use Modules\Clientes\Http\Requests\UpdateCategoriaClienteRequest;
use Modules\Clientes\Repositories\CategoriaClienteRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CategoriaClienteController extends AdminBaseController
{
    /**
     * @var CategoriaClienteRepository
     */
    private $categoriacliente;

    public function __construct(CategoriaClienteRepository $categoriacliente)
    {
        parent::__construct();

        $this->categoriacliente = $categoriacliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categoriaclientes = $this->categoriacliente->all();
/*  
        $nuevo_objeto = new CategoriaCliente;
        $nuevo_objeto->nombre = "Categoria B";
        $nuevo_objeto->descripcion = "alguna descripcion categoria B";
        $nuevo_objeto->save();
*/
/*
        dd(
            CategoriaCliente::get()->toArray()
        );
        */
        return view('clientes::admin.categoriaclientes.index', compact('categoriaclientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('clientes::admin.categoriaclientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoriaClienteRequest $request
     * @return Response
     */
    public function store(CreateCategoriaClienteRequest $request)
    {
        //dd( $request->all() );
        $this->categoriacliente->create($request->all());

        return redirect()->route('admin.clientes.categoriacliente.index')
            ->withSuccess("Se creo ya la categoria!!!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CategoriaCliente $categoriacliente
     * @return Response
     */
    public function edit(CategoriaCliente $categoriacliente)
    {
        return view('clientes::admin.categoriaclientes.edit', compact('categoriacliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoriaCliente $categoriacliente
     * @param  UpdateCategoriaClienteRequest $request
     * @return Response
     */
    public function update(CategoriaCliente $categoriacliente, UpdateCategoriaClienteRequest $request)
    {
        $this->categoriacliente->update($categoriacliente, $request->all());

        return redirect()->route('admin.clientes.categoriacliente.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('clientes::categoriaclientes.title.categoriaclientes')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CategoriaCliente $categoriacliente
     * @return Response
     */
    public function destroy(CategoriaCliente $categoriacliente)
    {
        $this->categoriacliente->destroy($categoriacliente);

        return redirect()->route('admin.clientes.categoriacliente.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('clientes::categoriaclientes.title.categoriaclientes')]));
    }
}
