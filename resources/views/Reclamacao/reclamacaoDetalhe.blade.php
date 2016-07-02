@extends('layouts.app')

@section('content')
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

  .esquerda{
    text-align: left;
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
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron"> <!--<div class="panel panel-default">-->

                    <div class="row" >

                      <div class="col-md-12">
                        <h3 class="titulo">{{ $reclamacao->titulo }}</h3>
                      </div>

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
                      <textarea name="descricao" readonly="readonly" rows="10" cols="70">
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

                </div>

                <!--VOTAR-->

                <div class="col-md-10 col-md-offset-1">
                  <div class="jumbotron" style="padding-top:5px">
                    <div class="centered">
                      <h4>Vote nesta Reclamação: </h4>
                      <table class="col-md-2 col-md-offset-5">
                          <td>
                              <button type="button" class="btn btn-default votoPositivo">
                                  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                              </button>
                          </td>

                          <td>
                              <button type="button" class="btn btn-default votoNegativo">
                                  <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                              </button>
                          </td>
                      </table>
                    </div>
                  </div>
                </div>

                <!--COMENTARIOS-->

                <div class="col-md-10 col-md-offset-1">
                    <div class="jumbotron">
                        <h4>Comentários</h4>
                        <hr>

                        <div class="">
                                @foreach($reclamacao->comentarios as $comentario)

                                  <div class="col-md-12">
                                    <h6>{{ $comentario->usuario->name }}</h6>
                                  </div>

                                  <div class="col-md-12">
                                    <textarea name="name" readonly="readonly" rows="8" cols="110">{{ $comentario->comentario }}</textarea>
                                  </div>

                                  <div class="col-md-12">

                                    <!--<h6>{{ $comentario->usuario->votoReclamacao($reclamacao->id) }}</h6>-->
                                    <!--POSITIVO-->
                                    @if($comentario->usuario->votoReclamacao($reclamacao->id) == 1)
                                      <h6>Votou: &nbsp<span class="glyphicon glyphicon-thumbs-up thumbs-up-color" aria-hidden="true"></span></h6>


                                    <!--NEGATIVO-->
                                    @elseif ($comentario->usuario->votoReclamacao($reclamacao->id) == 0)
                                      <h6>Votou: &nbsp<span class="glyphicon glyphicon-thumbs-down thumbs-down-color" aria-hidden="true"></span></h6>


                                    <!--NÃO VOTOU-->
                                    @else
                                      <h6>&nbsp Não Votou</h6>
                                    @endif
                                  </div>

                                  <br>
                                  @if(Auth::user()->possuiFuncoes(['administrador', 'moderador']))

                                      <table> <!--DEIXAR ESSA TABELA-->
                                          <tr> <!--DELETAR COMENTARIO-->
                                              <form class="form-inline" method="POST" action="{{ route('modDeletarComentario') }}">
                                                  {!! csrf_field() !!}
                                                  <div class="form-group">
                                                      <input type="hidden" value="{{ $comentario->id }}" name="comentarioId">
                                                  </div>
                                                  <div class="form-group">
                                                      <input type="submit" class="btn btn-danger" value="Deletar Comentário">
                                                  </div>
                                              </form>
                                          </tr>

                                          <tr> <!--MUTAR / DESMUTAR-->
                                              @if(!$comentario->usuario->isMutado()) <!--Se NAO mutado-->
                                                  <form class="form-inline" method="POST" action="{{ route('modMutarUsuario') }}">
                                                      {!! csrf_field() !!}
                                                      <div class="form-group">
                                                          <input type="hidden" value="{{ $comentario->usuario->id }}" name="usuarioId">
                                                      </div>
                                                      <div class="form-group">
                                                          <input type="submit" class="btn btn-danger" value="Mutar Usuário">
                                                      </div>
                                                  </form>
                                              @else <!--Se MUTADO-->
                                                  <form class="form-inline" method="POST" action="{{ route('modDesmutarUsuario') }}">
                                                      {!! csrf_field() !!}
                                                      <div class="form-group">
                                                          <input type="hidden" value="{{ $comentario->usuario->id }}" name="usuarioId">
                                                      </div>
                                                      <div class="form-group">
                                                          <input type="submit" class="btn btn-primary" value="Desmutar Usuário">
                                                      </div>
                                                  </form>
                                              @endif
                                          </tr>
                                      </table>

                                  @endif

                                @endforeach

                                <hr class="ruler-color">

                        </div>

                    </div>
                </div>

                <!--COMENTAR-->

                <div class="col-md-10 col-md-offset-1">
                    <div class="jumbotron"> <!--<div class="panel panel-default">-->
                        <h4>Comentar</h4>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="comentar">
                                {!! csrf_field() !!}
                                <!-- Não há mais titulo no comentário
                                <div class="form-group">
                                    <label for="tituloReclamacao">Titulo</label>
                                    <input type="text" name="titulo" class="form-control" id="tituloReclamacao"
                                           placeholder="Titulo">
                                </div>
                              -->
                                <div class="form-group">
                                    <label for="comentario">Comentario:</label>
                                    <textarea class="form-control" name="comentario" rows="2" id="descricaoReclamacao"
                                              placeholder=""></textarea>
                                </div>
                                <div class="form-group">
                                    <input name="reclamacaoId" type="hidden" value="{{ $reclamacao->id }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Comentar!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        var token = '{{ Session::token() }}';
        var urlVoto = '{{ URL::route('voto') }}';
        var urlVotoNegativo = '{{ URL::route('votoNegativo') }}';
        var reclamacaoId = '{{ $reclamacao->id }}';
        var negativo = '{{ $reclamacao->votos()->where('user_id', Auth::getUser()->id)->where('positivo', 0)->first() ? 1 : 0}}'
        var positivo = '{{ $reclamacao->votos()->where('user_id', Auth::getUser()->id)->where('positivo', 1)->first() ? 1 : 0}}'

    </script>
@endsection
