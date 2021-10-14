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
            <div class="row mb-3">
                <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="tripTitle">*Título</label>
                        <input class="form-control" 
                            id="tripTitle" 
                            type="text"
                            name="title"
                            value="{{ $trip ? $trip->title : old('title') }}"
                            placeholder="Agrega un título a este viaje"
                            required>

                        @error('title')
                            <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="tripGroup">
                            Asignar a un grupo (opcional)
                        </label>
                        <select name="group" class="form-select" id="">
                            <option selected disabled value="">--Elíge una opción--</option>
                            <option value="">--Sin asignar a un grupo--</option>
                            @foreach($groups as $group)
                                <option
                                    @if($trip)
                                        {{ $trip->group_id == $group->id ? 'selected' : '' }}
                                    @endif
                                    value="{{ $group->id }}">
                                    {{ $group->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('group')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="tripAddress">*Dirección:</label>
                        <input class="form-control" 
                            id="tripAddress"
                            name="address"
                            value="{{ $trip ? $trip->address : old('address') }}"
                            type="text"
                            required>
                        @error('address')
                            <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="tripDate">*Fecha:</label>
                        <input class="form-control" 
                            id="tripDate"
                            name="date"
                            value="{{ $trip ? $trip->date->format('Y-m-d') : old('date') }}"
                            type="date"
                            required>
                        @error('date')
                            <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="tripDate">*Estatus:</label>
                        <select class="form-select" name="status" required>
                            <option disabled 
                                selected 
                                value="">
                                --Elíge una opción--        
                            </option>
                            <option value="1"
                                {{ $trip 
                                    ? $trip->status == 1 
                                        ? 'selected'
                                        : ''
                                    : '' }}>
                                Activo
                            </option>
                            <option value="2"
                                {{ $trip 
                                    ? $trip->status == 2 
                                        ? 'selected'
                                        : ''
                                    : '' }}>
                                Inactivo
                            </option>
                            <option value="3"
                                {{ $trip 
                                    ? $trip->status == 3 
                                        ? 'selected'
                                        : ''
                                    : '' }}>
                                Cancelado
                            </option>
                        </select>
                        @error('status')
                            <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="tripForm" class="btn btn-primary">
            {{ $type == 'post' ? 'Guardar y continuar' : 'Actualizar' }}
        </button>
    </div>
</div>