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

.glyph-menor{
  font-size: 60%;
}

.ruler-color{
  border-color: lightgray;
}

.thumbs-up-color{
  color: rgb(1,200,90);
}

.thumbs-down-color{
  color: red;
}

textarea{
  resize: none;
}

img{
  max-width: 300px;
  max-height: 200px;
}

</style>

<div class="container">
    <div class="row"> <!--ORIGINAL class="row-->
        <div class="col-md-12">
            <div class="jumbotron">
                <!--<h3 class="centered">Reclamacoes</h3>-->

                @foreach($reclamacoes as $reclamacao)
                <div class="row">

                  <!--TITULO-->
                  <div>
                    <a class="titulo" href="{{ url('/reclamacao', $reclamacao->id) }}"><span class="glyphicon glyphicon-play glyph-menor"></span> {{ $reclamacao->titulo}} </a>
                  </div>

                  <div class=""> <!--SE POR "row" AQUI DA UM ESPAÇO ABAIXO-->
                    <!--ENDEREÇO-->
                    <div class="col-md-6">
                      <h6 >Endereço: Rua Tenente Coronel Senador Capitão 1234 </h6>
                    </div>

                    <div class="col-md-4">
                      <h6>Tags: Pavimentação, Iluminação, Abandono, Teste</h6>
                    </div>

                    <!--RATING-->
                    <div class="col-md-2">
                      <h6>999 <span class="glyphicon glyphicon-thumbs-up thumbs-up-color"></span> &nbsp 333 <span class="glyphicon glyphicon-thumbs-down thumbs-down-color"></span> </h6>
                    </div>
                  </div>


                  <div class="">
                    <!--CIDADE-->
                    <div class="col-md-6">
                      <h6>Cidade: Santa Cruz do Sul</h6>
                    </div>

                    <div class="col-md-6">
                      <!--BAIRRO-->
                      <h6>Bairro: Arroio Grande</h6>
                    </div>
                  </div>


                  <br><br>

                  <!--DESCRIÇÃO-->
                  <div class="form-group col-md-6">
                    <textarea name="descricao" readonly="readonly" rows="3" cols="70">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </textarea>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <img class="img-responsive img-rounded" src="https://static-secure.guim.co.uk/sys-images/Guardian/Pix/pictures/2012/7/12/1342109726142/hole-in-road-didsbury-man-008.jpg" alt="" />
                    </div>

                  </div>

                  <div class="">
                    <div class="col-md-6">
                      <!--DATA-->
                      <h6>Adicionado em: 28/06/2016</h6>
                    </div>
                  </div>

                  <div class="">
                    <div class="col-md-6">
                      <!--USUARIO-->
                      <h6>Adicionado por: Fulano Siclano de Tal</h6>
                    </div>
                  </div>

                  <br><br><br><hr class="ruler-color">

                </div>


                @endforeach

                <script type="text/javascript">

                for(var i = 0; i < document.getElementsByName('descricao').length; i++){
                  var comprimentoTexto = 180;
                  var velhoTexto = document.getElementsByName('descricao')[i].innerHTML;
                  var novoTexto = velhoTexto.substring(0, comprimentoTexto);

                  document.getElementsByName('descricao')[i].innerHTML = novoTexto + '...';
                }

                </script>
            </div>
        </div>
    </div>
</div>




@endsection
