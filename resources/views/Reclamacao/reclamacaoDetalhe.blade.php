@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $reclamacao->titulo }}</div>

                    <div class="panel-body interacion">
                        <table class="table table-striped">
                            <tr>
                                <th>Usuario</th>
                                <th>Titulo</th>
                                <th>Descricao</th>
                                <th>Ações</th>
                                <th>Votos Positivos</th>
                                <th>Votos Negativos</th>
                            </tr>

                            <tr>
                                <td>{{ $reclamacao->usuario->name }}</td>
                                <td>{{ $reclamacao->titulo }}</td>
                                <td>{{ $reclamacao->descricao }}</td>
                                <td>
                                    <table>
                                        <td>
                                            <button type="button" class="btn btn-default votoPositivo">
                                                <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
                                            </button>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-default votoNegativo">
                                                <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
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

                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Comentarios</div>

                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Usuario</th>
                                    <th>Titulo</th>
                                    <th>Comentario</th>
                                    <th>Voto</th>
                                </tr>
                                @foreach($reclamacao->comentarios as $comentario)
                                    <tr>
                                        <td>{{ $comentario->usuario->name }}</td>
                                        <td>{{ $comentario->titulo }}</td>
                                        <td>{{ $comentario->comentario }}</td>
                                        <td>{{ $comentario->usuario->votoReclamacao($reclamacao->id) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>

                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Comentar</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="comentar">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="tituloReclamacao">Titulo</label>
                                    <input type="text" name="titulo" class="form-control" id="tituloReclamacao"
                                           placeholder="Titulo">
                                </div>
                                <div class="form-group">
                                    <label for="comentario">Comentario:</label>
                                    <textarea class="form-control" name="comentario" rows="2" id="descricaoReclamacao"
                                              placeholder="Explique o seu problema..."></textarea>
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
