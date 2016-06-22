@if(!$usuario->isMutado())
    <form class="form-inline" method="POST" action="{{ route('modMutarUsuario') }}">
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="hidden" value="{{ $usuario->id }}" name="usuarioId">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-danger" value="Mutar Usuário">
        </div>
    </form>
@else
    <form class="form-inline" method="POST" action="{{ route('modDesmutarUsuario') }}">
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="hidden" value="{{ $usuario->id }}" name="usuarioId">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Desmutar Usuário">
        </div>
    </form>
@endif