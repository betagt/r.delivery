@section('breadcrumbs')
    {!! Breadcrumbs::render('cliente_users_show', $entity) !!}
@endsection

@section('header')
    <h4>Meu Perfil</h4>
@endsection

@section('content')
    <div class="row" ng-app="app">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img src="{{ $estabelecimento->icone }}" alt="{{ $estabelecimento->nome }}"
                         class="profile-user-img img-responsive img-circle">
                    <h3 class="profile-username text-center">{{ $estabelecimento->nome }}</h3>
                    <p class="text-muted text-center">{{ $estabelecimento->cidade->nome }}</p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Pedidos em Aberto</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Pedidos Entregues</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Total Faturado</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>
                    <a href="{{ route('cliente.home') }}" class="btn btn-primary btn-block btn-flat">
                        <i class="fa fa-shopping-cart"></i> Detalhar Pedidos
                    </a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Meus Dados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p>
                        <strong>Nome: </strong> {{ $entity->name }} <br/>
                        <strong>E-mail: </strong> {{ $entity->email }} <br/>
                        <strong>Sexo: </strong> @if ($entity->sexo == 'M') Masculino @else Feminino @endif <br/>
                        @if($entity->telefone_celular)
                            <strong>Celular: </strong>  {{ $entity->telefone_celular }}<br/>
                        @endif
                        @if($entity->telefone_fixo)
                            <strong>Telefone Fixo: </strong>  {{ $entity->telefone_fixo }}<br/>
                        @endif
                    </p>
                    <p>
                    <hr>
                    <strong>Endereço: </strong> Malibu, California
                    </p>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('admin.users.print', [ 'id' => $entity->id]) }}"
                       class="btn btn-default btn-block btn-flat">
                        <i class="fa fa-print"></i> Imprimir
                    </a>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#categorias" data-toggle="tab">
                            <i class="fa fa-tags"></i> Categoria dos Produtos
                        </a>
                    </li>
                    <li>
                        <a href="#produtos" data-toggle="tab">
                            <i class="fa fa-archive"></i> Produtos
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="categorias" ng-controller="CategoriaController"
                         ng-init="init({{ $estabelecimento->id }})">
                        @include('admin.users.angular.modal')
                        <button class="btn btn-primary btn-flat mb" ng-click="novo()">
                            <i class="fa fa-plus"></i> Adicionar Nova Categoria
                        </button>
                        <div ng-show="editing">
                            @include('admin.users.angular.categoria_form')
                        </div>
                        @include('admin.users.angular.categoria_list')
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="produtos">
                        <a href="" class="btn btn-primary btn-flat mb">
                            <i class="fa fa-plus"></i> Adicionar Novo Produto
                        </a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Opções do Produto</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categorias as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-default btn-sm btn-flat">
                                            <i class="fa fa-pencil"></i>
                                            Alterar
                                        </a>
                                        <a href="" class="btn btn-default btn-sm btn-flat">
                                            <i class="fa fa-search"></i>
                                            Detalhar
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm btn-flat">
                                            <i class="fa fa-close"></i>
                                            Remover
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
@endsection