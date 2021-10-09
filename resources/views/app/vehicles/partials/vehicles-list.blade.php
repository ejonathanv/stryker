<div class="card">
    <div class="card-header d-flex align-items-center">
        <div>
            <h5>Vehículos</h5>
            <span>Lista de todos los vehículos.</span>
        </div>
        <a href="{{ route('vehicles.create') }}" class="btn btn-success ms-auto">
            Nuevo
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Año</th>
                    <th scope="col">Color</th>
                    <th scope="col">Capacidad</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                <tr>
                    <td style="vertical-align: middle;">
                        <div class="avatarThumb sm" style="background-image: url('{{ $vehicle->pictureUrl }}')"></div>
                    </td>
                    <td style="vertical-align: middle;">{{ $vehicle->type }}</td>
                    <td style="vertical-align: middle;">{{ $vehicle->brand }}</td>
                    <td style="vertical-align: middle;">{{ $vehicle->model }}</td>
                    <td style="vertical-align: middle;">{{ $vehicle->year }}</td>
                    <td style="vertical-align: middle;">{{ $vehicle->color }}</td>
                    <td style="vertical-align: middle;">({{ $vehicle->capacity }}) Personas</td>
                    <td style="vertical-align: middle;" style="vertical-align: middle;" class="text-end">
                        <a href="{{ route('vehicles.show', $vehicle) }}">
                            Detalles
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $vehicles->links() }}
    </div>
</div>