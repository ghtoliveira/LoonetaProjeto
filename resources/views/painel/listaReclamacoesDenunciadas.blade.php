@extends ('layouts.dashboard')
@section('page_heading','Reclamações Denunciadas')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-1">
                <table class="table table-striped">
                    <tr>
                        <th>Titulo</th>
                        <th>Original</th>
                        <th>Ver Denuncias</th>
                        <th>Retirar Denúncia</th>
                    </tr>
                    @foreach($reclamacoes as $reclamacao)
                        <tr>
                            <td>{{ $reclamacao->titulo}}</td>
                            <td><a href="{{ url('/reclamacao', $reclamacao->id) }}">Click</a></td>
                            <td><a href="{{ url('/painel/reclamacoes/denuncias', $reclamacao->id) }}">Click</a></td>
                            <td>
                                <form action="{{ route('retirarDenuncia') }}" method="POST">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $reclamacao->id }}" name="id">
                                        <input type="submit" class="btn btn-default" value="Retirar Denúncias">
                                    </div>
                                </form>
                        </tr>
                    @endforeach
                </table>












            </div>


        </div>
    </div>

@stop
