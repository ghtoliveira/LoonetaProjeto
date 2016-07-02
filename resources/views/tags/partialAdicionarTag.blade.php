<!--MODIFICADO-->

<style media="screen">
  .padded{
    padding-left: 20px;

  }
</style>

<div class="padded">
  <form class="form-inline" method="POST" action="{{ route('postAdicionarTag') }}">
      {!! csrf_field() !!}
      <div class="row">
        <hr>
        <h3>Adição de Tags</h3>
        <div class="form-group">
            <label for="tag">Tag:</label>
            <div class="">
              <input type="text" name="tag" id="tag" placeholder="Ex.: Pavimento">
            </div>

        </div>
      </div>
      <br>
      <div class="row">
        <div class="form-group">
            <label for="tag">Descrição:</label>
            <div class="">
              <!--<input type="text" name="descricao" id="descricao" placeholder="Tag utilizada em reclamações referentes à pavimentação.">-->
              <textarea name="name" id="descricao" rows="8" cols="60" resize="none" placeholder="Ex.: Tag utilizada em reclamações referentes à pavimentação."></textarea>
            </div>

        </div>
      </div>

      <br>

      <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Adicionar Tag">
      </div>
  </form>

</div>
