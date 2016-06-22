<form class="form-inline" method="POST" action="{{ route('postAdicionarStatus') }}">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="tag">Tag:</label>
        <input type="text" name="status" id="status" placeholder="Em andamento">
    </div>

    <div class="form-group">
        <label for="tag">Descrição:</label>
        <input type="text" name="descricao" id="descricao" placeholder="A reclamação já foi enviada para órgãos responsáveis.">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Adicionar Tag">
    </div>
</form>
