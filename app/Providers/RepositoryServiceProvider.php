<?php

namespace CodeDelivery\Providers;

use CodeDelivery\Repositories\AvaliacaoRepository;
use CodeDelivery\Repositories\AvaliacaoRepositoryEloquent;
use CodeDelivery\Repositories\CategoryExtrasRepository;
use CodeDelivery\Repositories\CategoryExtrasRepositoryEloquent;
use CodeDelivery\Repositories\ContatoRepository;
use CodeDelivery\Repositories\ContatoRepositoryEloquent;
use CodeDelivery\Repositories\EstabelecimentoRepository;
use CodeDelivery\Repositories\EstabelecimentoRepositoryEloquent;
use CodeDelivery\Repositories\OrderAvaliacaoRepository;
use CodeDelivery\Repositories\OrderAvaliacaoRepositoryEloquent;
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
            'CodeDelivery\Repositories\CategoryRepository',
            'CodeDelivery\Repositories\CategoryRepositoryEloquent'
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
            AvaliacaoRepository::class,
            AvaliacaoRepositoryEloquent::class
        );
        $this->app->bind(
            CategoryExtraRepository::class,
            CategoryExtraRepositoryEloquent::class
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
