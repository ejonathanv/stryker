<div>
    <h2>Detalles de viaje:</h2>
    <h4 style="margin: 0">{{ $trip->title }}</h4>
    <h4 style="margin: 0">Fecha: {{ $trip->date->format('d M, Y') }}</h4>
    <h4 style="margin: 0">Iniciando en: {{ $trip->address }}</h4>
    <h4 style="margin: 0">
        ID de viaje: 
        <span style="color: red">{{ $trip->trip_id }}</span>
    </h4>

    <h2>Pasajeros:</h2>
    <table cellpadding="2" cellspacing="0">
        <thead>
            <tr>
                <th>Nombre:</th>
                <th>E-mail:</th>
                <th>Celular:</th>
                <th>Género:</th>
                <th>Compañía:</th>
                <th>Puesto:</th>
                <th>FMM:</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trip->passengers as $tripPassenger)
                @php
                    $passenger = $tripPassenger->passenger;
                    $company = $passenger->company;
                @endphp
                <tr>
                    <td>{{ $passenger->full_name }}</td>
                    <td>{{ $passenger->email }}</td>
                    <td>{{ $passenger->phone }}</td>
                    <td>{{ $passenger->gender == 'Male' ? 'Masculino' : 'Femenino' }}</td>
                    <td>{{ $company ? $company->name : '' }}</td>
                    <td>{{ $passenger->jobtitle }}</td>
                    <td>{{ $passenger->fmm ? 'Sí' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Conductor:</h2>
    <table cellpadding="2" cellspacing="0">
        <tbody>
            <tr>
                <th width="25%">Fotografía:</th>
                <td>
                    <img src="{{ $trip->driver->driver->avatar_url }}" style="height: 70px; width: auto;" alt="">
                </td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td>{{ $trip->driver->driver->full_name }}</td>
            </tr>
            <tr>
                <th>No. celular:</th>
                <td>{{ $trip->driver->driver->phone }}</td>
            </tr>
            <tr>
                <th>E-mail:</th>
                <td>{{ $trip->driver->driver->user->email }}</td>
            </tr>
        </tbody>
    </table>

    <h2>Vehículo:</h2>
    <table cellpadding="2" cellspacing="0">
        <tbody>
            <tr>
                <th width="25%">Fotografía:</th>
                <td>
                    <img src="{{ $trip->driver->vehicle->picture_url_public_path }}" style="height: 70px; width: auto;" alt="">
                </td>
            </tr>
            <tr>
                <th>Tipo:</th>
                <td>{{ $trip->driver->vehicle->short_name }}</td>
            </tr>
            <tr>
                <th>Marca:</th>
                <td>{{ $trip->driver->vehicle->brand }}</td>
            </tr>
            <tr>
                <th>Modelo:</th>
                <td>{{ $trip->driver->vehicle->model }}</td>
            </tr>
            <tr>
                <th>Año:</th>
                <td>{{ $trip->driver->vehicle->year }}</td>
            </tr>
            <tr>
                <th>Placas:</th>
                <td>{{ $trip->driver->vehicle->plates }}</td>
            </tr>
            <tr>
                <th>Placas (Región):</th>
                <td>{{ $trip->driver->vehicle->plates_region }}</td>
            </tr>
            <tr>
                <th>Color:</th>
                <td>{{ $trip->driver->vehicle->color }}</td>
            </tr>
            <tr>
                <th>Capacidad de pasajeros:</th>
                <td>{{ $trip->driver->vehicle->capacity }}</td>
            </tr>

            <tr>
                <th>Iniciando en:</th>
                <td>{{ $trip->driver->from }}</td>
            </tr>

            <tr>
                <th>Hora de inicio:</th>
                <td>{{ $trip->driver->from_time->format('H:i a') }}</td>
            </tr>

            <tr>
                <th>Finalizando en:</th>
                <td>{{ $trip->driver->to }}</td>
            </tr>

            <tr>
                <th>Hora de finalización:</th>
                <td>{{ $trip->driver->to_time->format('H:i a') }}</td>
            </tr>
        </tbody>
    </table>
</div>