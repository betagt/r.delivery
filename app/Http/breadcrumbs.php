<?php

Breadcrumbs::register("admin_home", function($breadcrumbs)
{
    $breadcrumbs->push("Principal", route("admin.home"));
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

// Dashboard > Gerenciar Estabelecimentos
Breadcrumbs::register("admin_categories", function($breadcrumbs)
{
    $breadcrumbs->parent("admin_home");
    $breadcrumbs->push("Gerenciar Estabelecimentos", route("admin.estabelecimentos.index"));
});


//// Dashboard > Categorias dos Produtos
//Breadcrumbs::register("admin_categories", function($breadcrumbs)
//{
//    $breadcrumbs->parent("admin_home");
//    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.categories.index"));
//});

//// Dashboard > Categorias dos Produtos > Create
//Breadcrumbs::register("admin_categories_create", function($breadcrumbs)
//{
//    $breadcrumbs->parent("admin_home");
//    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.categories.index"));
//    $breadcrumbs->push("Novo Registro", route("admin.categories.create"));
//});
//
//// Dashboard > Categorias dos Produtos > Show
//Breadcrumbs::register("admin_categories_show", function($breadcrumbs, $entity)
//{
//    $breadcrumbs->parent("admin_home");
//    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.categories.index"));
//    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.categories.show", [ 'id' => $entity->id ]));
//});
//
//// Dashboard > Categorias dos Produtos > Edit
//Breadcrumbs::register("admin_categories_edit", function($breadcrumbs, $entity)
//{
//    $breadcrumbs->parent("admin_home");
//    $breadcrumbs->push("Listagem/Pesquisa de Registros", route("admin.categories.index"));
//    $breadcrumbs->push("Visualizar Registro #{$entity->id}", route("admin.categories.show", [ 'id' => $entity->id ]));
//    $breadcrumbs->push("Editar #{$entity->id}", route("admin.categories.edit", [ 'id' => $entity->id ]));
//});