<?php

namespace CodeDelivery\Providers;

use CodeDelivery\Repositories\AvaliacaoRepository;
use CodeDelivery\Repositories\AvaliacaoRepositoryEloquent;
use CodeDelivery\Repositories\CategoryExtrasRepository;
use CodeDelivery\Repositories\CategoryExtrasRepositoryEloquent;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\CategoryRepositoryEloquent;
use CodeDelivery\Repositories\CidadeRepository;
use CodeDelivery\Repositories\CidadeRepositoryEloquent;
use CodeDelivery\Repositories\ContatoRepository;
use CodeDelivery\Repositories\ContatoRepositoryEloquent;
use CodeDelivery\Repositories\EstabelecimentoRepository;
use CodeDelivery\Repositories\EstabelecimentoRepositoryEloquent;
use CodeDelivery\Repositories\EstadoRepository;
use CodeDelivery\Repositories\EstadoRepositoryEloquent;
use CodeDelivery\Repositories\OrderAvaliacaoRepository;
use CodeDelivery\Repositories\OrderAvaliacaoRepositoryEloquent;
use CodeDelivery\Repositories\ProductExtraItemRepository;
use CodeDelivery\Repositories\ProductExtraItemRepositoryEloquent;
use CodeDelivery\Repositories\ProductExtraRepository;
use CodeDelivery\Repositories\ProductExtraRepositoryEloquent;
use CodeDelivery\Repositories\UserAddressRepository;
use CodeDelivery\Repositories\UserAddressRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AvaliacaoRepository::class,
            AvaliacaoRepositoryEloquent::class
        );
        $this->app->bind(
            CategoryRepository::class,
            CategoryRepositoryEloquent::class
        );
        $this->app->bind(
            CidadeRepository::class,
            CidadeRepositoryEloquent::class
        );
        $this->app->bind(
            EstadoRepository::class,
            EstadoRepositoryEloquent::class
        );
        $this->app->bind(
            'CodeDelivery\Repositories\ClientRepository',
            'CodeDelivery\Repositories\ClientRepositoryEloquent'
        );
        $this->app->bind(
            'CodeDelivery\Repositories\OrderRepository',
            'CodeDelivery\Repositories\OrderRepositoryEloquent'
        );
        $this->app->bind(
            'CodeDelivery\Repositories\OrderItemRepository',
            'CodeDelivery\Repositories\OrderItemRepositoryEloquent'
        );
        $this->app->bind(
            'CodeDelivery\Repositories\ProductRepository',
            'CodeDelivery\Repositories\ProductRepositoryEloquent'
        );
        $this->app->bind(
            'CodeDelivery\Repositories\UserRepository',
            'CodeDelivery\Repositories\UserRepositoryEloquent'
        );
        $this->app->bind(
            'CodeDelivery\Repositories\CupomRepository',
            'CodeDelivery\Repositories\CupomRepositoryEloquent'
        );
        $this->app->bind(
            EstabelecimentoRepository::class,
            EstabelecimentoRepositoryEloquent::class
        );
        $this->app->bind(
            OrderAvaliacaoRepository::class,
            OrderAvaliacaoRepositoryEloquent::class
        );
        $this->app->bind(
            UserAddressRepository::class,
            UserAddressRepositoryEloquent::class
        );
        $this->app->bind(
            ContatoRepository::class,
            ContatoRepositoryEloquent::class
        );

    }
}
