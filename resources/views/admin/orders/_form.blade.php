<h2>Pedido: #{{$entity->id}} - R$ {{$entity->total}}</h2>
<h3>Cliente: {{$entity->client->name}}</h3>
<h4>Data: {{$entity->created_at->format('d/m/Y H:i:s')}}</h4>
@if ($entity->deliveryAddresses)
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Dados para entrega</strong>
        <p>
            @foreach($entity->deliveryAddresses as $item)
                <strong>Endereço: </strong>{{ $item->address }}  <br>
                <strong>Complemento: </strong>{{ $item->complement }} <br>
                <strong>Ponto de Referência: </strong>{{ $item->reference_point }} <br>
                <strong>Número: </strong>{{ $item->number }} <br>
                <strong>Bairro: </strong>{{ $item->neighborhood }} <br>
                <strong>Cidade: </strong>{{ $item->city }}/{{ $item->state }} <br>
                <strong>CEP: </strong> {{ $item->zipcode }}
            @endforeach
        </p>
    </div>
@endif
<div class="row">
    <div class="col-sm-6">
        <!-- Entregador Form Imput -->
        <div class="form-group {{ $errors->has('user_deliveryman_id') ? 'has-error': '' }}">
            {!! Form::label("user_deliveryman_id", "Entregador:") !!}
            {!! Form::select('user_deliveryman_id',$deliveryman, null,['class'=>'form-control']) !!}
            @if($errors->has('user_deliveryman_id'))
                <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('user_deliveryman_id') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <!-- Status do Pedido Form Imput -->
        <div class="form-group {{ $errors->has('status') ? 'has-error': '' }}">
            {!! Form::label("status", "Status do Pedido:") !!}
            {!! Form::select('status',$list_status, null,['class'=>'form-control']) !!}
            @if($errors->has('status'))
                <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('status') }}</span>
            @endif
        </div>
    </div>
</div>


