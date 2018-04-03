@extends('layouts.user')

@section('content')
    <section class="course-page-wrapper">
        <div class="course-header"> <img src="{{ asset('images/hex/icon/'.$course->category->hex_icon) }}" width="45px;">
            <div class="macro-title">
                <p>{{$course->category->desc}}</p>
                <h2>{{$course->name}}</h2> </div>
        </div>
        <div class="course-content">
            <div class="left-cards">
                <div class="will-learn">
                    <p><b>O que você irá aprender</b></p>
                    <p style="padding: 15px; margin: 0;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium aliquam esse quam a neque, sint quibusdam nihil vitae architecto dignissimos obcaecati sed suscipit recusandae. Reiciendis ducimus minus ad maxime incidunt corporis obcaecati eligendi laboriosam, commodi facere! Perspiciatis non impedit debitis dolore et, magni, vero ipsam fuga laudantium, dignissimos fugit nisi! Minus voluptatem rerum a voluptates, eaque eos est fugiat, odio. Molestiae voluptatem temporibus maxime molestias minus facere quis unde inventore excepturi dolorem repellendus vero illo reprehenderit hic possimus, recusandae! Id minima suscipit repellat cumque corporis quidem, sed fugit quia nam quisquam ab, magni sit provident laborum vero ut in enim.</p>
                </div>
                <div class="requirements">
                    <p><b>Requisitos</b></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum placeat ducimus, repellat unde, ex saepe expedita illo recusandae laudantium veniam.</p>
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, accusamus!</li>
                    </ul>
                </div>
                <div class="description">
                    <p><b>Descrição</b></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate nam amet repellat, quisquam. Deserunt, ipsam quas optio. Quia officiis quam ex pariatur. Eligendi id voluptates ipsum assumenda odio porro dolore atque praesentium iste fugiat delectus unde, repudiandae est qui dolores, cupiditate aliquam quas animi reiciendis, pariatur tempora. Excepturi, architecto ex.</p>
                </div>
                <div class="course-program">
                    <p style="margin-left: 15px;"><b>Programa do Curso</b></p>
                    <div id="accordion">
                        @foreach ($chapters as $chapter)
                           <h3>{{$chapter->name}}</h3>
                           <div>
                                {{$chapter->desc}}
                           </div>
                        @endforeach                                               
                    </div>
                </div>
            </div>
            <div class="right-cards">
                <div class="card-right-wrapper">
                    <div class="video-preview"> <img src="http://via.placeholder.com/350x250"> </div>
                    <div class="buyit">
                        <h2 style="text-align: center;"><b>R$ 112</b></h2>
                        <div class="buttons-to-buy">               
                            @auth
                                <a class="tabula-button" href="{{ route('course.start', ['id' => $course->id]) }}">Iniciar Curso</a>
                            @endauth

                            @guest
                                <a class="tabula-button" href="{{ route('cart.insert', ['id' => $course->id]) }}">Comprar</a>
                                <a class="tabula-button-inverted" href="{{ route('cart.insert', ['id' => $course->id]) }}">Adicionar ao carrinho</a>
                            @endguest
                        </div>
                        <div class="include">
                            <p><b>O que está incluso?</b></p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur.</li>
                                <li>Lorem ipsum dolor.</li>
                                <li>Lorem ipsum dolor sit.</li>
                            </ul>
                        </div>
                        <div class="cupom">
                            <p><b>Você tem um cupom?</b></p>
                            <div class="form-group">
                                <input type="text" class="tabula-input-inverted" placeholder="Digite aqui!">
                                <input type="button" class="tabula-button" value="Enviar"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection