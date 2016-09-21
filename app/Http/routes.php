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
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('', [
            'as' => 'index',
            'uses' => 'Admin\UsersController@index'
        ]);
        Route::get('create', [
            'as' => 'create',
            'uses' => 'Admin\UsersController@create'
        ]);
        Route::get('print/{id}', [
            'as' => 'print',
            'uses' => 'Admin\UsersController@printReport'
        ]);
        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'Admin\UsersController@show'
        ]);
        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'Admin\UsersController@edit'
        ]);
        Route::post('store', [
            'as' => 'store',
            'uses' => 'Admin\UsersController@store'
        ]);
        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'Admin\UsersController@update'
        ]);
        Route::get('destroy/{id}', [
            'as' => 'destroy',
            'uses' => 'Admin\UsersController@destroy'
        ]);
        Route::post('destroy', [
            'as' => 'destroySelected',
            'uses' => 'Admin\UsersController@destroySelected'
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

    Route::get('cep/{cep}/json', 'Api\UtilController@cep');

    Route::group(['prefix' => 'api', 'middleware' => 'oauth', 'as' => 'api.'], function () {
        Route::patch('device_token', 'Api\UserController@updateDeviceToken');

        Route::group(['prefix' => 'users', 'as' => 'users.', 'namespace' => 'Api'], function () {
            Route::resource('address', 'UserAddressController');
            Route::get('restore/{id}', 'UserAddressController@restore');
            Route::patch('updatefone', 'UserController@updateFone');
            Route::put('update_user', [
                'as' => 'update_user',
                'uses' => 'UserController@updateUser'
            ]);
        });

        Route::group(['prefix' => 'client', 'middleware' => 'oauth.checkrole:client', 'as' => 'client.', 'namespace' => 'Api\Client'], function () {
            Route::resource('order', 'ClientCheckoutController', [
                'except' => [
                    'create', 'edit', 'update', 'destroy'
                ]
            ]);
            Route::post('{id}/store_avaliacao', [
                'as' => 'store_avaliacao',
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
            Route::get('estabelecimentos/{id}/avaliacoes/order', [
                'as' => 'estabelecimentos.avaliacoes.items',
                'uses' => 'ClientEstabelecimentoController@returnItemsAvaliadosByOrder'
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

        Route::post('store_user', [
            'as' => 'store_user',
            'uses' => 'Api\UserController@storeUser'
        ]);

        Route::patch('remember_me', [
            'as' => 'remember_me',
            'uses' => 'Api\UserController@rememberMe'
        ]);

        Route::resource('estabelecimentos', 'Api\Client\ClientEstabelecimentoController', [
            'except' => [
                'edit', 'update', 'destroy'
            ]
        ]);

        Route::get('estabelecimentos/{id}/categories', [
            'as' => 'estabelecimentos.categories',
            'uses' => 'Api\Client\ClientEstabelecimentoController@returnCategoriesAndProductsByEstabelecimento'
        ]);
        Route::get('questoes', [
            'as' => 'avalicaoes.questoes',
            'uses' => 'Api\Client\ClientEstabelecimentoController@questoes'
        ]);
        Route::get('estabelecimentos/{id}/avaliacoes', [
            'as' => 'estabelecimentos.avaliacoes',
            'uses' => 'Api\Client\ClientEstabelecimentoController@returnAvaliacoesByEstabelecimento'
        ]);
        Route::get('estabelecimentos/{id}/avaliacoes/items', [
            'as' => 'estabelecimentos.avaliacoes.items',
            'uses' => 'Api\Client\ClientEstabelecimentoController@returnAvaliacoesItemsByEstabelecimento'
        ]);
        Route::post('store_contato', [
            'as' => 'store_contato',
            'uses' => 'Api\Client\ClientCheckoutController@storeContato'
        ]);

        Route::get('authenticated', 'Api\UserController@authenticated');
        Route::get('cep/{cep}/json', 'Api\UtilController@cep');
        Route::get('cep/logradouro', 'Api\UtilController@cepLocation');
        Route::get('cupom/{code}', 'Api\CupomController@show');
        Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
    });
});



