@extends('layouts.user')



@section('content')
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/home-empresa.css">



<section class="resumee">
    <div class="container grid-lg">
        <div class="columns">
            <div class="column col-1"></div>
            <div class="column col-10 resumee-inner">
                <div class="columns">
                    <h2><a href="/todosProfs"> PERFIL DO PROFESSOR</a></h2>
                    <div class="column col-12">
                        <span><b>Já Produziu um Conteúdo online?</b>
                            <div class="column col-xs-12 col-sm-12 col-6">
                                <form action="{{route('store.answer')}}" method="POST">
                                    {{ csrf_field() }} 
                                    <div class="form-group">
                                        <input type="hidden" name="row" value="answer_second">
                                        <label class="form-radio form-inline">
                                        <input type="radio" name="answer" value="0" ><i class="form-icon"></i>
                                        Sou iniciante.
                                        </label>
                                        <label class="form-radio form-inline">
                                        <input type="radio" value="1" name="answer"><i class="form-icon"></i>Tenho certa experiencia no tema.
                                        </label>
                                        <label class="form-radio form-inline">
                                        <input type="radio" value="2" name="answer"><i class="form-icon"></i>Tenho conteúdo Pronto.
                                        </label>
                                    </div>
                                        <a class="btn btn-success" href="{{ route('destroy.answer', ['id' => 'answer_first']) }}">Anterior</a>
                                    <button class="btn btn-success" type="submit">Próximo</button>
                                </form>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="column col-1"></div>               
</section>            
@stop

