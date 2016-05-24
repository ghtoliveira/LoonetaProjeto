@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Reclamar</div>

                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="post_criar_reclamacao">
                    {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="tituloReclamacao">Titulo</label>
                      <input type="text" name="titulo" class="form-control" id="tituloReclamacao" placeholder="Titulo">
                    </div>
                    <div class="form-group">
                      <label for="descricaoReclamacao">Descricao:</label>
                      <textarea class="form-control" name="descricao" rows="3" id="descricaoReclamacao" placeholder="Explique o seu problema..."></textarea>
                    </div>


                    <div class="form-group">
                      <button type="submit" class="btn btn-default">Reclamar!</button>
                    </div>
                </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
