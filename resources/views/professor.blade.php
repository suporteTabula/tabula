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



    <title>Perfil Professor</title>
    
    
    
    <section class="resumee">

     
        <div class="container grid-lg">
            <div class="columns">
                <div class="column col-1"></div>
                <div class="column col-10 resumee-inner">
                    <div class="columns">
                          <center><h2><u><a href="/todosProfs"> PERFIL DO PROFESSOR</u></a></h2>

                                <div class="column col-12">
                                <div class="teacher-photo" style="background-image: url(../images/uiface1.jpg);"></div>
                                <span><b>Professor {{$user["first_name"]}} {{$user["last_name"]}}</b>
                                    <center><div class="column col-xs-12 col-sm-12 col-6">
                                        
                                        <label for="first_name">
                                           
                                            {{$user["first_name"]}}<br>

                                            {{$user["last_name"]}}<br>
                                            email: {{$user["email"]}}<br>
                                            sexo: {{$user["sex"]}}<br>
                                            Ocupação: {{$user["occupation"]}}<br>
                                            Aniversário:{{$user["birthdate"]}}<br>
                                           
                                        
                                        </center>

                                        </label>
                                        
                                    </div>
                                   

                                
                                </span></center>
                        </div>
                    </div>
                </div>
            
            </div>

            
                <div class="column col-1"></div>
           
           
               
        </section>            
@stop

