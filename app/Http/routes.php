<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [
    'uses' => 'TestController@index',
    'as' => 'test.index'
]);

Route::get('angular/token', 'Angular\TokenController@getToken');

Route::group(['prefix' => 'api/angular', 'middleware' => 'cors', 'namespace' => 'Angular'], function(){

    Route::group(['prefix' => 'categoria', 'as' => 'categoria.'], function(){
        Route::get('', 'CategoriaController@index');
        Route::post('delete', 'CategoriaController@removeSelected');
        Route::post('salvar', 'CategoriaController@create');
        //Route::post('upload', 'CategoriaController@upload');
        Route::put('atualizar/{id}', 'CategoriaController@update');
        Route::group(['prefix' => 'produto', 'as' => 'produto.'], function(){
            Route::get('{categoryId}', 'ProdutoController@index');
            Route::post('delete', 'ProdutoController@removeSelected');
            Route::post('salvar', 'ProdutoController@create');
            Route::put('atualizar/{id}', 'ProdutoController@update');
        });
    });
    Route::group(['prefix' => 'estabelecimento', 'as' => 'estabelecimento.'], function(){
        Route::post('upload', 'EstabelecimentoController@upload');
        Route::put('atualizar/{id}', 'EstabelecimentoController@update');
    });
    Route::group(['prefix' => 'usuario', 'as' => 'usuario.'], function(){
        Route::post('upload', 'UsuarioController@upload');
        Route::put('atualizar/{id}', 'UsuarioController@update');
    });
});


Route::group(['prefix' => 'cliente', 'middleware' => 'auth.checkrole:estabelecimento', 'as' => 'cliente.', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'as' => 'home',
        'uses' => 'DashboardController@index'
    ]);
    Route::group(['prefix' => 'usuarios', 'as' => 'users.'], function () {
        Route::get('print/{id}', [
            'as' => 'print',
            'uses' => 'UsersController@printReport'
        ]);
        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'UsersController@show'
        ]);
        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'UsersController@edit'
        ]);
        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'UsersController@update'
        ]);
        Route::get('test', [
            'as' => 'test',
            'uses' => 'UsersController@test'
        ]);
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole:admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'as' => 'home',
        'uses' => 'DashboardController@index'
    ]);
    Route::group(['prefix' => 'usuarios', 'as' => 'users.'], function () {
        Route::get('', [
            'as' => 'index',
            'uses' => 'UsersController@index'
        ]);
        Route::get('create', [
            'as' => 'create',
            'uses' => 'UsersController@create'
        ]);
        Route::get('print/{id}', [
            'as' => 'print',
            'uses' => 'UsersController@printReport'
        ]);
        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'UsersController@show'
        ]);
        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'UsersController@edit'
        ]);
        Route::post('store', [
            'as' => 'store',
            'uses' => 'UsersController@store'
        ]);
        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'UsersController@update'
        ]);
        Route::get('destroy/{id}', [
            'as' => 'destroy',
            'uses' => 'UsersController@destroy'
        ]);
        Route::post('destroy', [
            'as' => 'destroySelected',
            'uses' => 'UsersController@destroySelected'
        ]);
    });
    Route::group(['prefix' => 'pedidos', 'as' => 'orders.'], function () {
        Route::get('', [
            'as' => 'index',
            'uses' => 'OrdersController@index'
        ]);
        Route::get('create', [
            'as' => 'create',
            'uses' => 'OrdersController@create'
        ]);
        Route::get('print/{id}', [
            'as' => 'print',
            'uses' => 'OrdersController@printReport'
        ]);
        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'OrdersController@show'
        ]);
        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'OrdersController@edit'
        ]);
        Route::post('store', [
            'as' => 'store',
            'uses' => 'OrdersController@store'
        ]);
        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'OrdersController@update'
        ]);
        Route::get('destroy/{id}', [
            'as' => 'destroy',
            'uses' => 'OrdersController@destroy'
        ]);
        Route::post('destroy', [
            'as' => 'destroySelected',
            'uses' => 'OrdersController@destroySelected'
        ]);
    });
    Route::group(['prefix' => 'estabelecimentos', 'as' => 'estabelecimentos.'], function(){
        Route::get('', [
            'as' => 'index',
            'uses' => 'EstabelecimentosController@index'
        ]);
        Route::get('create', [
            'as' => 'create',
            'uses' => 'EstabelecimentosController@create'
        ]);
        Route::get('print/{id}', [
            'as' => 'print',
            'uses' => 'EstabelecimentosController@printReport'
        ]);
        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'EstabelecimentosController@show'
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
        Route::post('destroy', [
            'as' => 'destroySelected',
            'uses' => 'EstabelecimentosController@destroySelected'
        ]);
        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function(){
            Route::get('{estabelecimento_id}', [
                'as' => 'index',
                'uses' => 'CategoriesController@index'
            ]);
            Route::get('{estabelecimento_id}/create', [
                'as' => 'create',
                'uses' => 'CategoriesController@create'
            ]);
            Route::get('{estabelecimento_id}/print/{id}', [
                'as' => 'print',
                'uses' => 'CategoriesController@printReport'
            ]);
            Route::get('{estabelecimento_id}/show/{id}', [
                'as' => 'show',
                'uses' => 'CategoriesController@show'
            ]);
            Route::get('{estabelecimento_id}/edit/{id}', [
                'as' => 'edit',
                'uses' => 'CategoriesController@edit'
            ]);
            Route::post('{estabelecimento_id}/store', [
                'as' => 'store',
                'uses' => 'CategoriesController@store'
            ]);
            Route::post('{estabelecimento_id}/update/{id}', [
                'as' => 'update',
                'uses' => 'CategoriesController@update'
            ]);
            Route::get('{estabelecimento_id}/destroy/{id}', [
                'as' => 'destroy',
                'uses' => 'CategoriesController@destroy'
            ]);
            Route::post('{estabelecimento_id}/destroy', [
                'as' => 'destroySelected',
                'uses' => 'CategoriesController@destroySelected'
            ]);
        });

    });
});

Route::group(['prefix' => 'costumer', 'middleware' => 'auth.checkrole:client', 'as' => 'costumer.'], function () {
    Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
    Route::get('order/create', ['as' => 'order.create', 'uses' => 'CheckoutController@create']);
    Route::post('order/store', ['as' => 'order.store', 'uses' => 'CheckoutController@store']);
});

Route::group(['middleware' => 'cors'], function () {
    Route::group(['prefix' => 'ajax', 'as' => 'ajax.', 'namespace' => 'Ajax'], function(){
        Route::get('token', [
            'as' => 'getToken',
            'uses' => 'TokenController@getToken'
        ]);
        Route::group(['prefix' => 'estabelecimentos', 'as' => 'estabelecimentos.'], function(){
            Route::get('', [
                'as' => 'index',
                'uses' => 'EstabelecimentosController@index'
            ]);
        });
        Route::group(['prefix' => 'categorias', 'as' => 'categorias.'], function(){
            Route::get('{estabelecimento_id}', [
                'as' => 'index',
                'uses' => 'CategoriasController@index'
            ]);
            Route::post('create', [
                'as' => 'create',
                'uses' => 'CategoriasController@create'
            ]);
            Route::put('update/{id}', [
                'as' => 'update',
                'uses' => 'CategoriasController@update'
            ]);
            Route::get('delete/{id}', [
                'as' => 'delete',
                'uses' => 'CategoriasController@delete'
            ]);
        });
        Route::group(['prefix' => 'cidades', 'as' => 'cidades.'], function(){
            Route::get('', [
                'as' => 'index',
                'uses' => 'CidadesController@index'
            ]);
        });
    });
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
            Route::post('order/payment', [
                'as' => 'order.payment',
                'uses' => 'ClientCheckoutController@paymentConfirmation'
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

        Route::get('estabelecimento-categoria', [
            'as' => 'estabelecimentos.categories',
            'uses' => 'Api\Client\ClientEstabelecimentoController@categoriasEstabelecimentos'
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
        Route::post('geo/distancia', 'Api\UtilController@distanceCalculate');
        Route::get('cep/logradouro', 'Api\UtilController@cepLocation');
        Route::get('cupom/{code}', 'Api\CupomController@show');
        Route::get('pagamentoSession', 'Api\PagamentosController@getSessionId');
        Route::get('cupom/list/utilizados', 'Api\CupomController@utilizados');
        Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
    });
});