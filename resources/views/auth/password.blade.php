<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Redefinir Senha</title>

	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="#"><b>Redefinir </b>Senha</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Preencha o formulário abaixo</p>
		@if (session('status'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{{ session('status') }}
			</div>
		@endif
		{!! Form::open([ 'url' => '/password/email', 'method' => 'POST', 'role' => 'form']) !!}

		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
			{!! Form::text('email', old('email'), array_merge(['class' => 'form-control', 'placeholder' => 'Inserir E-mail'] )) !!}
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>

		<div class="row">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-primary btn-block btn-flat">
					<i class="fa fa-btn fa-sign-in"></i> Redefinir Senha
				</button>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<a class="btn btn-default btn-block btn-flat" href="{{ url('/auth/register') }}">
					<i class="fa fa-btn fa-user-plus"></i>
					Novo Usuário
				</a>
			</div>
			<div class="col-xs-6">
				<a class="btn btn-default btn-block btn-flat" href="{{ url('/auth/login') }}">
					<i class="fa fa-btn fa-sign-in"></i>
					Login
				</a>
			</div>
			<!-- /.col -->
		</div>
	{!! Form::close() !!}
	<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>