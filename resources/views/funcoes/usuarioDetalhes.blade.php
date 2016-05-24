@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuario Encontrado</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ações</th>
                                <th>Funcoes</th>
                            </tr>
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        <form class="form-inline" method="POST" action="{{ route('adicionarAdministrador') }}">
                                            {!! csrf_field() !!}

                                            <div class="form-group">
                                                <input type="hidden" value="{{ $usuario->id }}" name="usuarioId">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger" id="btnAdicionarAdministrador" value="Tornar Administrador"/>
                                            </div>

                                        </form>
                                    </td>
                                    @foreach($usuario->funcoes as $funcao)
                                        <td>{{ $funcao->nome }}</td>
                                    @endforeach
                                </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>


    </script>
@endsection
