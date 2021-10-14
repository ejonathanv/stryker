<div class="card">
    <div class="card-header pb-0">
        <h5>{{ $title }}</h5>
        <span>
            Por favor llena los siguientes campos, los campos marcados con (*) son requeridos.
        </span>
    </div>
    <div class="card-body">
        <form action="{{ $route }}" class="theme-form" id="passengerForm" method="post">
            
            @csrf

            @if($type == 'update')
                @method('put')
            @endif

            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="passengerFirstName">*Nombre(s):</label>
                        <input class="form-control" 
                            id="passengerFirstName" 
                            type="text"
                            name="first_name"
                            value="{{ $passenger ? $passenger->first_name : old('first_name') }}"
                            required>

                        @error('first_name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="passengerLastName">*Apellido(s):</label>
                        <input class="form-control" 
                            id="passengerLastName" 
                            type="text"
                            name="last_name"
                            value="{{ $passenger ? $passenger->last_name : old('last_name') }}"
                            required>

                        @error('last_name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="passengerGender">*Género:</label>
                        <select name="gender" class="form-select" id="passengerGender" required>
                            <option disabled selected value="">--Elige una opción--</option>
                            <option {{ $passenger ? $passenger->gender == 'Male' ? 'selected' : '' : ''}} value="Male">Masculino</option>
                            <option {{ $passenger ? $passenger->gender == 'Female' ? 'selected' : '' : ''}} value="Female">Femenino</option>
                        </select>

                        @error('gender')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="passengerEmail">Correo electrónico (opcional):</label>
                        <input class="form-control" 
                            id="passengerEmail" 
                            type="email"
                            name="email"
                            value="{{ $passenger ? $passenger->email : old('email') }}">

                        @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="passengerPhone">Teléfono/Celular:</label>
                        <input class="form-control" 
                            id="passengerPhone" 
                            type="text"
                            value="{{ $passenger ? $passenger->phone : old('phone') }}"
                            name="phone">

                        @error('phone')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="passengerCompany">Compañía (opcional):</label>
                        <input class="form-control" 
                            id="passengerCompany" 
                            type="text"
                            value="{{ $passenger 
                                ? $passenger->company 
                                    ? $passenger->company->name
                                    : ''
                                : old('company') }}"
                            name="company">

                        @error('company')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="passengerJobTitle">Puesto laboral (opcional):</label>
                        <input class="form-control" 
                            id="passengerJobTitle" 
                            type="text"
                            value="{{ $passenger ? $passenger->jobtitle : old('jobtitle') }}"
                            name="jobtitle">

                        @error('jobtitle')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-0">
                
                <label class="d-block">
                    <input type="checkbox" value="true" name="fmm" {{ $passenger ? $passenger->fmm ? 'checked' : '' : '' }}>
                    ¿Cuenta con FMM?
                </label>

                @error('fmm')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="passengerForm" class="btn btn-primary">
            {{ $type == 'post' ? 'Guardar' : 'Actualizar' }}
        </button>
    </div>
</div>