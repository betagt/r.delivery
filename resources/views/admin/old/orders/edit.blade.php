@extends('admin.base.template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_orders_edit', $entity) !!}
@endsection
@section('content')
    {!! Form::Model($entity,['route'=>['admin.orders.update',$entity->id]]) !!}
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Preencher formulário abaixo</h3>
        </div>
        <div class="box-body">
            <h2>Pedido: #{{$entity->id}} - R$ {{$entity->total}}</h2>
            <h3>Cliente: {{$entity->client->user->name}}</h3>
            <h4>Data: {{$entity->created_at->format('d/m/Y H:i:s')}}</h4>
            <p>
                <b>Entregar em:</b><br>
                {{$entity->client->address}} - {{$entity->client->city}} - {{$entity->client->state}}

            </p>
            @include('admin.base.errors')
            <!-- Status do Pedido Form Imput -->
            <div class="form-group {{ $errors->has('status') ? 'has-error': '' }}">
                {!! Form::label("status", "Status do Pedido:") !!}
                {!! Form::select('status',$list_status,null,['class'=>'form-control']) !!}
                @if($errors->has('status'))
                    <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('status') }}</span>
                @endif
            </div>
            <!-- Entregador Form Imput -->
            <div class="form-group {{ $errors->has('user_deliveryman_id') ? 'has-error': '' }}">
                {!! Form::label("user_deliveryman_id", "Entregador:") !!}
                {!! Form::select('user_deliveryman_id',$deliveryman,null,['class'=>'form-control']) !!}
                @if($errors->has('user_deliveryman_id'))
                    <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('user_deliveryman_id') }}</span>
                @endif
            </div>
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