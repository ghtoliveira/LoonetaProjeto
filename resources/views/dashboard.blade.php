@extends ('layouts.dashboard')

@section('page_title')	Status do sistema @stop

@section('section')
    <h2>Status do sistema</h2>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $numReclamacoesDenunciadas }}</div>
                        <div>Reclamações Denunciadas!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left"><a href="{{ route('reclamacoesDenunciadas') }}">Ver Detalhes</a> </span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


@stop

