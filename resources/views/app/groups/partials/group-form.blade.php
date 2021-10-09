<div class="card">
    <div class="card-header pb-0">
        <h5>
            Información general
        </h5>
        <span>
            Por favor llena los siguientes campos, los campos marcados con (*) son requeridos.
        </span>
    </div>
    <div class="card-body">
        <form action="{{ $route }}" method="post" id="groupForm">
            @csrf
            @if($type == 'update')
                @method('put')
            @endif
            <div class="mb-0">
                <label class="col-form-label pt-0" 
                    for="groupName">
                    Nombre del grupo
                </label>
                <input class="form-control" 
                    id="groupName" 
                    type="text"
                    name="name"
                    value="{{ $group ? $group->name : old('name') }}"
                    placeholder="Agrega un nombre a este grupo"
                    autofocus>

                @error('name')
                    <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                @enderror
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="groupForm" class="btn btn-primary">
            {{ $type == 'post' ? 'Guardar' : 'Actualizar' }}
        </button>
    </div>
</div>