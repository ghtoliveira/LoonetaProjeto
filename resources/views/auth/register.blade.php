@extends('layouts.app')

@section('content')

<style type="text/css">

.centered{
  text-align: center;
}

.padded{
  padding: 10px;
}

.padded-top{
  padding-top: 20px;
}

.bigger-text{
  font-size: 125%;
}

</style>

<div class="container" >
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron"> <!--ORIGINAL panel panel-default-->
                <h3 class="centered">Cadastro</h3>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <!--<label class="col-md-4 control-label">Name</label>-->

                            <div class="col-md-6 col-md-offset-3 padded-top"> <!--ORIGINAL col-md-6-->
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nome" alt="Nome">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!--<label class="col-md-4 control-label">E-Mail Address</label>-->

                            <div class="col-md-6 col-md-offset-3">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!--<label class="col-md-4 control-label">Password</label>-->

                            <div class="col-md-6 col-md-offset-3">
                                <input type="password" class="form-control" name="password" placeholder="Senha">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" >
                            <!--<label class="col-md-4 control-label">Confirm Password</label>-->

                            <div class="col-md-6 col-md-offset-3">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme Senha">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                            <!--<label class="col-md-4 control-label">Endereço</label>-->

                            <div class="col-md-6 col-md-offset-3">
                                <input type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" placeholder="Endereço">

                                @if ($errors->has('endereco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                            <!--<label class="col-md-4 control-label">Cep</label>-->

                            <div class="col-md-6 col-md-offset-3">
                                <input type="text" class="form-control" name="cep" value="{{ old('cep') }}" placeholder="CEP">

                                @if ($errors->has('cep'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group padded">
                            <div class="col-md-6 col-md-offset-3" style="padding-top:30px;">
                                <button type="submit" class="btn btn-success btn-group-justified padded" > <!--ORIGINAL btn btn-primary-->
                                    <i class="fa fa-btn fa-user"></i>Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
