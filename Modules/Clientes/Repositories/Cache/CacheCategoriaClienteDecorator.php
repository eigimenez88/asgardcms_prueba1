<?php

namespace Modules\Clientes\Repositories\Cache;

use Modules\Clientes\Repositories\CategoriaClienteRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCategoriaClienteDecorator extends BaseCacheDecorator implements CategoriaClienteRepository
{
    public function __construct(CategoriaClienteRepository $categoriacliente)
    {
        parent::__construct();
        $this->entityName = 'clientes.categoriaclientes';
        $this->repository = $categoriacliente;
    }
}
