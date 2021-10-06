<div class="card">
    <div class="card-header d-flex align-items-center">
        <div>
            <h5>Viajes</h5>
            <span>Lista de todos los viajes registrados.</span>
        </div>
        <a href="{{ route('trips.create') }}" class="btn btn-success ms-auto">
            Nuevo
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Título</th>
                    <th scope="col">Conductor</th>
                    <th scope="col">Total de pasajeros</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($trips as $trip)
                <tr>
                    <th scope="row">{{ $trip->id }}</th>
                    <td>{{ $trip->date->format('d M, Y') }}</td>
                    <td>{{ $trip->title }}</td>
                    <td>{{ $trip->driver_name }}</td>
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
    <div class="card-footer">
        {{ $trips->links() }}
    </div>
</div>