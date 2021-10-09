<div class="card">
    <div class="card-header pb-0">
        <h5>{{ $title }}</h5>
        <span>Por favor llena los siguientes campos, los campos marcados con (*) son requeridos.</span>
    </div>
    <div class="card-body">
        <form action="{{ $route }}" 
            class="theme-form" 
            id="vehicleForm" 
            method="post"
            enctype="multipart/form-data">
            @csrf

            @if($type == 'update')
                @method('PUT')
            @endif

            @if($vehicle)
                <div class="row mb-4">
                    <div class="col-12 col-sm-2">
                        <img src="{{ $vehicle->pictureUrl }}" class="img-fluid rounded" alt="">
                    </div>
                </div>
            @endif
            
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="mb-3">
                        <label class="col-form-label pt-0">Foto del vehículo:</label>
                        <input type="file" name="picture" class="form-control">

                        @error('picture')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="vehicleType">*Tipo:</label>
                        <input class="form-control" 
                            id="vehicleType" 
                            type="text"
                            name="type"
                            value="{{ $vehicle 
                                ? $vehicle->type 
                                : old('type') }}"
                            required>

                        @error('type')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="vehicleBrand">*Marca:</label>
                        <input class="form-control" 
                            id="vehicleBrand" 
                            type="text"
                            name="brand"
                            value="{{ $vehicle 
                                ? $vehicle->brand 
                                : old('brand') }}"
                            required>

                        @error('brand')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="vehicleModel">*Modelo:</label>
                        <input class="form-control" 
                            id="vehicleModel" 
                            type="text"
                            name="model"
                            value="{{ $vehicle 
                                ? $vehicle->model 
                                : old('model') }}"
                            required>

                        @error('model')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="vehicleYear">*Año:</label>
                        <input class="form-control" 
                            id="vehicleYear" 
                            type="number"
                            name="year"
                            value="{{ $vehicle 
                                ? $vehicle->year 
                                : old('year') }}"
                            required>

                        @error('year')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="vehiclePlates">*Placas:</label>
                        <input class="form-control" 
                            id="vehiclePlates" 
                            type="text"
                            name="plates"
                            value="{{ $vehicle 
                                ? $vehicle->plates 
                                : old('plates') }}"
                            required>

                        @error('plates')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="vehiclePlatesRegion">*Región:</label>
                        <input class="form-control" 
                            id="vehiclePlatesRegion" 
                            type="text"
                            name="plates_region"
                            value="{{ $vehicle 
                                ? $vehicle->plates_region 
                                : old('plates_region') }}"
                            required>

                        @error('plates_region')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="vehicleColor">*Color:</label>
                        <input class="form-control" 
                            id="vehicleColor" 
                            type="text"
                            name="color"
                            value="{{ $vehicle 
                                ? $vehicle->color 
                                : old('color') }}"
                            required>

                        @error('color')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="vehicleCapacity">*Capacidad de pasajeros:</label>
                        <input class="form-control" 
                            id="vehicleCapacity" 
                            type="number"
                            name="capacity"
                            value="{{ $vehicle 
                                ? $vehicle->capacity 
                                : old('capacity') }}"
                            required>

                        @error('capacity')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="vehicleForm" class="btn btn-primary">
            {{ $type == 'post' ? 'Guardar' : 'Actualizar' }}
        </button>
    </div>
</div>