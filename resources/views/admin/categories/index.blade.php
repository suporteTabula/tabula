@extends('layouts.admin') 
 
@section('content') 
	<div class="panel panel-default"> 
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos Macrotemas e Subtemas</p> 
			<a href="{{ route('category.create') }}"> 
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}"> 
			</a> 

			<label>Filtrar por Macrotemas:</label>
      		<select class="category_select" id="category">
      			<option value="0">Todos os itens</option>
				@foreach ($categories as $cat)
					@if ($cat->category_id_parent == NULL)
						<option value="{{ $cat->id }}">{{ $cat->desc }}</option>
					@else
						<option value="{{ $cat->id }}">{{ $cat->desc }}</option>
					@endif
				@endforeach
			</select> 
		</div> 
		<div class="panel-body"> 
			<table id="categories" class="table table-hover"> 
				<thead> 
					<th>Nome</th>
					<th>Desktop</th>
					<th>Mobile</th>
					<th>Macrotema</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead> 
				<tbody class="panel-filter">
					@if ($categories->count() > 0)
						@foreach ($categories as $category)
						@if($category->category_id_parent == NULL)  
							<tr>
								<td style="vertical-align: middle !important;">{{ $category->desc }}</td> 
								<td align="center">
									{{ $category->desktop_index }}
								</td>
								<td align="center">
									{{ $category->mobile_index }}
								</td>
								<td align="center">
									@if($category->category_id_parent == NULL)
										Sim
									@else
										Não
									@endif
								</td>
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
							@endif
						@endforeach 
					@else             
						<tr> 
							<td colspan="4" class="text-center">Sem Macrotemas</td> 
						</tr> 
					@endif 
				</tbody> 
			</table>

			<table id="subCategories" class="table table-hover"> 
				<thead> 
					<th>Nome</th>
					<th>Macrotema</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead> 
				<tbody class="panel-filter">
					@if ($categories->count() > 0)
						@foreach ($categories as $category)
							@if($category->category_id_parent != NULL) 
							<tr>
								<td style="vertical-align: middle !important;">{{ $category->desc }}</td> 
								<td align="center">
									@if($category->category_id_parent == NULL)
										Sim
									@else
										Não
									@endif
								</td>
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
							@endif 
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

            $(document).ready(function(){

            	var output;

            	$('#filter_btn').click(function(){ 
            		setValues();
                	filterCategories();
            	});

                $('.category_select').change(function(){
                	setValues();
                	filterCategories();
                });

                function setValues()
                {
                	var typed_category = $('#category_string').val();
            		var selected_category = $('.category_select').val();

                	output = {selected_category_output:selected_category,typed_category_output:typed_category};
                }

                function filterCategories()
                {console.log(output);
                    $.ajax({
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '{{ route('category.filter')}}',
                        data: output,
                        error: function(e){
                            console.log(e);
                        },
                        success: function(response){
                            $('.panel-filter').html(response);
                        }
                    });
                }
            });
        </script>
	@stop
@stop