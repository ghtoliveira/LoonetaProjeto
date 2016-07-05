@extends ('layouts.dashboard')
@section('page_heading','Reclamações Denunciadas')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-1">
                <table class="table table-striped">
                    <tr>
                        <th>Descrição</th>
                        <th>Reclamacao</th>
                        <th>Usuario - Nome</th>
                        <th>Usuario - Email</th>
                    </tr>
                    @foreach($denuncias as $denuncia)
                        <tr>
                            <td>{{ $denuncia->denuncia}}</td>
                            <td><a href="{{ url('/reclamacao', $denuncia->reclamacao->id) }}">Click</a></td>
                            <td>{{ $denuncia->reclamacao->usuario->name }}</td>
                            <td>{{ $denuncia->reclamacao->usuario->email }}</td>
                        </tr>
                    @endforeach
                </table>












            </div>


        </div>
    </div>

@stop
