@extends('layouts.app')

@section('content')
<style type="text/css">

.centered{
  text-align: center;
}

.padded{
  padding: 10px;
}

.bigger-text{
  font-size: 125%;
}

</style>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="centered bigger-text">
        <h1>Looneta</h1>
        <p>
          Bem-vindo ao Looneta <br/> Aqui você pode fazer reclamações e contribuir para um melhor desenvolvimento de sua cidade.
        </p>
      </div>
      <div class="jumbotron panel-default"> <!--ORIGINAL apenas panel e panel-default-->
        <!--<div class="panel-heading">Login</div>-->
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <!--<label class="col-md-4 control-label">E-Mail Address</label>-->

              <div class="col-md-6 col-md-offset-3"><!--ORIGINAL APENAS COM col-md-6-->
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email"><!--ORIGINAL sem placeholder-->

                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <!--<label class="col-md-4 control-label">Password</label>-->

              <div class="col-md-6 col-md-offset-3"> <!--ORIGINAL APENAS COM col-md-6-->
                <input type="password" class="form-control" name="password" placeholder="Senha"> <!--ORIGINAL SEM placeholder-->

                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group centered padded"> <!--ORIGINAL apenas form-group-->
              <div class="col-md-6 col-md-offset-3">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember"> Lembrar-me
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group padded">
              <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-success btn-group-justified padded"> <!--ORIGINAL: btn btn-primary-->
                  <i class="fa fa-btn fa-sign-in"></i>Login
                </button>
                <div style="padding-top:30px ">
                  <a class="btn btn-primary btn-group-justified" href="{{ url('/password/reset') }}">Esqueceu sua senha?</a> <!--VER SE btn-primary ou btn-link-->
                </div>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
