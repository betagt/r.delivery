<div class="form-group {{ $errors->has('user[name]') ? 'has-error': '' }}">
    {!! Form::label('name','Nome:') !!}
    {!! Form::text('user[name]',null,['class'=>'form-control', 'placeholder' => 'Inserir o Nome']) !!}
    @if($errors->has('user[name]'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('user[name]') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('user[email]') ? 'has-error': '' }}">
    {!! Form::label('user[email]','Email:') !!}
    {!! Form::text('user[email]',null,['class'=>'form-control', 'placeholder' => 'Inserir o E-mail']) !!}
    @if($errors->has('user[email]'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('user[email]') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error': '' }}">
    {!! Form::label('phone','Telefone:') !!}
    {!! Form::text('phone',null,['class'=>'form-control', 'placeholder' => 'Inserir o Telefone de Contato']) !!}
    @if($errors->has('phone'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('phone') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error': '' }}">
    {!! Form::label('address','Endereço:') !!}
    {!! Form::textarea('address',null,['class'=>'form-control', 'placeholder' => 'Inserir o Endereço']) !!}
    @if($errors->has('address'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('address') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('city') ? 'has-error': '' }}">
    {!! Form::label('city','Cidade:') !!}
    {!! Form::text('city',null,['class'=>'form-control', 'placeholder' => 'Inserir a Cidade']) !!}
    @if($errors->has('city'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('city') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('state') ? 'has-error': '' }}">
    {!! Form::label('state','Estado:') !!}
    {!! Form::text('state',null,['class'=>'form-control', 'placeholder' => 'Inserir o Estado(UF)']) !!}
    @if($errors->has('state'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('state') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('zipcode') ? 'has-error': '' }}">
    {!! Form::label('zipcode','CEP:') !!}
    {!! Form::text('zipcode',null,['class'=>'form-control', 'placeholder' => 'Inserir o CEP']) !!}
    @if($errors->has('zipcode'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('zipcode') }}</span>
    @endif
</div>