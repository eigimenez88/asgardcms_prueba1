<?php

namespace Modules\Clientes\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Clientes\Events\Handlers\RegisterClientesSidebar;

class ClientesServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterClientesSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('categoriaclientes', array_dot(trans('clientes::categoriaclientes')));
            $event->load('clientes', array_dot(trans('clientes::clientes')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('clientes', 'permissions');

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
            'Modules\Clientes\Repositories\CategoriaClienteRepository',
            function () {
                $repository = new \Modules\Clientes\Repositories\Eloquent\EloquentCategoriaClienteRepository(new \Modules\Clientes\Entities\CategoriaCliente());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Clientes\Repositories\Cache\CacheCategoriaClienteDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Clientes\Repositories\ClienteRepository',
            function () {
                $repository = new \Modules\Clientes\Repositories\Eloquent\EloquentClienteRepository(new \Modules\Clientes\Entities\Cliente());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Clientes\Repositories\Cache\CacheClienteDecorator($repository);
            }
        );
// add bindings


    }
}
