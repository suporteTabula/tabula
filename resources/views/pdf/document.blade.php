<!DOCTYPE html>
<html>
<head>
	<title>Certificado</title>

	<link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,600,700" rel="stylesheet">

<style type="text/css">
	.certificate{
		background: url('{{asset('images/img/certificado.jpg')}}');
		background-size: 100% 100%;
		height: 100%;
		padding: 20px 50px;
		font-family: 'Crimson Text', serif;
	}

	.content{
		width: 650px;
	}

	h1#universidade{
		margin-top: 20px;
		color: #d6eaf9;
		font-size: 40px;
	}

	p#data{
		font-weight: 400;
		font-size: 20px;
	}

	h2.course-name{
		font-size: 25px;
	}

	p.completo{
		font-weight: 400;
		font-size: 21px;
	}

	.hr{
		margin-top: 200px;
		border-top: 1px solid #ccc;
		width: 210px;
	}

	p#teacher{
		font-size: 13px;
		font-weight: 600;
	}
</style>

</head>
<body>
	<div class="certificate">
		<div class="content">
			@if($teacher->empresa_id != NULL)
			<h1 id="universidade"> {{$empresa->name}} </h1>
			@endif
			<p id="data">{{$date}}</p>
			<h2 class="course-name">{{$aluno->name}}</h2>
			<p class="completo">Completou o curso online de </p>
			<h2 class="course-name">{{$course->name}}</h2>
			<p class="completo">por 5 semanas, autorizado pelo professor {{$teacher->name}} @if($teacher->empresa_id != NULL), da {{$empresa->name}} @endif e oferecido pelo Tabula. </p>

			<div class="hr"></div>
			<p id="teacher">{{$teacher->name}}</p>
		</div>
	</div>
</body>
</html>