@extends('layouts.app')

@section('content')
<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">-->
<link href="public\components\bootstrap.min.css" rel="stylesheet">
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

textarea{
  max-width: 100%;
}

.titulo{
  font-size: 300%;

  color: inherit;
}

.porra{
  content:"\e250";
}

</style>

<div class="container">
    <div class=""> <!--ORIGINAL class="row-->"
        <div class="col-md-10 col-md-offset-1">
            <div class="jumbotron panel-default">
                <!--<h3 class="centered">Reclamacoes</h3>-->

                @foreach($reclamacoes as $reclamacao)
                <div class="row">

                  <div>

                    <a class="titulo" href="{{ url('/reclamacao', $reclamacao->id) }}"><i class="fa fa-circle"></i> {{ $reclamacao->titulo}} </a>

                  </div>

                  <h6 class="col-md-10"><span class="glyphicon glyphicon-heart"></span> Endereço: </h6>


                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
