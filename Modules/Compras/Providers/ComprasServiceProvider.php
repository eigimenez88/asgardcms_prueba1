<?php

namespace Modules\Compras\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Compras\Events\Handlers\RegisterComprasSidebar;

class ComprasServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterComprasSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('proveedors', array_dot(trans('compras::proveedors')));
            $event->load('productos', array_dot(trans('compras::productos')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('compras', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Compras\Repositories\ProveedorRepository',
            function () {
                $repository = new \Modules\Compras\Repositories\Eloquent\EloquentProveedorRepository(new \Modules\Compras\Entities\Proveedor());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Compras\Repositories\Cache\CacheProveedorDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Compras\Repositories\ProductoRepository',
            function () {
                $repository = new \Modules\Compras\Repositories\Eloquent\EloquentProductoRepository(new \Modules\Compras\Entities\Producto());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Compras\Repositories\Cache\CacheProductoDecorator($repository);
            }
        );
// add bindings


    }
}
