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
                    <h3>Encaminhar Reclamação</h3>

                    <div class="padded">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('postEncaminharReclamacao') }}">
                            {!! csrf_field() !!}

                            <div class="form-group padded-top">

                                <input type="hidden" name="idReclamacao" class="form-control" id="idReclamacao" value="{{ $idReclamacao }}"">
                            </div>

                            <div class="form-group padded-top">
                                <label>Assunto</label>
                                <input type="text" name="assunto" class="form-control" id="assunto" placeholder="{{ 'Buraco na Rua Capitão' }}">
                            </div>

                            <div class="form-group padded-top">
                                <label>E-mail do órgão responsável</label>
                                <input type="email" name="emailOrgao" class="form-control" id="emailOrgao" placeholder="{{ 'exemplo@prefeitura.com' }}">
                            </div>

                            <div class="form-group padded-top">
                                <label>Corpo do email</label>
                                <textarea class="form-control" name="corpoEmail" rows="3" id="corpoEmail" placeholder="Descreva o problema."></textarea>
                            </div>

                            <div class="form-group padded-top">
                                <div class="col-md-6 col-md-offset-3">
                                    <label for="nomeStatus">Qual o novo status dessa reclamação? </label>
                                    <select class="form-control" id="nomeStatus" name="nomeStatus">
                                        @foreach($statuses as $status)
                                            <option>{{ $status->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group padded-top">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-success btn-group-justified padded">Encaminhar!</button> <!--ORIGINAL btn btn-default-->
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
