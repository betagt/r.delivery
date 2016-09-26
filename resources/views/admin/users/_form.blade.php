<div class="row">
    <div class="col-sm-3">
        <!-- Role Form Imput -->
        <div class="form-group">
            {!! Form::label("role", "Tipo de Usuário:") !!}
            {!! Form::select("role", ['client' => 'Cliente', 'deliveryman' => 'Entregador'], null, [ 'class' => 'form-control select' ]) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('name') ? 'has-error': '' }}">
            {!! Form::label('name','Nome:') !!}
            {!! Form::text('name',null,['class'=>'form-control', 'placeholder' => 'Inserir Nome']) !!}
            @if($errors->has('name'))
                <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group {{ $errors->has('cpf') ? 'has-error': '' }}">
            {!! Form::label('cpf','CPF:') !!}
            {!! Form::text('cpf',null,['class'=>'form-control cpf', 'placeholder' => 'Inserir CPF']) !!}
            @if($errors->has('cpf'))
                <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('cpf') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group {{ $errors->has('data_nascimento') ? 'has-error': '' }}">
            {!! Form::label('data_nascimento','Data de Nascimento:') !!}
            <div class='input-group'>
                {!! Form::text('data_nascimento',null,['class'=>'form-control date', 'placeholder' => 'Inserir Data de Nascimento']) !!}
                <span class="input-group-addon">
            <span class="fa fa-calendar"></span>
        </span>
            </div>
            @if($errors->has('data_nascimento'))
                <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('data_nascimento') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('email') ? 'has-error': '' }}">
            {!! Form::label('email','Email:') !!}
            {!! Form::text('email',null,['class'=>'form-control', 'placeholder' => 'Inserir Email']) !!}
            @if($errors->has('email'))
                <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <!-- Sexo Form Imput -->
        <div class="form-group">
            {!! Form::label("sexo", "Sexo:") !!}
            {!! Form::select("sexo", ['M' => 'Masculino', 'F' => 'Feminino'], null, [ 'class' => 'form-control' ]) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group {{ $errors->has('telefone_celular') ? 'has-error': '' }}">
            {!! Form::label('telefone_celular','Celular:') !!}
            {!! Form::text('telefone_celular',null,['class'=>'form-control telefone', 'placeholder' => 'Inserir Telefone Celular']) !!}
            @if($errors->has('telefone_celular'))
                <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('telefone_celular') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('telefone_fixo','Telefone Fixo:') !!}
            {!! Form::text('telefone_fixo',null,['class'=>'form-control telefone', 'placeholder' => 'Inserir Telefone Fixo']) !!}
        </div>
    </div>
</div>

@section('js')
    @parent
    <script>
        $('.telefone').mask("(99) 9999-99999").ready(function (event) {
            var target, phone, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unsetMask();
            if (phone.length > 10) {
                element.setMask("(99) 99999-9999");
            } else {
                element.setMask("(99) 9999-99999");
            }
        });
    </script>
@endsection