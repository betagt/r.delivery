<h2>Pedido: #{{$entity->id}} - R$ {{$entity->total}}</h2>
<h3>Cliente: {{$entity->client->name}}</h3>
<h4>Data: {{$entity->created_at->format('d/m/Y H:i:s')}}</h4>
<p>
    <b>Entregar em:</b><br>
    {{$entity->client->address}} - {{$entity->client->city}} - {{$entity->client->state}}
</p>

<!-- Entregador Form Imput -->
<div class="form-group {{ $errors->has('user_deliveryman_id') ? 'has-error': '' }}">
    {!! Form::label("user_deliveryman_id", "Entregador:") !!}
    {!! Form::select('user_deliveryman_id',$deliveryman, null,['class'=>'form-control']) !!}
    @if($errors->has('user_deliveryman_id'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('user_deliveryman_id') }}</span>
    @endif
</div>

<!-- Status do Pedido Form Imput -->
<div class="form-group {{ $errors->has('status') ? 'has-error': '' }}">
    {!! Form::label("status", "Status do Pedido:") !!}
    {!! Form::select('status',$list_status, null,['class'=>'form-control']) !!}
    @if($errors->has('status'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('status') }}</span>
    @endif
</div>