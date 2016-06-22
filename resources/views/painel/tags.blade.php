@extends ('layouts.dashboard')
@section('page_heading','Tags disponíveis no Sistema')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-1">
                <table class="table table-striped">
                    <tr>
                        <th>Tag</th>
                        <th>Editar</th>
                    </tr>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->nome }}</td>
                            <td>Adicionar Link</td>
                        </tr>
                    @endforeach
                </table>

                @include('tags\partialAdicionarTag');










            </div>


        </div>
    </div>

@stop
