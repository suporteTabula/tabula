@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<section class="hero-landing">
    <div class="container grid-md">
        <div class="columns">
            <div class="column col-12 col-xs-12 col-sm-12 hero-text">
                <div class="box-body">
                    <h1 class="text-center">Registre-se</h1>

                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nome Empresa</label>     
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif                                                            
                            </div>

                            <input type="hidden" name="userType" id="userType" value="5">
                            <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                                <label for="login" class="col-md-4 control-label">Login</label>
                                <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus>

                                @if ($errors->has('login'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                <label for="country" class="col-md-4 control-label">País</label>
                                    <select id="country" name="country_id" class="form-control">
                                        <option value="" selected disabled hidden>Escolha um...</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"> {{ $country->name }} </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="state">
                                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <label for="state" class="col-md-4 control-label">Estado</label>
                                    <select id="state" name="state_id" class="form-control">
                                        <option value="" selected disabled hidden>Escolha um...</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"> {{ $state->name }} </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Senha</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="form-group{{ $errors->has('schooling') ? ' has-error' : '' }}">
                                    <label for="country" class="col-md-4 control-label">Escolaridade</label>
                                    <select id="schooling" name="schooling_id" class="form-control">
                                        <option value="" selected disabled hidden>Escolha um...</option>
                                        @foreach ($schoolings as $schooling)
                                            <option value="{{ $schooling->id }}"> {{ $schooling->desc }} </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('schooling'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('schooling') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            <div class="form-group">
                                <button type="submit" class="button-tabula-gray">
                                    Registre-se
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    @section('scripts')
        <script>

            $('.state').hide();
            $('#country').change(function(){
                if($('#country').val() == 1){
                    $('.state').show();
                } else{
                    $('.state').hide();
                }
            });

        </script>
    @stop
@endsection
