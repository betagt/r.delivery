<!-- Código Form Imput -->
<div class="form-group {{ $errors->has('code') ? 'has-error': '' }}">
    {!! Form::label("code", "Código:") !!}
    {!! Form::text("code", null, ['class' => 'form-control']) !!}
    @if($errors->has('code'))
        <span class='help-block'>{{ $errors->first('code') }}</span>
    @endif
</div>
<!-- Valor do Cupom Form Imput -->
<div class="form-group {{ $errors->has('value') ? 'has-error': '' }}">
    {!! Form::label("value", "Valor do Cupom:") !!}
    {!! Form::text("value", null, ['class' => 'form-control value']) !!}
    @if($errors->has('value'))
        <span class='help-block'>{{ $errors->first('value') }}</span>
    @endif
</div>
@section('js')
    @parent
    <script src="{{ asset('src/node_modules/jquery-mask-plugin/src/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.value').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>
@endsection