@extends ('layouts.dashboard')
@section('page_heading','Buscar Reclamação')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-1">
                <form class="form-inline" role="form" method="GET" action="{{ route('buscarReclamacoesTitulo') }}">
                    <div class="form-group">
                        <label for="titulo">Titulo: </label>
                        <input class="form-control" type="text" name="titulo" id="titulo">
                    </div>
                    <div class="form-group">
                        <input class="form-control btn btn-default" type="submit" value="Procurar">
                    </div>
                </form>
            </div>


        </div>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
            @if(isset($reclamacoes))
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Usuario</th>
                        <th>Link</th>
                    </tr>
                    @foreach($reclamacoes as $reclamacao)
                        <tr>
                            <td>{{ $reclamacao->id }}</td>
                            <td>{{ $reclamacao->titulo }}</td>
                            <td>{{ $reclamacao->usuario->name }}</td>
                            <td><a href="{{ url('reclamacao', $reclamacao->id)}}">Click</a></td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
    </div>
@stop
