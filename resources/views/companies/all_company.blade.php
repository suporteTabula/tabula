 @extends('layouts.user')



 @section('content')

 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
 <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" />
 <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
 <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
 <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="css/home-empresa.css">
 <title>Empresas aprimoram suas equipes com o Tabula</title>

<section class="teachers">
    <div class="container grid-md"> 
        <div class="teachers-wrapper">
            @foreach($companies as $company)

            <div class="teacher-photo-wrapper"> 
                <a href="{{ route('empresa.company', ['id' => $company->user->id]) }}"> 
                    <div class="teacher-photo" style="background-image: url({{asset('/images/Profilepic')}}/{{ $company->user->avatar}});">

                    </div>
                    <div class="teacher-description">
                    <h4>{{$company->user->name }} </h4>
                    </div>
                    <div>
                        <p>Cursos Publicados</p>
                    </div>
                    </a>
            </div>
            @endforeach

        </div>
    </div>
</section>




@stop
