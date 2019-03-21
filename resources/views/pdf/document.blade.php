<h1>Univerisade</h1>
<h3>{{$date}}</h3>
<h2>{{$aluno->name}}</h2>
<h3>Completou o curso online de </h3>
<h2>{{$course->name}}</h2>
<h3>por 5 semanas, autorizado pelo professor {{$teacher->name}} @if($teacher->empresa_id != NULL), da {{$empresa->name}} @endif e oferecido pelo Tabula.</h3>

<hr>
<h6>{{$teacher->name}}</h6>