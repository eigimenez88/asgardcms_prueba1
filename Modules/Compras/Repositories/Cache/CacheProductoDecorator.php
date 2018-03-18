<?php

namespace Modules\Compras\Repositories\Cache;

use Modules\Compras\Repositories\ProductoRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheProductoDecorator extends BaseCacheDecorator implements ProductoRepository
{
    public function __construct(ProductoRepository $producto)
    {
        parent::__construct();
        $this->entityName = 'compras.productos';
        $this->repository = $producto;
    }
}
