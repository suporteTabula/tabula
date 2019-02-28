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
 <title>Tabula - Ensino a distância - Cursos EAD</title>

 <section class="teachers">
    <div class="container grid-md"> 
        <div class="teachers-wrapper">
            @foreach($myTpes as $myTpe)
            @foreach($userTeachers as $userTeacher)
            @if($myTpe->user_type_id == 3 && $myTpe->user_id == $userTeacher->id)


            <div class="teacher-photo-wrapper"> 
                <a href="#"> 
                    <div class="teacher-photo" style="background-image: url({{asset('/images/Profilepic')}}/{{ $userTeacher->avatar }});"></div>
                    <div class="teacher-description">
                        <p>{{$userTeacher->name}} </p>
                    </div>
                </a>
            </div>
            @endif 
            @endforeach
            @endforeach

        </div>
    </div>
</section>




@stop
