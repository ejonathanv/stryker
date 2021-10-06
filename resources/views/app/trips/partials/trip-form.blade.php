<div class="card">
    <div class="card-header pb-0">
        <h5>{{ $title }}</h5>
        <span>Por favor llena los siguientes campos, los campos marcados con (*) son requeridos.</span>
    </div>
    <div class="card-body">
        <form class="theme-form" id="tripForm" action="{{ $route }}" method="post">
            @csrf
            @if($type == 'update')
                @method('PUT')
            @endif
            <div class="mb-3">
                <label class="col-form-label pt-0" for="tripTitle">Título</label>
                <input class="form-control" 
                    id="tripTitle" 
                    type="text"
                    name="title"
                    value="{{ $trip ? $trip->title : old('title') }}"
                    placeholder="Agrega un título a este viaje">

                @error('title')
                    <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="col-form-label pt-0" for="tripAddress">Dirección:</label>
                <input class="form-control" 
                    id="tripAddress"
                    name="address"
                    value="{{ $trip ? $trip->address : old('address') }}"
                    type="text">
                @error('address')
                    <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-0">
                <label class="col-form-label pt-0" for="tripDate">Fecha:</label>
                <input class="form-control" 
                    id="tripDate"
                    name="date"
                    value="{{ $trip ? $trip->date->format('d/m/Y') : old('date') }}"
                    type="date">
                @error('date')
                    <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                @enderror
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="tripForm" class="btn btn-primary">
            {{ $type == 'post' ? 'Guardar' : 'Actualizar' }}
        </button>
        @if($type == 'post')
        <a href="{{ route('trips.index') }}" class="btn btn-secondary">Cancelar</a>
        @endif
    </div>
</div>