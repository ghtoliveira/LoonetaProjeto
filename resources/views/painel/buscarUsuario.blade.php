<!--MODIFICADO-->
@extends ('layouts.dashboard')
@section('page_heading','Buscar Usuário')

@section('section')

<style >
  .padded{
    padding-top: 10px;
  }
</style>

    <div class="col-sm-12 padded">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-1">
            <form class="form-inline" role="form" method="GET" action="{{ route('buscarUsuarioEmail') }}">
                <div class="form-group">
                    <label for="email">Email: </label>

                    <input class="form-control" type="email" name="email" id="email">

                </div>
                <div class="form-group">
                    <input class="form-control btn btn-primary" type="submit" value="Procurar">
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="col-sm-10 col-sm-offset-1 padded">
        <div class="row">
            @if(isset($usuario))

                <table class="table table-striped">
                    <tr>
                        <th style="min-width:10px;">ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Mutado</th>
                    </tr>
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->isMutado() ? 'Sim' : 'Não' }}</td>
                    </tr>
                </table>
                <hr>
                <button class="btn btn-default" data-toggle="collapse" data-target="#reclamacoes">Ver Reclamacoes</button>
                <div id="reclamacoes" class="collapse padded">
                    @if(sizeof($reclamacoes) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Data</th>
                                <th>Original</th>
                            </tr>
                        @foreach($reclamacoes as $reclamacao)
                            <tr>
                                <td>{{ $reclamacao->id }}</td>
                                <td>{{ $reclamacao->titulo }}</td>
                                <td>{{ $reclamacao->created_at}}</td>
                                <td><a href="{{ url('/reclamacao', $reclamacao->id) }}">Click</a></td>
                            </tr>
                        @endforeach
                        </table>
                    @else
                        <p><br>Esse usuário não possui nenhuma reclamação</p>
                    @endif

                </div>

                <br><br>

                <button class="btn btn-default" data-toggle="collapse" data-target="#comentarios">Ver Comentários</button>
                <div id="comentarios" class="collapse padded">
                    @if(sizeof($comentarios) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Comentário</th>
                                <th>Data</th>
                                <th>Reclamacao</th>
                            </tr>
                        @foreach($comentarios as $comentario)
                            <tr>
                                <td>{{ $comentario->id }}</td>
                                <td style="max-width:600px;">{{ $comentario->comentario }}</td>
                                <td>{{ $reclamacao->created_at}}</td>
                                <td><a href="{{ url('/reclamacao', $comentario->reclamacao->id) }}">Click</a></td>
                            </tr>
                        @endforeach
                        </table>

                    @else
                        <p>Esse usuário não possui nenhum comentário</p>
                    @endif

                </div>

                <br><br>

                <form class="form-inline" role="form" method="POST" action="{{ route('mutarUsuario') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <input class="form-control btn btn-default" type="submit" value="Mutar">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="usuarioId" value="{{  $usuario->id }}">
                    </div>
                </form>

                <br>

                <form class="form-inline" role="form" method="POST" action="{{ route('desmutarUsuario') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <input class="form-control btn btn-default" type="submit" value="Desmutar">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="usuarioId" value="{{  $usuario->id }}">
                    </div>
                </form>

                <br>

                @include('funcoes\partialModerador',array('usuario' => $usuario))

                <br>

                @include('funcoes\partialAdministrador', array('usuario' => $usuario))

            @elseif(isset($erro))
            <p class="bg-warning">{{ $erro }}</p>
            @endif

        </div>
    </div>
@stop
