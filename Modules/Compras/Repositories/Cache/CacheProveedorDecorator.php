<?php

namespace Modules\Compras\Repositories\Cache;

use Modules\Compras\Repositories\ProveedorRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheProveedorDecorator extends BaseCacheDecorator implements ProveedorRepository
{
    public function __construct(ProveedorRepository $proveedor)
    {
        parent::__construct();
        $this->entityName = 'compras.proveedors';
        $this->repository = $proveedor;
    }
}
