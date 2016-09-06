@extends('admin.base.list')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_avaliacoes') !!}
@endsection
@section('header')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="{{ route('admin.avaliacoes.create') }}" class="btn btn-primary btn-flat" target="_blank">
                <i class="fa fa-plus"></i> Novo Registro
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h4>Pesquisar Registros</h4>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
        {!! Form::open(['method' => 'GET' ]) !!}
        <!-- Pesquisar Form Imput -->
            <div class="col-xs-6 col-sm-10 col-md-10 col-lg-10">
                {!! Form::text("search", null, ['class' => 'form-control', 'placeholder' => 'Inserir texto para consulta']) !!}
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <button type="submit" class="btn btn-default btn-flat btn-block">
                    <i class="fa fa-btn fa-search"></i> Pesquisar
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('list')
    {!! Form::open(['method' => 'post', 'url' => '/admin/avaliacoes/destroy', 'id' => 'formfield']) !!}
    <table class="table table-hover">
        <thead>
        <tr>
            <th><input type="checkbox" name="all" id="all" data-toggle="tooltip" data-placement="top" title="Marcar/Desmarcar Todos"></th>
            <th>ID</th>
            <th>Questão</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $item)
            <tr>
                <td><input type="checkbox" name="id[]" value="{{ $item->id }}" class="item"></td>
                <td>{{$item->id}}</td>
                <td>{{$item->questao}}</td>
                <td>
                    @if ($item->status == 1)
                        <span class="label label-success"><i class="fa fa-check"></i> Ativo</span>
                    @else
                        <span class="label label-warning"><i class="fa fa-exclamation"></i> Inativo</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('admin.avaliacoes.edit',['id'=>$item->id])}}" class="btn btn-default"
                       data-toggle="tooltip" data-placement="top" target="_blank" title="Editar #{{ $item->id }}"
                    >
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a href="{{route('admin.avaliacoes.show',['id'=>$item->id])}}" class="btn btn-default"
                       data-toggle="tooltip" data-placement="top" target="_blank" title="Visualizar #{{ $item->id }}"
                    >
                        <i class="fa fa-search"></i>
                    </a>
                    <a href="{{ route('admin.avaliacoes.destroy', [ 'id' => $item->id]) }}" class="btn btn-danger delete"
                       data-toggle="tooltip" data-placement="top" title="Excluir #{{ $item->id }}"
                    >
                        <i class="fa fa-close"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="form-group">
        <button id="delete-selecionados" class="btn btn-flat btn-danger">
            <i class="fa fa-times"></i> Excluir Registros Selecionados
        </button>
    </div>
    {!! Form::close() !!}
@endsection
@section('footer')
    {!! $list->render() !!}
@endsection