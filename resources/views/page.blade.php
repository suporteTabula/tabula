@extends('layouts.user')
@section('content')

    <section class="advantages">
        <div class="container grid-md">
            <div class="columns">
                
                <div class="column col-12 col-xs-12 col-sm-12 ">
                    <div class="columns spacer card-advantage2">
                        <div class="column col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 hex-adv">
                            <h1>{{$page->type_page}}</h1>
                        </div>
                        <div class="column col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p class="text-justify">{{$page->desc}}</p>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </section>

   
@endsection

