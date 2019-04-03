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
                                Queremos saber o seu nível de produção de conteúdo para que possamos, dependendo da sua resposta, te auxiliar com dicas e sugestões valiosas! Também podemos te assessorar em cada etapa do seu curso e na forma como você quer publicá-lo, como, por exemplo: gravar as aulas em uma sala com todos os equipamentos necessários; editar os vídeos da gravação e, até mesmo, fazer o serviço de marketing do seu curso.
                            </h5>
                        </span>
                    </div>
                </div>
            </div>
            <div class="column col-12 resumee-inner">
                <div class="columns" style="margin-top: 50px;">
                    
                    <div class="column col-6">
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

                    <div class="column col-6 text-justify">
                        <span>
                            <div class="column col-xs-12 col-sm-12 col-12">
                                <img style="width: 100%" src="{{asset('/images/img/tela2.png')}}">
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

