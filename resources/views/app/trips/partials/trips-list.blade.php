<div class="card">
    <div class="card-header d-flex align-items-center">
        <div>
            <h5>{{ $title }}</h5>
            <span>{{ $subtitle }}</span>
        </div>
        <a href="{{ route('trips.create') }}" class="btn btn-success ms-auto">
            Nuevo
        </a>
    </div>
    @if(count($trips))
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Título</th>
                    <th scope="col">Conductor</th>
                    <th scope="col">Pasajeros</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($trips as $trip)
                <tr>
                    <td>{{ $trip->date->format('d M, Y') }}</td>
                    <td>
                        <a href="{{ route('trips.show', $trip) }}">
                            {{ $trip->title }}
                        </a>
                    </td>
                    <td>
                        @if($trip->driver)
                        <a href="{{ route('drivers.show', $trip->driver->driver) }}">
                            {{ $trip->driver_name }}
                        </a>
                        @else
                        Sin conductor asignado
                        @endif
                    </td>
                    <td>({{ count($trip->passengers) }}) Pasajeros</td>
                    <td>
                        <a href="{{ route('trips.show', $trip) }}">
                            Detalles
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="card-body">
        <p class="m-0">No hay viajes registrados.</p>
    </div>
    @endif
    @if($trips->total() > $trips->perPage())
    <div class="card-footer">
        {{ $trips->links() }}
    </div>
    @endif
</div>