@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="jumbotron"> <!--<div class="panel panel-default">-->
                    <div class="panel-heading">{{ $reclamacao->titulo }}</div>

                    <div class="">

                        <table class="table table-striped">
                            <tr>
                                <th>Usuario</th>
                                <th>Titulo</th>
                                <th>Descricao</th>
                                <th>Votar</th>
                                <th>Votos Positivos</th>
                                <th>Votos Negativos</th>
                                <th>Status</th>
                                <th>Tags</th>
                                <th>Denunciar</th>
                                @if(Auth::user()->possuiFuncoes(['administrador', 'moderador']))
                                    <th>Ações administrativas</th>
                                @endif
                            </tr>

                            <tr>
                                <td>{{ $reclamacao->usuario->name }}</td>
                                <td>{{ $reclamacao->titulo }}</td>
                                <td>{{ $reclamacao->descricao }}</td>
                                <td>
                                    <table>
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

                                </td>
                                <td>
                                    {{ $reclamacao->votos()->where('positivo', 1)->count() }}
                                </td>
                                <td>
                                    {{ $reclamacao->votos()->where('positivo', 0)->count() }}
                                </td>
                                <td>
                                    {{ $reclamacao->status->nome }}
                                </td>
                                <td>
                                    <table>
                                        @foreach($reclamacao->tags as $tag)
                                            <tr>{{ $tag->nome }}</tr>
                                        @endforeach
                                    </table>

                                </td>
                                <td><a href="{{ route('getDenunciarReclamacao', $reclamacao->id) }}">Denunciar</a> </td>
                                @if(Auth::user()->possuiFuncoes(['administrador', 'moderador']))
                                    <th><a class="btn btn-success" href="{{route('encaminharReclamacao', $reclamacao->id)}}">Encaminhar</a> </th>
                                @endif

                            </tr>
                        </table>
                        
                    </div>
                </div>

                <div class="col-md-10 col-md-offset-1">
                    <div class="jumbotron">
                        <div class="panel-heading">Comentarios</div>

                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Usuario</th>
                                    <th>Comentario</th>
                                    <th>Voto</th>
                                    <td>Opções</td>
                                    @if(Auth::user()->possuiFuncoes(['administrador', 'moderador']))
                                        <th>Ações administrativas</th>
                                    @endif


                                </tr>
                                @foreach($reclamacao->comentarios as $comentario)
                                    <tr>
                                        <td>{{ $comentario->usuario->name }}</td>
                                        <td>{{ $comentario->comentario }}</td>
                                        <td>{{ $comentario->usuario->votoReclamacao($reclamacao->id) }}</td>
                                        @if(Auth::user()->id === $comentario->usuario->id)
                                            <td>
                                                <form class="form-inline" method="POST" action="{{ route('postDeletarComentario') }}">
                                                    {!! csrf_field() !!}
                                                    <div class="form-group">
                                                        <input type="hidden" value="{{ $comentario->id }}" name="comentarioId">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-danger" value="Deletar Comentário">
                                                    </div>
                                                </form>


                                            </td>

                                        @elseif(Auth::user()->possuiFuncoes(['administrador', 'moderador']))
                                            <td>Nenhuma opção disponível</td>


                                        @endif
                                        @if(Auth::user()->possuiFuncoes(['administrador', 'moderador']))
                                        <td>
                                            <table>
                                                <tr>
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
                                                <tr>
                                                    @include('funcoes\partialMutarUsuario', array('usuario' => $comentario->usuario))


                                                </tr>
                                            </table>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>

                <div class="col-md-10 col-md-offset-1">
                    <div class="jumbotron"> <!--<div class="panel panel-default">-->
                        <div class="">Comentar</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="comentar">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="comentario">Comentario:</label>
                                    <textarea class="form-control" name="comentario" rows="2" id="descricaoReclamacao"
                                              placeholder="Deixe seu comentário..."></textarea>
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
