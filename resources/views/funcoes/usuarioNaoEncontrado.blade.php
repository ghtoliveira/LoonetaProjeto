@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuario Não Encontrado</div>
                    <div class="panel-body">
                        <h1>Usuario nao encontrado, tente com outro e-mail!</h1>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>


    </script>
@endsection
