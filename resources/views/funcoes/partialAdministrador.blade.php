@if(Auth::user()->possuiFuncao('administrador'))
    @if($usuario->possuiFuncao('administrador'))
        <form class="form-inline" method="POST" action="{{ route('removerAdministrador') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="hidden" value="{{ $usuario->id }}" name="usuarioId">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger" id="btnRemoverModerador" value="Revocar Status De Administrador"/>
            </div>

        </form>
    @else
        <form class="form-inline" method="POST" action="{{ route('adicionarAdministrador') }}">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="hidden" value="{{ $usuario->id }}" name="usuarioId">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger" id="btnAdicionarModerador" value="Tornar Administrador"/>
            </div>
        </form>
    @endif
@endif


