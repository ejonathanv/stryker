<div class="card">
    <div class="card-header pb-0">
        <h5>{{ $title }}</h5>
        <span>Selecciona el conductor y el vehículo para este viaje.</span>
    </div>

    @if($trip->driver)
        <div class="card-body border-top border-bottom mt-4">
            <div class="row">
                <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="avatarThumb" style="background-image: url('{{ asset($trip->driver->driver->avatar_url) }}')"></div>
                        </div>
                        <div class="ms-3">
                            <small class="d-block mb-2 font-weight-bold">Conductor asignado:</small>
                            <h6 class="text-success">{{ $trip->driver->driver->full_name }}</h6>
                            <p class="m-0">{{ $trip->driver->driver->phone }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="avatarThumb" style="background-image: url('{{ asset($trip->driver->vehicle->picture_url) }}')"></div>
                        </div>
                        <div class="ms-3">
                            <small class="d-block mb-2 font-weight-bold">Vehículo:</small>
                            <h6 class="text-success">{{ $trip->driver->vehicle->short_name }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="card-body">
        <form class="theme-form" action="{{ route('set-trip-driver', $trip) }}" id="tripDriversForm" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="selectDriver">*Conductor:</label>
                        <select class="form-select" id="selectDriver" name="driver" required>
                            <option disabled selected value="">--Elige una opción--</option>
                            @foreach($drivers as $driver)
                                <option 
                                    @if(count($trip->drivers)) 
                                        @if($tripDriver->driver_id == $driver->id) 
                                            selected 
                                        @endif  
                                    @endif
                                    value="{{ $driver->id }}">
                                    {{ $driver->full_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('driver')
                            <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="selectVehicle">*Vehículo:</label>
                        <select class="form-select" id="selectVehicle" name="vehicle" required>
                            <option disabled selected value="">--Elige una opción--</option>
                            @foreach($vehicles as $vehicle)
                                <option 
                                    @if(count($trip->drivers)) @if($tripDriver->vehicle_id == $vehicle->id) selected @endif @endif 
                                    value="{{ $vehicle->id }}">
                                    {{ $vehicle->full_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('vehicle')
                            <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="tripFrom">*Ubicación de inicio de viaje:</label>
                        <input class="form-control" 
                            id="tripFrom"
                            name="from"
                            value="{{ count($trip->drivers) ? $tripDriver->from : old('from') }}"
                            type="text"
                            required>
                        @error('from')
                            <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="tripFromHour">*Hora en que inicia el viaje:</label>
                        <input type="time" 
                            class="form-control" 
                            name="from_time" 
                            id="tripFromHour" 
                            value="{{ count($trip->drivers) ? $tripDriver->from_time->format('H:i') : old('from') }}"
                            required>
                        @error('from_time')
                            <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="tripTo">*Ubicación de finalización de viaje:</label>
                        <input class="form-control" 
                            id="tripTo"
                            name="to"
                            value="{{ count($trip->drivers) ? $tripDriver->to : old('to_time') }}"
                            type="text"
                            required>
                        @error('to')
                            <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="tripToHour">*Hora en que finaliza el viaje:</label>
                        <input type="time" 
                            class="form-control" 
                            name="to_time" 
                            id="tripToHour" 
                            value="{{ count($trip->drivers) ? $tripDriver->to_time->format('H:i') : old('to_time') }}"
                            required>
                        @error('to_time')
                            <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            @error('title')
                <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
            @enderror
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="tripDriversForm" class="btn btn-primary">
            Guardar
        </button>
    </div>
</div>