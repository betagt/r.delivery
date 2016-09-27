<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(CodeDelivery\Models\User::class, function (Faker\Generator $faker) {
    $date = new \DateTime('now');
    return [
        'name' => $faker->name,
        'cpf' => $faker->word,
        'data_nascimento' => $date->format('Y-m-d'),
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'telefone_celular' => $faker->phoneNumber,
        'telefone_fixo' => $faker->phoneNumber,
        'remember_token' => str_random(10),
    ];
});

$factory->define(\CodeDelivery\Models\Estabelecimento::class, function (Faker\Generator $faker) {
    return [
        'icone' => $faker->imageUrl(177, 150),
        'nome' => $faker->name,
        'descricao' => $faker->text,
        'telefone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'power' => 1
    ];
});


$factory->define(\CodeDelivery\Models\Estado::class, function (Faker\Generator $faker) {
    return [
        'uf' => $faker->citySuffix,
        'nome' => $faker->city,
        'status' => 1
    ];
});


$factory->define(\CodeDelivery\Models\Cidade::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->city,
        'status' => 1
    ];
});

$factory->define(\CodeDelivery\Models\Cozinha::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->word,
        'status' => 1
    ];
});

$factory->define(\CodeDelivery\Models\EstabelecimentoEntrega::class, function (Faker\Generator $faker) {
    return [
        'tempo_entrega' => random_int(1, 2),
		'faixa_preco' => random_int(1, 3),
		'tipo_pagamento' => random_int(1, 3),
		'tipo_entrega' => random_int(1, 2),
    ];
});

$factory->define(\CodeDelivery\Models\EstabelecimentoEndereco::class, function (Faker\Generator $faker) {
    return [
        'endereco' => $faker->address,
        'numero' => random_int(1, 100),
        'bairro' => $faker->streetAddress,
        'cidade' => $faker->city,
        'estado' => $faker->state,
        'cep' => $faker->postcode,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
    ];
});

$factory->define(\CodeDelivery\Models\EstabelecimentoFuncionamento::class, function (Faker\Generator $faker) {
    return [
        'dia_funcionamento' => random_int(1, 7),
        'horario_funcionamento' => random_int(1, 5),
    ];
});

$factory->define(\CodeDelivery\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(10, 50),
    ];
});

$factory->define(\CodeDelivery\Models\UserAddress::class, function (Faker\Generator $faker) {
    return [
        'address' => $faker->address,
        'complement' => $faker->paragraph,
        'reference_point' => $faker->paragraph,
        'neighborhood' => $faker->word,
        'number' => random_int(1, 200),
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->postcode,
    ];
});

$factory->define(\CodeDelivery\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'client_id' => random_int(1, 10),
        'total' => random_int(50, 100),
        'status' => 0,
    ];
});

$factory->define(\CodeDelivery\Models\OrderAvaliacao::class, function (Faker\Generator $faker) {
    return [
        'mensagem' => $faker->text,
    ];
});

$factory->define(\CodeDelivery\Models\Avaliacao::class, function (Faker\Generator $faker) {
    return [
        'questao' => $faker->word,
        'status' => random_int(1, 2)
    ];
});

$factory->define(\CodeDelivery\Models\OrderItem::class, function (Faker\Generator $faker) {
    return [

    ];
});

$factory->define(\CodeDelivery\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'parent_id' => 0,
        'name' => $faker->word,
    ];
});

$factory->define(\CodeDelivery\Models\CategoryExtra::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(\CodeDelivery\Models\Cupom::class, function (Faker\Generator $faker) {
    return [
        'code' => random_int(100, 1000),
        'value' => random_int(50, 100),
    ];
});

$factory->define(\CodeDelivery\Models\OauthClient::class, function (Faker\Generator $faker) {
    return [
        'id' => 'appid'.random_int(1, 50),
        'secret' => substr(md5(time()),0,10),
        'name' => $faker->word,
    ];
});

$factory->define(\CodeDelivery\Models\Contato::class, function (Faker\Generator $faker) {
    return [
        'assunto' => $faker->paragraph,
        'mensagem' => $faker->text,
    ];
});

$factory->define(\CodeDelivery\Models\ProductPorcao::class, function(Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'porcao' => random_int(1, 4),
        'preco' => 10,
    ];
});