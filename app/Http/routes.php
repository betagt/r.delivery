<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [
    'uses' => 'TestController@index',
    'as' => 'test.index'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole:admin', 'as' => 'admin.'], function () {
    Route::get('', [
        'as' => 'home',
        'uses' => 'DashboardController@index'
    ]);
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('', [
            'as' => 'index',
            'uses' => 'CategoriesController@index'
        ]);
        Route::get('create', [
            'as' => 'create',
            'uses' => 'CategoriesController@create'
        ]);
        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'CategoriesController@show'
        ]);
        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'CategoriesController@edit'
        ]);
        Route::post('store', [
            'as' => 'store',
            'uses' => 'CategoriesController@store'
        ]);
        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'CategoriesController@update'
        ]);
        Route::get('destroy/{id}', [
            'as' => 'destroy',
            'uses' => 'CategoriesController@destroy'
        ]);
        Route::post('destroy', [
            'as' => 'destroySelected',
            'uses' => 'CategoriesController@destroySelected'
        ]);
    });

    Route::group(['prefix' => 'clients', 'as' => 'clients.'], function () {
        Route::get('', [
            'as' => 'index',
            'uses' => 'ClientsController@index'
        ]);
        Route::get('create', [
            'as' => 'create',
            'uses' => 'ClientsController@create'
        ]);
        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'ClientsController@show'
        ]);
        Route::get('print/{id}', [
            'as' => 'print',
            'uses' => 'ClientsController@printReport'
        ]);
        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'ClientsController@edit'
        ]);
        Route::post('store', [
            'as' => 'store',
            'uses' => 'ClientsController@store'
        ]);
        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'ClientsController@update'
        ]);
    });

    Route::group(['prefix' => 'estabelecimentos', 'as' => 'estabelecimentos.'], function () {
        Route::get('', [
            'as' => 'index',
            'uses' => 'EstabelecimentosController@index'
        ]);
        Route::get('create', [
            'as' => 'create',
            'uses' => 'EstabelecimentosController@create'
        ]);
        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'EstabelecimentosController@show'
        ]);
        Route::get('print/{id}', [
            'as' => 'print',
            'uses' => 'EstabelecimentosController@printReport'
        ]);
        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'EstabelecimentosController@edit'
        ]);
        Route::post('store', [
            'as' => 'store',
            'uses' => 'EstabelecimentosController@store'
        ]);
        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'EstabelecimentosController@update'
        ]);
        Route::get('destroy/{id}', [
            'as' => 'destroy',
            'uses' => 'EstabelecimentosController@destroy'
        ]);
        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::get('{estabelecimentoId}/create', [
                'as' => 'create',
                'uses' => 'ProductsController@create'
            ]);
            Route::get('{estabelecimentoId}/show/{id}', [
                'as' => 'show',
                'uses' => 'ProductsController@show'
            ]);
            Route::get('{estabelecimentoId}/print/{id}', [
                'as' => 'print',
                'uses' => 'ProductsController@printReport'
            ]);
            Route::get('{estabelecimentoId}/edit/{id}', [
                'as' => 'edit',
                'uses' => 'ProductsController@edit'
            ]);
            Route::post('{estabelecimentoId}/store', [
                'as' => 'store',
                'uses' => 'ProductsController@store'
            ]);
            Route::post('{estabelecimentoId}/update/{id}', [
                'as' => 'update',
                'uses' => 'ProductsController@update'
            ]);
            Route::get('{estabelecimentoId}/destroy/{id}', [
                'as' => 'destroy',
                'uses' => 'ProductsController@destroy'
            ]);
        });
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('', [
            'as' => 'index',
            'uses' => 'OrdersController@index'
        ]);
        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'OrdersController@show'
        ]);
        Route::get('print/{id}', [
            'as' => 'print',
            'uses' => 'OrdersController@printReport'
        ]);
        Route::get('{id}', [
            'as' => 'edit',
            'uses' => 'OrdersController@edit'
        ]);
        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'OrdersController@update'
        ]);
        Route::get('destroy/{id}', [
            'as' => 'destroy',
            'uses' => 'OrdersController@destroy'
        ]);
    });

    Route::group(['prefix' => 'cupons', 'as' => 'cupons.'], function () {
        Route::get('', [
            'as' => 'index',
            'uses' => 'CuponsController@index'
        ]);
        Route::get('create', [
            'as' => 'create',
            'uses' => 'CuponsController@create'
        ]);
        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'CuponsController@show'
        ]);
        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'CuponsController@edit'
        ]);
        Route::post('store', [
            'as' => 'store',
            'uses' => 'CuponsController@store'
        ]);
        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'CuponsController@update'
        ]);
        Route::get('destroy/{id}', [
            'as' => 'destroy',
            'uses' => 'CuponsController@destroy'
        ]);
        Route::post('destroy', [
            'as' => 'destroySelected',
            'uses' => 'CuponsController@destroySelected'
        ]);
    });
    Route::group(['prefix' => 'avaliacoes', 'as' => 'avaliacoes.'], function () {
        Route::get('', [
            'as' => 'index',
            'uses' => 'AvaliacoesController@index'
        ]);
        Route::get('create', [
            'as' => 'create',
            'uses' => 'AvaliacoesController@create'
        ]);
        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'AvaliacoesController@show'
        ]);
        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'AvaliacoesController@edit'
        ]);
        Route::post('store', [
            'as' => 'store',
            'uses' => 'AvaliacoesController@store'
        ]);
        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'AvaliacoesController@update'
        ]);
        Route::get('destroy/{id}', [
            'as' => 'destroy',
            'uses' => 'AvaliacoesController@destroy'
        ]);
        Route::post('destroy', [
            'as' => 'destroySelected',
            'uses' => 'AvaliacoesController@destroySelected'
        ]);
    });
});

Route::group(['prefix' => 'costumer', 'middleware' => 'auth.checkrole:client', 'as' => 'costumer.'], function () {
    Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
    Route::get('order/create', ['as' => 'order.create', 'uses' => 'CheckoutController@create']);
    Route::post('order/store', ['as' => 'order.store', 'uses' => 'CheckoutController@store']);
});

Route::group(['middleware' => 'cors'], function () {
    Route::post('oauth/access_token', function () {
        return Response::json(Authorizer::issueAccessToken());
    });

    Route::group(['prefix' => 'api', 'middleware' => 'oauth', 'as' => 'api.' ], function () {
        Route::patch('device_token', 'Api\UserController@updateDeviceToken');

        Route::group(['prefix' => 'users', 'as' => 'users.', 'namespace' => 'Api'], function(){
            Route::resource('address', 'UserAddressController');
            Route::get('restore/{id}', 'UserAddressController@restore');
            Route::patch('updatefone', 'UserController@updateFone');
        });

        Route::group(['prefix' => 'client', 'middleware' => 'oauth.checkrole:client', 'as' => 'client.', 'namespace' => 'Api\Client'], function () {
            Route::resource('order', 'ClientCheckoutController', [
                'except' => [
                    'create', 'edit', 'update', 'destroy'
                ]
            ]);
            Route::post('store_avaliacao', [
                'as'   => 'store_avaliacao',
                'uses' => 'ClientCheckoutController@storeAvaliacao'
            ]);
            Route::get('products', [
                'as' => 'products.index',
                'uses' => 'ClientProductController@index'
            ]);
            Route::get('product/{id}', [
                'as' => 'products.index',
                'uses' => 'ClientProductController@show'
            ]);
            Route::resource('estabelecimentos', 'ClientEstabelecimentoController', [
                'except' => [
                    'edit', 'update', 'destroy'
                ]
            ]);
            Route::get('estabelecimentos/{id}/categories', [
                'as' => 'estabelecimentos.categories',
                'uses' => 'ClientEstabelecimentoController@returnCategoriesAndProductsByEstabelecimento'
            ]);
        });

        Route::group(['prefix' => 'deliveryman', 'middleware' => 'oauth.checkrole:deliveryman', 'as' => 'deliveryman.', 'namespace' => 'Api\Deliveryman'], function () {

                Route::resource('order', 'DeliverymanCheckoutController', [
                    'except' => [
                        'edit', 'update', 'destroy'
                    ]
                ]);
                Route::patch('order/{id}/update-status', [
                    'uses' => 'DeliverymanCheckoutController@updateStatus',
                    'as' => 'update_status'
                ]);
                Route::post('/order/{id}/geo', [
                    'as' => 'geo',
                    'uses' => 'DeliverymanCheckoutController@geo'
                ]);
        });
        Route::get('authenticated', 'Api\UserController@authenticated');
        Route::get('cep/{cep}/json', 'Api\UtilController@cep');
        Route::get('cupom/{code}', 'Api\CupomController@show');
        Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
    });
});



