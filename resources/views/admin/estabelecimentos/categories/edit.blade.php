@extends('admin.base.template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_categories_edit', $relation, $entity) !!}
@endsection
@section('content')
    {!! Form::Model($entity,['route'=>['admin.categories.update',$entity->id]]) !!}
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Preencher formulário abaixo</h3>
        </div>
        <div class="box-body">
            @include('admin.base.errors')
            @include('admin.estabelecimentos.categories._form')
        </div>
        <div class="box-footer">
            <button class="btn btn-warning btn-flat pull-right">
                <i class="fa fa-times"></i> Cancelar
            </button>
            <button class="btn btn-primary btn-flat">
                <i class="fa fa-btn fa-floppy-o"></i> Salvar Registro
            </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection