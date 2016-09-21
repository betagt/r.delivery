@extends('admin.base.list')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('src/node_modules/admin-lte/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_estabelecimentos_show', $entity) !!}
@endsection
@section('header')
    <a href="{{ route('admin.estabelecimentos.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Novo Registro</a>
@endsection
@section('list')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ícone</td>
                <td><img src="/images/estabelecimentos/{{ $entity->icone }}" alt="{{ $entity->nome }}"></td>
            </tr>
            <tr>
                <td>Nome</td>
                <td>{{ $entity->nome }}</td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td>{{ $entity->descricao }}</td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><i class="fa fa-envelope-o"></i> {{ $entity->email }}</td>
            </tr>
            <tr>
                <td>Telefone</td>
                <td><i class="fa fa-phone"></i> {{ $entity->telefone }}</td>
            </tr>
            <tr>
                <td>Power</td>
                <td>
                    @if ($entity->power == 1)
                        <i class="fa fa-toggle-on"></i>
                    @else
                        <i class="fa fa-toggle-off"></i>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    @if ($entity->status == 1)
                        <span class="label label-success"><i class="fa fa-check"></i> Ativo</span>
                    @else
                        <span class="label label-danger"><i class="fa fa-close"></i> Inativo</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <div class="mt">
        <a href="{{ route('admin.estabelecimentos.index') }}" class="btn btn-default">
            <i class="fa fa-list-ul"></i>
            Listar Registros
        </a>
        <a href="{{ route('admin.estabelecimentos.edit', ['id' => $entity->id]) }}" class="btn btn-default">
            <i class="fa fa-pencil"></i> Alterar Registro
        </a>
        <a href="{{ route('admin.estabelecimentos.print', ['id' => $entity->id]) }}" class="btn btn-default">
            <i class="fa fa-print"></i> Imprimir
        </a>
        <a href="{{ route('admin.estabelecimentos.destroy', [ 'id' => $entity->id]) }}" class="btn btn-danger delete">
            <i class="fa fa-close"></i> Excluir
        </a>
    </div>
@endsection
@section('footer')
    <div class="nav-tabs-custom mt2">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Tab1</a></li>
            <li><a href="#tab2" role="tab" data-toggle="tab">Tab2</a></li>
            <li><a href="#tab3" role="tab" data-toggle="tab">Tab3</a></li>
            <li><a href="#tab4" role="tab" data-toggle="tab">Tab4</a></li>
            <li><a href="#tab5" role="tab" data-toggle="tab">Tab5</a></li>
            <li><a href="#tab6" role="tab" data-toggle="tab"><i class="fa fa-gift"></i> Produtos</a></li>
        </ul>
        <!-- TAB CONTENT -->
        <div class="tab-content">
            <div class="active tab-pane fade in" id="tab1">
                <h2>Tab1</h2>
                <p>Lorem ipsum.</p>
            </div>
            <div class="tab-pane fade" id="tab2">
                <h2>Tab2</h2>
                <p>Lorem ipsum.</p>
            </div>
            <div class="tab-pane fade" id="tab3">
                <h2>Tab3</h2>
                <p>Lorem ipsum.</p>
            </div>
            <div class="tab-pane fade" id="tab4">
                <h2>Tab4</h2>
                <p>Lorem ipsum.</p>
            </div>
            <div class="tab-pane fade" id="tab5">
                <h2>Tab5</h2>
                <p>Lorem ipsum.</p>
            </div>
            <div class="tab-pane fade" id="tab6">
                @include('admin.old.estabelecimentos.complemento.produtos')
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
    <script src="{{ asset('src/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('src/node_modules/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#produtos').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
@endsection