<div class="card">
    <div class="card-header pb-0">
        <h5>{{ $title }}</h5>
        <span>Por favor llena los siguientes campos, los campos marcados con (*) son requeridos.</span>
    </div>
    <div class="card-body">
        <form action="{{ $route }}" 
            class="theme-form" 
            id="driverForm" 
            method="post"
            enctype="multipart/form-data">
            @csrf

            @if($type == 'update')
                @method('PUT')
            @endif

            @if($driver)
            <div class="avatarThumb mb-3" style="background-image: url('{{ $driver->avatarUrl  }}');"></div>
            @endif
            
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="mb-3">
                        <label class="col-form-label pt-0">Fotografía:</label>
                        <input type="file" name="avatar" class="form-control">

                        @error('avatar')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="driverFirstName">*Nombre(s):</label>
                        <input class="form-control" 
                            id="driverFirstName" 
                            type="text"
                            name="first_name"
                            value="{{ $driver 
                                ? $driver->user->first_name 
                                : old('first_name') }}"
                            required>

                        @error('first_name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="driverLastName">*Apellido(s):</label>
                        <input class="form-control" 
                            id="driverLastName" 
                            type="text"
                            name="last_name"
                            value="{{ $driver 
                                ? $driver->user->last_name 
                                : old('last_name') }}"
                            required>

                        @error('last_name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="driverEmail">*Correo electrónico:</label>
                        <input class="form-control" 
                            id="driverEmail" 
                            type="email"
                            name="email"
                            value="{{ $driver 
                                ? $driver->user->email 
                                : old('email') }}"
                            required>

                        @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="driverPhone">*Teléfono:</label>
                        <input class="form-control" 
                            id="driverPhone" 
                            type="text"
                            name="phone"
                            value="{{ $driver ? $driver->phone : old('phone') }}"
                            required>

                        @error('phone')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="driverForm" class="btn btn-primary">
            {{ $type == 'post' ? 'Guardar' : 'Actualizar' }}
        </button>
    </div>
</div>