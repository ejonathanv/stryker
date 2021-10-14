<div class="card">
    <div class="card-header pb-0">
        <h5>{{ $title }}</h5>
        <span>Por favor llena los siguientes campos, los campos marcados con (*) son requeridos.</span>
    </div>
    <div class="card-body">
        <form action="{{ $route }}" 
            class="theme-form" 
            id="userForm" 
            method="post"
            enctype="multipart/form-data">
            @csrf

            @if($type == 'update')
                @method('PUT')
            @endif

            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="userFirstName">*Nombre(s):</label>
                        <input class="form-control" 
                            id="userFirstName" 
                            type="text"
                            name="first_name"
                            value="{{ $user 
                                ? $user->first_name 
                                : old('first_name') }}"
                            required>

                        @error('first_name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="userLastName">*Apellido(s):</label>
                        <input class="form-control" 
                            id="userLastName" 
                            type="text"
                            name="last_name"
                            value="{{ $user 
                                ? $user->last_name 
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
                        <label class="col-form-label pt-0" for="userEmail">*Correo electrónico:</label>
                        <input class="form-control" 
                            id="userEmail" 
                            type="email"
                            name="email"
                            value="{{ $user 
                                ? $user->email 
                                : old('email') }}"
                            required>

                        @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="userLastName">*Role:</label>
                        
                        <select name="role" class="form-select" id="" required>
                            <option disabled selected value="">--Elige una opción--</option>
                            <option  
                                @if($user)
                                    {{ $user->role == 'admin' 
                                        ? 'selected'
                                        : '' }}
                                @endif
                                value="admin">
                                Administrador
                            </option>
                            <option
                                @if($user)
                                    {{ $user->role == 'user' 
                                        ? 'selected'
                                        : '' }}
                                @endif
                                value="user">
                                Usuario
                            </option>
                            <option
                                @if($user)
                                    {{ $user->role == 'passenger' 
                                        ? 'selected'
                                        : '' }}
                                @endif 
                                value="passenger">
                                Pasajero
                            </option>
                        </select>

                        @error('role')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <h6 class="my-4">
                {{ $type == 'post' 
                    ? 'Contraseña'
                    : 'Restaurar contraseña'  }}
            </h6>

            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="userPassword">Contraseña:</label>
                        <input class="form-control" 
                            id="userPassword" 
                            type="password"
                            name="password">

                        @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-0">
                        <label class="col-form-label pt-0" for="userPasswordConfirmation">Confirmar contraseña:</label>
                        <input class="form-control" 
                            id="userPasswordConfirmation" 
                            type="password"
                            name="password_confirmation">

                        @error('password_confirmation')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>            

        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="userForm" class="btn btn-primary">
            {{ $type == 'post' ? 'Guardar' : 'Actualizar' }}
        </button>
    </div>
</div>