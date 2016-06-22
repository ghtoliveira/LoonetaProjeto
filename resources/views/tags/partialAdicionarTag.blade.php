<form class="form-inline" method="POST" action="{{ route('postAdicionarTag') }}">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="tag">Tag:</label>
        <input type="text" name="tag" id="tag" placeholder="Pavimento">
    </div>

    <div class="form-group">
        <label for="tag">Descrição:</label>
        <input type="text" name="descricao" id="descricao" placeholder="Tag utilizada em reclamações referentes à pavimentação.">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Adicionar Tag">
    </div>
</form>
