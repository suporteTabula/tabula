@extends('layouts.user')



@section('content')
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/home-empresa.css">



<section class="resumee">
    <div class="container grid-lg">
        <div class="columns">
            <div class="column col-1"></div>
            <div class="column col-12 resumee-inner">
                <div class="columns" style="margin-top: 50px;">
                    
                    
                    <div class="column col-12 text-justify">
                        <span>
                            <h5>
                                Esta pergunta facilita o processo de criação de cupons para o seu curso e o ajuda a distribuí-los ao público ideal.
                            </h5>
                        </span>
                    </div>
                </div>
            </div>
            <div class="column col-12 resumee-inner">
                <div class="columns" style="margin-top: 50px;">
                    <div class="column col-6">
                        <span><b>Já Produziu um Conteúdo online?</b>
                            <div class="column col-xs-12 col-sm-12 col-12">
                                <form action="{{route('store.answer')}}" method="POST">
                                    {{ csrf_field() }} 
                                    <div class="form-group">
                                        <input type="hidden" name="row" value="answer_third">
                                        <label class="form-radio form-inline">
                                        <input type="radio" name="answer" value="0">
                                        <i class="form-icon"></i>
                                        No momento não.
                                        </label>
                                        <label class="form-radio form-inline">
                                        <input type="radio" value="1" name="answer"><i class="form-icon"></i>Possuo uma pequena Base de seguidores.
                                        </label>
                                        <label class="form-radio form-inline">
                                        <input type="radio" value="2" name="answer"><i class="form-icon"></i>Uma quantidade considerável de seguidores.
                                        </label>
                                    </div>
                                    <a class="btn btn-success" href="{{ route('destroy.answer', ['id' => 'answer_second']) }}">Anterior</a>
                                    <button class="btn btn-success" type="submit">Próximo</button>
                                </form>
                            </div>
                        </span>
                    </div>

                    <div class="column col-6 text-justify">
                        <span>
                            <div class="column col-xs-12 col-sm-12 col-12">
                                <img style="width: 100%" src="{{asset('/images/img/tela3.png')}}">
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

