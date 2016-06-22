@extends('layouts.app')

@section('content')

    <style type="text/css">

        .centered{
            text-align: center;
        }

        .padded{
            padding: 10px;
        }

        .padded-top{
            padding-top: 20px;
        }

        .bigger-text{
            font-size: 125%;
        }

        textarea{
            max-width: 100%;
        }

    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2"> <!--<div class="col-md-10 col-md-offset-1">-->
                <div class="jumbotron panel-default centered">
                    <h3>Denunciar Reclamação</h3>

                    <div class="padded">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('postDenunciarReclamacao') }}">
                            {!! csrf_field() !!}
                            <div class="form-group padded-top">
                                <label for="denuncia">Motivo da denuncia:</label>
                                <textarea name="denuncia" class="form-control" rows="3" id="denuncia" placeholder="Descreva o por quê dessa denuncia..."></textarea>
                            </div>
                            <div class="form-group padded-top">
                                <input type="hidden" name="idReclamacao" value="{{ $reclamacao->id  }}"/>
                            </div>

                            <div class="form-group padded-top">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-success btn-group-justified padded">Denunciar!</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
