@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-inline" method="POST" action="{{ route('buscarUsuario') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="emailUsuario">E-mail:</label>
                        <input type="email" class="form-control" id="emailUsuario" name ="email">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btnBuscarUsuario" value="Buscar Usuario">
                    </div>
                </form>
                <div class="panel panel-default">
                    <div class="panel-heading">Adminstradores</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td><form class="form-inline" method="POST" action="{{ route('removerAdministrador') }}">
                                            {!! csrf_field() !!}

                                            <div class="form-group">
                                                <input type="hidden" value="{{ $admin->id }}" name="usuarioId">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger" id="btnRemoverAdmin" value="Revocar Status"/>
                                            </div>

                                        </form></td>
                                </tr>
                            @endforeach
                        </table>






                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>


    </script>
@endsection
