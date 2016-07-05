<!--MODIFICADO-->

<style media="screen">
  .padded{
    padding-left: 20px;
  }
</style>

<div class="padded">
  <form class="form-inline" method="POST" action="{{ route('postAdicionarStatus') }}">

      {!! csrf_field() !!}
      <div class="row">
        <hr>
        <h3>Adição de Status</h3>
        <div class="form-group">
            <label for="tag">Tag:</label>
            <div class="">
              <input type="text" name="status" id="status" placeholder="Ex.: Em andamento">
            </div>

        </div>
      </div>

      <div class="row">
        <div class="form-group">
            <label for="tag"><br>Descrição:</label>
            <div class="">
              <!--<input type="text" name="descricao" id="descricao" placeholder="A reclamação já foi enviada para órgãos responsáveis.">-->
              <textarea name="name" id="descricao" rows="8" cols="60" resize="none" placeholder="Ex.: A reclamação já foi enviada para órgãos responsáveis."></textarea>
            </div>

        </div>
      </div>


      <div class="form-group">
        <br>
          <input type="submit" class="btn btn-primary btn-justify" value="Adicionar Status">
      </div>
  </form>

</div>
