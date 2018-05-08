@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cadastro de Clientes</h1>
@stop

@section('content')

    <div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Dados do cliente</h3>
				</div>
				
				<form class="form-horizontal" method="post" action="{{url('/clientes')}}">
					@csrf
			
					@if(session()->has('message'))
						<div class="callout callout-danger">
							{{ session()->get('message') }}
						</div>
					@endif           

					<div class="box-body">

						<div class="form-group has-feedback {{ $errors->has('tipo') ? 'has-error' : '' }}">
							<label class="col-sm-2 control-label">Tipo de Pessoa</label>
							<div class="col-sm-10">
								<label class="radio-inline">
									<input type="radio" name="tipoPessoa" id="tipoPessoa1" value="1" onchange="verifyTipoPessoa()" checked>
									Fisíca 
								</label>
								<label class="radio-inline">
									<input type="radio" name="tipoPessoa" id="tipoPessoa2" value="2" onchange="verifyTipoPessoa()">
									Jurídica
								</label>
							</div>
						</div>

						<div id="nomecpf" class="form-group has-feedback {{ $errors->has('cpf') ? 'has-error' : '' }}" >
							<label for="cpf"  class="col-sm-2 control-label">CPF</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="cpf" id="cpf" placeholder="" minlength="11" maxlength="14" value="{{old('cpfcnpj')}}" >
							</div>
							@if ($errors->has('cpf'))
								<span class="help-block">
									<strong>{{ $errors->first('cpf') }}</strong>
								</span>
							@endif
						</div>

						<div id="nomecnpj" class="form-group has-feedback {{ $errors->has('cnpj') ? 'has-error' : '' }}" >
							<label for="cnpj" class="col-sm-2 control-label">CNPJ</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="" minlength="18" maxlength="18" value="{{old('cpfcnpj')}}" >
							</div>
							@if ($errors->has('cnpj'))
								<span class="help-block">
									<strong>{{ $errors->first('cnpj') }}</strong>
								</span>
							@endif
						</div>
                        
                        <div class="form-group has-feedback {{ $errors->has('nome') ? 'has-error' : '' }}">
							<label for="nome" class="col-sm-2 control-label">Nome completo</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nome" id="nome" placeholder="" minlength="7" maxlength="50" value="{{old('nome')}}" required>
							</div>
							@if ($errors->has('nome'))
								<span class="help-block">
									<strong>{{ $errors->first('nome') }}</strong>
								</span>
							@endif
						</div>
	
						<div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email" id="email" placeholder="" minlength="7" maxlength="50" value="{{old('email')}}">
							</div>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group has-feedback {{ $errors->has('telefone1') ? 'has-error' : '' }}">
							<label for="telefone1" class="col-sm-2 control-label">Telefone 1</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="" minlength="10" maxlength="15" value="{{old('telefone1')}}" required>
							</div>
							@if ($errors->has('telefone1'))
								<span class="help-block">
									<strong>{{ $errors->first('telefone1') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group has-feedback {{ $errors->has('telefone2') ? 'has-error' : '' }}">
							<label for="telefone2" class="col-sm-2 control-label">Telefone 2</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="" minlength="10" maxlength="15" value="{{old('telefone2')}}">
							</div>
							@if ($errors->has('telefone2'))
								<span class="help-block">
									<strong>{{ $errors->first('telefone2') }}</strong>
								</span>
							@endif
						</div>	
					
					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-primary pull-right">Salvar</button>					
					</div>

				</form>
			</div>
		</div>
	</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
	<script>
		function verifyTipoPessoa(){
			var tipo = document.querySelector('input[name="tipoPessoa"]:checked').value;
			if(tipo == 1){
				$("#nomecpf").css("display","block");
				$("#nomecnpj").css("display","none");
				$("#cnpj").val("");
				$("#cpf").prop("required", true);
				$("#cnpj").prop("required", false);
				$("#cpf").prop("disabled", false);
				$("#cnpj").prop("disabled", true);
			}else if(tipo == 2){
				$("#nomecpf").css("display","none");
				$("#nomecnpj").css("display","block");
				$("#cpf").val("");
				$("#cnpj").prop("required", true);
				$("#cpf").prop("required", false);
				$("#cpf").prop("disabled", true);
				$("#cnpj").prop("disabled", false);
			}
		}

		window.onload = function () {
			verifyTipoPessoa();
		}
	</script>
@stop

