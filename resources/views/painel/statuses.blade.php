@extends ('layouts.dashboard')
@section('page_heading','Status disponíveis no Sistema')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-1">
                <table class="table table-striped">
                    <tr>
                        <th>Status</th>
                        <th>Descricao</th>
                        <th>Editar</th>
                    </tr>
                    @foreach($statuses as $status)
                        <tr>
                            <td>{{ $status->nome }}</td>
                            <td>{{ $status->descricao}}</td>
                            <td>Adicionar Link</td>
                        </tr>
                    @endforeach
                </table>

                @include('status\partialAdicionarStatus');










            </div>


        </div>
    </div>

@stop
