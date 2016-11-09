<?php

namespace CodeDelivery\Providers;

use CodeDelivery\Repositories\AvaliacaoRepository;
use CodeDelivery\Repositories\AvaliacaoRepositoryEloquent;
use CodeDelivery\Repositories\CategoryPorcaoRepository;
use CodeDelivery\Repositories\CategoryPorcaoRepositoryEloquent;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\CategoryRepositoryEloquent;
use CodeDelivery\Repositories\CidadeRepository;
use CodeDelivery\Repositories\CidadeRepositoryEloquent;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\ClientRepositoryEloquent;
use CodeDelivery\Repositories\ContatoRepository;
use CodeDelivery\Repositories\ContatoRepositoryEloquent;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\CupomRepositoryEloquent;
use CodeDelivery\Repositories\EstabelecimentoCategoriaRepository;
use CodeDelivery\Repositories\EstabelecimentoCategoriaRepositoryEloquent;
use CodeDelivery\Repositories\EstabelecimentoRepository;
use CodeDelivery\Repositories\EstabelecimentoRepositoryEloquent;
use CodeDelivery\Repositories\EstadoRepository;
use CodeDelivery\Repositories\EstadoRepositoryEloquent;
use CodeDelivery\Repositories\GeoPositionRepository;
use CodeDelivery\Repositories\GeoPositionRepositoryEloquent;
use CodeDelivery\Repositories\OrderAvaliacaoRepository;
use CodeDelivery\Repositories\OrderAvaliacaoRepositoryEloquent;
use CodeDelivery\Repositories\OrderItemRepository;
use CodeDelivery\Repositories\OrderItemRepositoryEloquent;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\OrderRepositoryEloquent;
use CodeDelivery\Repositories\PorcaoRepository;
use CodeDelivery\Repositories\ProductPorcaoRepository;
use CodeDelivery\Repositories\ProductPorcaoRepositoryEloquent;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\ProductRepositoryEloquent;
use CodeDelivery\Repositories\UserAddressRepository;
use CodeDelivery\Repositories\UserAddressRepositoryEloquent;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\UserRepositoryEloquent;
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
            CupomRepository::class,
            CupomRepositoryEloquent::class
        );
        $this->app->bind(
            ClientRepository::class,
            ClientRepositoryEloquent::class
        );
        $this->app->bind(
            OrderRepository::class,
            OrderRepositoryEloquent::class
        );
        $this->app->bind(
            ProductRepository::class,
            ProductRepositoryEloquent::class
        );
        $this->app->bind(
            UserRepository::class,
            UserRepositoryEloquent::class
        );
        $this->app->bind(
            EstabelecimentoRepository::class,
            EstabelecimentoRepositoryEloquent::class
        );
        $this->app->bind(
            EstabelecimentoCategoriaRepository::class,
            EstabelecimentoCategoriaRepositoryEloquent::class
        );
        $this->app->bind(
            OrderAvaliacaoRepository::class,
            OrderAvaliacaoRepositoryEloquent::class
        );
        $this->app->bind(
            OrderItemRepository::class,
            OrderItemRepositoryEloquent::class
        );
        $this->app->bind(
            UserAddressRepository::class,
            UserAddressRepositoryEloquent::class
        );
        $this->app->bind(
            ContatoRepository::class,
            ContatoRepositoryEloquent::class
        );
        $this->app->bind(
            PorcaoRepository::class,
            PorcaoRepositoryEloquent::class
        );
        $this->app->bind(
            ProductPorcaoRepository::class,
            ProductPorcaoRepositoryEloquent::class
        );
        $this->app->bind(
            GeoPositionRepository::class,
            GeoPositionRepositoryEloquent::class
        );
        $this->app->bind(
            CategoryPorcaoRepository::class,
            CategoryPorcaoRepositoryEloquent::class
        );

    }
}
