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
        <h3>Criar Reclamação</h3>

        <div class="padded">
          <form class="form-horizontal" role="form" method="POST" action="post_criar_reclamacao">
            {!! csrf_field() !!}
            <div class="form-group padded-top">
              <!--<label for="tituloReclamacao">Titulo</label>-->
              <input type="text" name="titulo" class="form-control" id="tituloReclamacao" placeholder="Titulo">
            </div>
            <div class="form-group padded-top">
              <!--<label for="descricaoReclamacao">Descricao:</label>-->
              <textarea class="form-control" name="descricao" rows="3" id="descricaoReclamacao" placeholder="Descrição do problema..."></textarea>
            </div>
            <div class="form-group padded-top">
              <div class="col-md-6 col-md-offset-3">
                <label for="tag">Selecione uma tag para melhor categorizar o problema </label>
                <select class="form-control" id="tag" name="tag">
                  @foreach($tags as $tag)
                    <option>{{ $tag->nome }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group padded-top">
              <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-success btn-group-justified padded">Reclamar!</button> <!--ORIGINAL btn btn-default-->
              </div>
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
