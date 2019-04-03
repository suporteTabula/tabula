@extends('layouts.companies')

@section('content')

@include('admin.includes.errors')

<div class="panel panel-default">
	<div class="panel-heading">
		Adicionar novo usuário
	</div>
	<div class="panel-body">
		<form action="{{ route('cupom.store.teacher') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="tipoCupom">Tipo Cupom</label>
					<select class="form-control" id="tipoCupom" name="tipoCupom">
						<option value="produto">Desconto fixo de produto</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="limiteCupom">Código Cupom</label>
					<input class="form-control" type="text" name="codCupom" placeholder="Código Cupom" value="{{ old('codCupom') }}">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="descCupom">Descrição Cupom</label>
					<input class="form-control" name="descCupom" type="text" placeholder="Descrição Cupom" value="{{ old('descCupom') }}">
				</div>
			</div>			

			<div class="form-group row">
				<div class="col-xs-4">
					<label for="price">Valor Cupom</label>
					<input class="form-control input-price" type="text" name="valorCupom" placeholder="Valor Cupom" value="{{ old('valorCupom') }}">
				</div>
				<div class="col-xs-8 course">
					<label for="type_id">Curso</label>
					<select class="form-control multiple" style='width: 400px;' name="type_id[]"  multiple="multiple">
						<option value='0'>- Digite o Curso -</option>
					</select>
				</div>
			</div>

			<div class="text-center">
				<button class="btn btn-success" type="submit">Adicionar</button>
				<a class="btn btn-success" href="{{ route('cupom.teacher') }}">Voltar</a>
			</div>

		</form>
	</div>
</div>
@section('scripts')
<script>

	$(document).ready(function() {
	    $(".multiple").select2({
            ajax: { 
             url: "{{route('cupom.search.teacher')}}",
             type: "post",
             dataType: 'json',
             delay: 250,
             
             data: function (params) {
              return {
                searchTerm: params.term,
                type: 'produto',
              };
             },
             processResults: function (response) {
             	console.log(response);
               return {
                  results: response
               };
             },
             cache: true
            },
            minimumInputLength: 3
        });  

	});

</script>
@stop
@stop