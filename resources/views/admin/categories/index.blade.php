@extends('layouts.app') 
 
@section('content') 
	<div class="panel panel-default"> 
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos Macrotemas</p> 
			<a href="{{ route('category.create') }}"> 
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}"> 
			</a> 

      		<select id="category">
      			<option value="">Filtrar por: </option>
				@foreach ($categories as $cat)
					@if ($cat->category_id_parent == NULL)
						<option value="{{ $cat->desc }}">{{ $cat->desc }}</option>
					@endif
				@endforeach
			</select>
		</div> 
		<div class="panel-body"> 
			<table id="categories" class="table table-hover"> 
				<thead> 
					<th>Nome Macrotema</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead> 
				<tbody>
					@if ($categories->count() > 0)
						@foreach ($categories as $category) 
							<tr>
								<td style="vertical-align: middle !important;">{{ $category->desc }}</td> 
								<td>
									<a href="{{ route('category.edit', ['id' => $category->id]) }} ">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
								</td> 
								<td> 
									<a href="{{ route('category.delete', ['id' => $category->id]) }} "> 
										<img style=" width:35px; " src="{{ asset('images\error.svg') }}"> 
									</a>                   
								</td> 
							</tr> 
						@endforeach 
					@else             
						<tr> 
							<td colspan="4" class="text-center">Sem Macrotemas</td> 
						</tr> 
					@endif 
				</tbody> 
			</table> 
		</div> 
	</div> 
	@section('scripts')
		<script>
				 $('#category').on('change',function(){


			        $.get("{{ url('/category/subcategories') }}", 
			        { option: $(this).val() }, 
			        function(data) {

			            var model = $('#categories');
			            alert(model);
			            model.empty();
			            $.each(data, function(index, element) {

			                model.append("<tr><td>" +element.desc+ "</td></tr>");

			            });
			        });
			    });
		</script>
	@stop
@stop