
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="EaR4uKi4M4ZcvLzU87VbZDj5po9w5Uy8S4PDhQqi">

    <title>Laravel</title>

    <!-- Styles -->
    
    <link href="http://localhost:8000/css/app.css" rel="stylesheet">
    <link href="http://localhost:8000/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="http://localhost:8000">
                        Tabula
                    </a>
                    <div class="navbar-brand">
                        >>
                    </div>
                    <div class="navbar-brand">
                        Administração
                    </div>
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                                                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Admin <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="http://localhost:8000/logout"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="http://localhost:8000/logout" method="POST" style="display: none;">
                                            <input type="hidden" name="_token" value="EaR4uKi4M4ZcvLzU87VbZDj5po9w5Uy8S4PDhQqi">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                                            </ul>
                </div>
            </div>
        </nav>

         <div class="container">
            <div class="row">
                                    <div class="col-lg-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="http://localhost:8000/admin/home">Principal</a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://localhost:8000/admin/users">Todos Usuários</a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://localhost:8000/admin/usersType">Tipos de Usuário</a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://localhost:8000/admin/courses">Cursos</a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://localhost:8000/admin/categories">Categorias/Macrotemas</a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://localhost:8000/admin/companies">Empresas</a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://localhost:8000/admin/userGroups">Grupos de Usuários</a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://localhost:8000/admin/userGroups">Reports</a>
                            </li>
                        </ul>
                    </div>
                                <div class="col-lg-9">
                    	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Reports</p>
			
			<a href="http://localhost:8000/admin/courses/create">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="http://localhost:8000/images\add.svg">
			</a>

			<input class="form-control" type="text" id="search" onkeyup="Search()" placeholder="Digite um nome de usuário..." style="width: 300px;">

			<select id="categories" onchange="Filter()">
				<option value="all">Todos</option>
									<option value="Finanças e Economia">Finanças e Economia</option>
									<option value="Varejo e Consumo">Varejo e Consumo</option>
									<option value="Negócio e Gestão">Negócio e Gestão</option>
									<option value="Direito">Direito</option>
									<option value="Controladoria e Contabilidade">Controladoria e Contabilidade</option>
									<option value="T.I. e Softwares">T.I. e Softwares</option>
									<option value="Marketing">Marketing</option>
									<option value="Engenharia">Engenharia</option>
									<option value="Concursos e Certificação">Concursos e Certificação</option>
									<option value="Arquitetura e Design">Arquitetura e Design</option>
									<option value="Saúde">Saúde</option>
									<option value="História e Arte">História e Arte</option>
									<option value="Ensino Médio e Fundamental">Ensino Médio e Fundamental</option>
									<option value="Vídeo e Fotografia">Vídeo e Fotografia</option>
									<option value="Gastronomia">Gastronomia</option>
									<option value="Hobbies">Hobbies</option>
							</select>

		</div>
		<div class="panel-body">
			<table id="coursesTable" class="table table-hover">
				<thead>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Categoria</th>
					<th>Autor</th>
					<th>Cursos</th>
						</thead>
				<tbody>
							<tr>
								<td style="vertical-align: middle !important;">
									A
								</td>							
								<td style="vertical-align: middle !important;">
									TESTE
								</td>
								<td style="vertical-align: middle !important;">
									Finanças e Economia
								</td>
								<td style="vertical-align: middle !important;">
									Tabula
								</td>
								<td style="vertical-align: middle !important;">
								    Não tem</td>
								
							</tr>
							<tr>
								<td style="vertical-align: middle !important;">
									Curso Teste
								</td>							
								<td style="vertical-align: middle !important;">
									Curso curso curso
								</td>
								<td style="vertical-align: middle !important;">
									Negócio e Gestão
								</td>
								<td style="vertical-align: middle !important;">
									Tabula
								</td>
								<td style="vertical-align: middle !important;">
																			Não tem
								</td>
								
							</tr>
													<tr>
								<td style="vertical-align: middle !important;">
									Engenharia de Software
								</td>							
								<td style="vertical-align: middle !important;">
									aaaaa
								</td>
								<td style="vertical-align: middle !important;">
									T.I. e Softwares
								</td>
								<td style="vertical-align: middle !important;">
									Tabula
								</td>
								<td style="vertical-align: middle !important;">
																			Não tem
																	</td>
								
							</tr>
							<tr>
								<td style="vertical-align: middle !important;">
									Teste1
								</td>							
								<td style="vertical-align: middle !important;">
									askdlaskdlaskdlasdklak
								</td>
								<td style="vertical-align: middle !important;">
									Varejo e Consumo
								</td>
								<td style="vertical-align: middle !important;">
									Tabula
								</td>
								<td style="vertical-align: middle !important;">
																			Não tem
								</td>
								
							</tr>
															</tbody>
			</table>
							<form action="http://localhost:8000/admin/courses/destroy/4" method="GET" class="remove-record-model">
					<input type="hidden" name="_token" value="EaR4uKi4M4ZcvLzU87VbZDj5po9w5Uy8S4PDhQqi">
				    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
				        <div class="modal-dialog" style="width:55%;">
				            <div class="modal-content">
				                <div class="modal-header">
				                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				                    <h4 class="modal-title" id="custom-width-modalLabel">Excluir Curso?</h4>
				                </div>
				                <div class="modal-body">
				                    <h4>Você tem certeza que deseja excluir o curso <b>INTEIRO</b> e <b>TODOS</b> seus itens?</h4>
				                </div>
				                <div class="modal-footer">
				                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Fechar</button>
				                    <button type="submit" class="btn btn-danger waves-effect waves-light">Excluir</button>
				                </div>
				            </div>
				        </div>
				    </div>
				</form>
					
		</div>
	</div>
	                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="http://localhost:8000/js/app.js"></script>
    <script src="http://localhost:8000/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        
        
            </script>

    		<script>
			$(document).ready(function(){
			// For A Delete Record Popup
				$('.remove-record').click(function() {
					var id = $(this).attr('data-id');
					var d = $(this).attr('data-url');
					
					$(".remove-record-model").attr('action',d);
					
					$('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
					$('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
				});

				$('.remove-data-from-delete-form').click(function() {
					$('body').find('.remove-record-model').find( "input" ).remove();
				});		
				$('.modal').click(function() {
					// $('body').find('.remove-record-model').find( "input" ).remove();
				});		
			});
		</script>

		<script>
			function Search() {
				var input, filter, table, tr, td, i;
				input = document.getElementById("search");
				filter = input.value.toUpperCase();
				table = document.getElementById("coursesTable");
				tr = table.getElementsByTagName("tr");
				for (i = 0; i < tr.length; i++) {
					td = tr[i].getElementsByTagName("td")[3];
					if (td) {
						if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
							tr[i].style.display = "";
						} else {
							tr[i].style.display = "none";
						}
					}        
				}
			}

			function Filter() {
				var select, option, table, tr, td, i;
				select = document.getElementById("categories");
				option = select.options[select.selectedIndex].value;
				table = document.getElementById("coursesTable");
			  	tr = table.getElementsByTagName("tr");
			  	if(option == 'all'){
			  		for (i = 0; i < tr.length; i++) {
			  			tr[i].style.display = "";
        
			  		}
			  	}
			  	else{
			  		for (i = 0; i < tr.length; i++) {
				  		td = tr[i].getElementsByTagName("td")[2];
				  		if (td) {
				  			if (td.innerHTML.indexOf(option) > -1) {
				  				tr[i].style.display = "";
				  			} else {
				  				tr[i].style.display = "none";
				  			}
				  		}        
			  		}	
			  	}
			  	
			}
		</script>
	</body>
</html>
