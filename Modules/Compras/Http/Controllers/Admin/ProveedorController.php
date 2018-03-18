<?php

namespace Modules\Compras\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Compras\Entities\Proveedor;
use Modules\Compras\Http\Requests\CreateProveedorRequest;
use Modules\Compras\Http\Requests\UpdateProveedorRequest;
use Modules\Compras\Repositories\ProveedorRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ProveedorController extends AdminBaseController
{
    /**
     * @var ProveedorRepository
     */
    private $proveedor;

    public function __construct(ProveedorRepository $proveedor)
    {
        parent::__construct();

        $this->proveedor = $proveedor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$proveedors = $this->proveedor->all();

        return view('compras::admin.proveedors.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('compras::admin.proveedors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProveedorRequest $request
     * @return Response
     */
    public function store(CreateProveedorRequest $request)
    {
        $this->proveedor->create($request->all());

        return redirect()->route('admin.compras.proveedor.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('compras::proveedors.title.proveedors')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Proveedor $proveedor
     * @return Response
     */
    public function edit(Proveedor $proveedor)
    {
        return view('compras::admin.proveedors.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Proveedor $proveedor
     * @param  UpdateProveedorRequest $request
     * @return Response
     */
    public function update(Proveedor $proveedor, UpdateProveedorRequest $request)
    {
        $this->proveedor->update($proveedor, $request->all());

        return redirect()->route('admin.compras.proveedor.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('compras::proveedors.title.proveedors')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Proveedor $proveedor
     * @return Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $this->proveedor->destroy($proveedor);

        return redirect()->route('admin.compras.proveedor.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('compras::proveedors.title.proveedors')]));
    }
}
