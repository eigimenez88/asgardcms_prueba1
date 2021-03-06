<?php

namespace Modules\Compras\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Compras\Entities\Producto;
use Modules\Compras\Http\Requests\CreateProductoRequest;
use Modules\Compras\Http\Requests\UpdateProductoRequest;
use Modules\Compras\Repositories\ProductoRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ProductoController extends AdminBaseController
{
    /**
     * @var ProductoRepository
     */
    private $producto;

    public function __construct(ProductoRepository $producto)
    {
        parent::__construct();

        $this->producto = $producto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $productos = $this->producto->all();

        return view('compras::admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $producto = new \Producto;
        return view('compras::admin.productos.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProductoRequest $request
     * @return Response
     */
    public function store(CreateProductoRequest $request)
    {
        $producto = \Producto::create($request->all());

        event( new \ProductoWasCreated( $producto, $request->all() ) );

        return redirect()->route('admin.compras.producto.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('compras::productos.title.productos')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Producto $producto
     * @return Response
     */
    public function edit(Producto $producto)
    {
        return view('compras::admin.productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Producto $producto
     * @param  UpdateProductoRequest $request
     * @return Response
     */
    public function update(\Producto $producto, UpdateProductoRequest $request)
    {
        $producto->update($request->all());

        event( new \ProductoWasUpdated( $producto, $request->all() ) );        
        

        return redirect()->route('admin.compras.producto.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('compras::productos.title.productos')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Producto $producto
     * @return Response
     */
    public function destroy(\Producto $producto)
    {
        event(new \ProductoWasDeleted( $producto ));

        $producto->delete($producto);

        return redirect()->route('admin.compras.producto.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('compras::productos.title.productos')]));
    }
}
