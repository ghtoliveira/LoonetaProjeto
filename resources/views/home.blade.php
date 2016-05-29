@extends('layouts.app')

@section('content')

<style type="text/css">
  .centered{
    text-align: center;
  }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="jumbotron centered">
                <h3>Sucesso!</h3> <!--ISSO TALVEZ NAO FAÇA DIFERENÇA MAS TALVEZ TROCAR DEPOIS-->

                <div class="panel-body">
                  <h5>Você está logado!<br/>Agora voce pode acessar reclamações de outras pessoas e criar suas próprias.</h5>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
