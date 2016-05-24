@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Reclamacoes</div>

                <div class="panel-body">
                  <table class="table table-striped">
                    <tr>
                        <th>Usuario</th>
                        <th>Titulo</th>
                        <th>Descricao</th>
                        <th>Ações</th>
                        <th>Data de criação</th>

                    </tr>
                    @foreach($reclamacoes as $reclamacao)
                    <tr>
                        <td>{{ $reclamacao->usuario->name }}</td>
                        <td>{{ $reclamacao->titulo }}</td>
                        <td>{{ $reclamacao->descricao }}</td>
                        <td><a href="{{ url('/reclamacao', $reclamacao->id) }}">Detalhes</a></td>
                        <td>{{ $reclamacao->created_at }}</td>
                    </tr>
                    @endforeach
                  </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
