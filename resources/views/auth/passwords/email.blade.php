@extends('layouts.app')

<!-- Main Content -->
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

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="jumbotron">
        <!--<div class="panel-heading">Reset Password</div>-->
        <h3 class="centered">Redefinir Senha</h3>
        <div class="panel-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif

          <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} padded-top"> <!--ORIGINAL SEM padded-top-->
              <!--<label class="col-md-4 control-label">Endereço de E-Mail</label>-->

              <div class="col-md-6 col-md-offset-3">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Endereço de Email">

                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-3 padded-top">
                <button type="submit" class="btn btn-success btn-group-justified padded">
                  <i class="fa fa-btn fa-envelope"></i>Enviar Link
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
