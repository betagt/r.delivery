<?php

Breadcrumbs::register("admin_home", function($breadcrumbs)
{
    $breadcrumbs->push("Principal", route("admin.home"));
});

// Dashboard > Categories
Breadcrumbs::register("admin_categories", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.categories.index"));
});

// Dashboard > Categories > Create
Breadcrumbs::register("admin_categories_create", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.categories.index"));
    $breadcrumbs->push("Novo Registro", route("admin.categories.create"));
});

// Dashboard > Categories > Show
Breadcrumbs::register("admin_categories_show", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.categories.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->name}", route("admin.categories.show", [ 'id' => $entity->id ]));
});

// Dashboard > Categories > Edit
Breadcrumbs::register("admin_categories_edit", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.categories.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->name}", route("admin.categories.show", [ 'id' => $entity->id ]));
    $breadcrumbs->push("Editar #{$entity->id}", route("admin.categories.edit", [ 'id' => $entity->id ]));
});

// Dashboard > Clients
Breadcrumbs::register("admin_clients", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.clients.index"));
});

// Dashboard > Clients > Create
Breadcrumbs::register("admin_clients_create", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.clients.index"));
    $breadcrumbs->push("Novo Registro", route("admin.clients.create"));
});

// Dashboard > Clients > Show
Breadcrumbs::register("admin_clients_show", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.clients.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.clients.show", [ 'id' => $entity->id ]));
});

// Dashboard > Clients > Edit
Breadcrumbs::register("admin_clients_edit", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.clients.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.clients.show", [ 'id' => $entity->id ]));
    $breadcrumbs->push("Editar #{$entity->id}", route("admin.clients.edit", [ 'id' => $entity->id ]));
});

// Dashboard > Estabelecimentos
Breadcrumbs::register("admin_estabelecimentos", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.estabelecimentos.index"));
});

// Dashboard > Estabelecimentos > Create
Breadcrumbs::register("admin_estabelecimentos_create", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.estabelecimentos.index"));
    $breadcrumbs->push("Novo Registro", route("admin.estabelecimentos.create"));
});

// Dashboard > Estabelecimentos > Show
Breadcrumbs::register("admin_estabelecimentos_show", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.estabelecimentos.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.estabelecimentos.show", [ 'id' => $entity->id ]));
});

// Dashboard > Estabelecimentos > Edit
Breadcrumbs::register("admin_estabelecimentos_edit", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.estabelecimentos.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.estabelecimentos.show", [ 'id' => $entity->id ]));
    $breadcrumbs->push("Editar #{$entity->id}", route("admin.estabelecimentos.edit", [ 'id' => $entity->id ]));
});

// Dashboard > Estabelecimento > Produtos > create
Breadcrumbs::register("admin_estabelecimentos_products_create", function($breadcrumbs, $relation)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.estabelecimentos.index"));
    $breadcrumbs->push("Visualizar Registro #{$relation->id}", route("admin.estabelecimentos.show", [ 'id' => $relation->id ]));
    $breadcrumbs->push("Novo Registro", route("admin.estabelecimentos.products.create", [ 'estabelecimentoId' => $relation->id ]));
});

// Dashboard > Estabelecimento > Produtos > Show
Breadcrumbs::register("admin_estabelecimentos_products_show", function($breadcrumbs, $entity, $relation)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.estabelecimentos.index"));
    $breadcrumbs->push("Visualizar Registro #{$relation->id}", route("admin.estabelecimentos.show", [ 'id' => $relation->id ]));
    $breadcrumbs->push("Produto: {$entity->name}", route("admin.estabelecimentos.products.show", [ 'estabelecimentoId' => $relation->id, 'id' => $entity->id]));
});

// Dashboard > Estabelecimento > Produtos > Edit
Breadcrumbs::register("admin_estabelecimentos_products_edit", function($breadcrumbs, $entity, $relation)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.estabelecimentos.index"));
    $breadcrumbs->push("Visualizar Registro #{$relation->id}", route("admin.estabelecimentos.show", [ 'id' => $relation->id ]));
    $breadcrumbs->push("Produto: {$entity->name}", route("admin.estabelecimentos.products.create", [ 'estabelecimentoId' => $relation->id, 'id' => $entity->id]));
    $breadcrumbs->push("Editar #{$entity->id}", route("admin.estabelecimentos.edit", [ 'estabelecimentoId' => $relation->id, 'id' => $entity->id ]));
});

// Dashboard > Orders
Breadcrumbs::register("admin_orders", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.orders.index"));
});

// Dashboard > Orders > Show
Breadcrumbs::register("admin_orders_show", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.orders.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.orders.show", [ 'id' => $entity->id ]));
});

// Dashboard > Orders > Edit
Breadcrumbs::register("admin_orders_edit", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.orders.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.orders.show", [ 'id' => $entity->id ]));
    $breadcrumbs->push("Editar #{$entity->id}", route("admin.orders.edit", [ 'id' => $entity->id ]));
});

// Dashboard > Avaliações
Breadcrumbs::register("admin_avaliacoes", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.avaliacoes.index"));
});

// Dashboard > Avaliações > Create
Breadcrumbs::register("admin_avaliacoes_create", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.avaliacoes.index"));
    $breadcrumbs->push("Novo Registro", route("admin.avaliacoes.create"));
});

// Dashboard > Avaliações > Show
Breadcrumbs::register("admin_avaliacoes_show", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.avaliacoes.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.avaliacoes.show", [ 'id' => $entity->id ]));
});

// Dashboard > Avaliações > Edit
Breadcrumbs::register("admin_avaliacoes_edit", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.avaliacoes.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.avaliacoes.show", [ 'id' => $entity->id ]));
    $breadcrumbs->push("Editar #{$entity->id}", route("admin.avaliacoes.edit", [ 'id' => $entity->id ]));
});

// Dashboard > Cupons
Breadcrumbs::register("admin_cupons", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.cupons.index"));
});

// Dashboard > Cupons > Create
Breadcrumbs::register("admin_cupons_create", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.cupons.index"));
    $breadcrumbs->push("Novo Registro", route("admin.cupons.create"));
});

// Dashboard > Cupons > Show
Breadcrumbs::register("admin_cupons_show", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.cupons.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.cupons.show", [ 'id' => $entity->id ]));
});

// Dashboard > Cupons > Edit
Breadcrumbs::register("admin_cupons_edit", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.cupons.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->code}", route("admin.cupons.show", [ 'id' => $entity->id ]));
    $breadcrumbs->push("Editar #{$entity->id}", route("admin.cupons.edit", [ 'id' => $entity->id ]));
});