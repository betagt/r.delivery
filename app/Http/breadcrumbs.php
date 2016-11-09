<?php

Breadcrumbs::register("admin_home", function($breadcrumbs)
{
    $breadcrumbs->push("Principal", route("admin.home"));
});

Breadcrumbs::register("cliente_home", function($breadcrumbs)
{
    $breadcrumbs->push("Principal", route("cliente.home"));
});

// Dashboard > Usuários
Breadcrumbs::register("cliente_users_show", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("cliente_home");
    $breadcrumbs->push("Meu Perfil", route("cliente.users.show", [ 'id' => $entity->id ]));
});

// Dashboard > Usuários
Breadcrumbs::register("admin_users", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.users.index"));
});

// Dashboard > Usuários > Create
Breadcrumbs::register("admin_users_create", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.users.index"));
    $breadcrumbs->push("Novo Registro", route("admin.users.create"));
});

// Dashboard > Usuários > Show
Breadcrumbs::register("admin_users_show", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.users.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.users.show", [ 'id' => $entity->id ]));
});

// Dashboard > Usuários > Edit
Breadcrumbs::register("admin_users_edit", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.users.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.users.show", [ 'id' => $entity->id ]));
    $breadcrumbs->push("Editar #{$entity->id}", route("admin.users.edit", [ 'id' => $entity->id ]));
});

// Dashboard > Pedidos
Breadcrumbs::register("admin_orders", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.orders.index"));
});

// Dashboard > Pedidos > Create
Breadcrumbs::register("admin_orders_create", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.orders.index"));
    $breadcrumbs->push("Novo Registro", route("admin.orders.create"));
});

// Dashboard > Pedidos > Show
Breadcrumbs::register("admin_orders_show", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.orders.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.orders.show", [ 'id' => $entity->id ]));
});

// Dashboard > Pedidos > Edit
Breadcrumbs::register("admin_orders_edit", function($breadcrumbs, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.orders.index"));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.orders.show", [ 'id' => $entity->id ]));
    $breadcrumbs->push("Editar #{$entity->id}", route("admin.orders.edit", [ 'id' => $entity->id ]));
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

// Dashboard > Estabelecimentos > Categorias
Breadcrumbs::register("admin_estabelecimento_categories", function($breadcrumbs, $relation)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Todos os Estabelecimentos", route("admin.estabelecimentos.index"));
    $breadcrumbs->push("Estabelecimento #{$relation->id}", route("admin.estabelecimentos.show", [ 'id' => $relation->id ]));
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.estabelecimentos.categories.index", ['estabelecimento_id' => $relation->id]));
});

// Dashboard > Estabelecimentos > Categorias > Create
Breadcrumbs::register("admin_estabelecimento_categories_create", function($breadcrumbs, $relation)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Todos os Estabelecimentos", route("admin.estabelecimentos.index"));
    $breadcrumbs->push("Estabelecimento #{$relation->id}", route("admin.estabelecimentos.show", [ 'id' => $relation->id ]));
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.estabelecimentos.categories.index", ['estabelecimento_id' => $relation->id]));
    $breadcrumbs->push("Novo Registro", route("admin.estabelecimentos.categories.create"));
});

// Dashboard > Estabelecimentos > Categorias > Show
Breadcrumbs::register("admin_estabelecimento_categories_show", function($breadcrumbs, $relation, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Todos os Estabelecimentos", route("admin.estabelecimentos.index"));
    $breadcrumbs->push("Estabelecimento #{$relation->id}", route("admin.estabelecimentos.show", [ 'id' => $relation->id ]));
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.estabelecimentos.categories.index", ['estabelecimento_id' => $relation->id]));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.estabelecimentos.categories.show", [ 'estabelecimento_id' => $relation->id, 'id' => $entity->id ]));
});

// Dashboard > Estabelecimentos > Categorias > Edit
Breadcrumbs::register("admin_estabelecimento_categories_edit", function($breadcrumbs, $relation, $entity)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Todos os Estabelecimentos", route("admin.estabelecimentos.index"));
    $breadcrumbs->push("Estabelecimento #{$relation->id}", route("admin.estabelecimentos.show", [ 'id' => $relation->id ]));
    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.estabelecimentos.categories.index", ['estabelecimento_id' => $relation->id]));
    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.estabelecimentos.categories.show", [ 'estabelecimento_id' => $relation->id, 'id' => $entity->id ]));
    $breadcrumbs->push("Editar #{$entity->id}", route("admin.estabelecimentos.categories.edit", [ 'estabelecimento_id' => $relation->id, 'id' => $entity->id ]));
});