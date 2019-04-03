@extends('layouts.companies')

@section('content')

@include('admin.includes.errors')

<div class="panel panel-default">
	<div class="panel-heading">
		Adicionar novo usuário
	</div>
	<div class="panel-body">
		<form action="{{ route('mission.company.update') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="bio">Sobre</label>
			@if($company->mission != null || $company->mission != '')
				<textarea class="form-control" rows="5" id="mission" name="mission" placeholder="Escreva aqui...">{{$company->mission}}</textarea>
			@else
			<textarea class="form-control" rows="5" id="mission" name="mission" placeholder="Escreva aqui..."></textarea>
			@endif
			<div class="text-center">
				<button class="btn btn-success" type="submit">Editar</button>
				<a class="btn btn-success" href="{{ route('users') }}">Voltar</a>
			</div>

		</form>
	</div>
</div>

@section('scripts')
<script>

	$('.state').hide();
	$('#country').change(function(){
		if($('#country').val() == 1){
			$('.state').show();
		} else{
			$('.state').hide();
		}
	});

</script>
@stop
@stop