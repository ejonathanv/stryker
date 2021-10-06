<div class="card">
    <div class="card-header pb-0">
        <h5>{{ $title }}</h5>
        <span>Por favor llena los siguientes campos, los campos marcados con (*) son requeridos.</span>
    </div>
    <div class="card-body">
        <div class="row">
           <div class="col-sm-6">
               <form class="theme-form" action="{{ route('add-trip-passenger', $trip) }}" id="tripPassengerForm" method="post">
                   @csrf
                   <div class="mb-0">
                     <label class="col-form-label pt-0" for="selectPassenger">Pasajeros:</label>
                     <select class="form-select" id="selectPassenger" name="passenger" required @if(!count($trip->drivers)) disabled @endif>
                         <option disabled selected value="">--Elige una opción--</option>
                         @foreach($passengers as $passenger)
                             <option value="{{ $passenger->id }}">
                                 {{ $passenger->full_name }} - {{ $passenger->company->name }}
                             </option>
                         @endforeach
                     </select>
                     @error('passenger')
                         <small class="form-text text-danger" id="emailHelp">{{ $message }}</small>
                     @enderror
                   </div> 
               </form>
           </div> 
        </div>
    </div>
    <div class="card-footer d-flex align-items-center">
        @if(count($trip->drivers))
            <button type="submit" form="tripPassengerForm" class="btn btn-primary">
                Agregar
            </button>
            <a href="{{ route('passengers.create') }}" class="btn btn-link px-0 text-success ms-auto">
                <i class="fa fa-plus fa-sm mr-2"></i>
                Nuevo pasajero
            </a>
        @else
        <span class="text-danger">Por favor agrega un conductor antes de agregar pasajeros.</span>
        @endif
    </div>
    <div class="card-header border-top pb-0">
        <h5>({{ count($trip->passengers) }}) Pasajeros agregados</h5>
        <span>Lista de pasajeros agregados al viaje, has click en el icon (x) para eliminar.</span>
    </div>
    <div class="card-body">
        @if(count($trip->passengers))
            @foreach($trip->passengers as $passenger)
                <div class="@if(!$loop->last) mb-4 @endif d-flex align-items-center">
                    <div class="flex-1">
                        <h6 class="text-success mb-0">{{ $passenger->full_name }}</h4>
                        <p class="m-0 text-muted">Cel: {{ $passenger->passenger->phone }}</p>
                        <p class="m-0 text-muted">E-mail: {{ $passenger->passenger->email }}</p>
                    </div>
                    <form action="{{ route('remove-passenger', $passenger) }}" method="post" class="ms-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link"><i class="fa fa-times text-danger"></i></button>
                    </form>
                </div>
            @endforeach
        @else
            <span class="text-muted">No se han agregado pasajeros</span>
        @endif
    </div>
</div>