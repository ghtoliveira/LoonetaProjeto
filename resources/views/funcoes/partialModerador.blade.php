@if(Auth::user()->possuiFuncao('administrador'))
    @if($usuario->possuiFuncao('moderador'))
    <form class="form-inline" method="POST" action="{{ route('removerModerador') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="hidden" value="{{ $usuario->id }}" name="usuarioId">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger" id="btnRemoverModerador" value="Revocar Status De Moderador"/>
            </div>

    </form>
    @else
        <form class="form-inline" method="POST" action="{{ route('adicionarModerador') }}">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="hidden" value="{{ $usuario->id }}" name="usuarioId">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger" id="btnAdicionarModerador" value="Tornar Moderador"/>
            </div>
        </form>
    @endif
@endif
