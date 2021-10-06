<div class="card">
    <div class="card-header d-flex align-items-center">
        <div>
            <h5>Pasajeros</h5>
            <span>Lista de todos los pasajeros registrados.</span>
        </div>
        <a href="{{ route('passengers.create') }}" class="btn btn-success ms-auto">
            Nuevo
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Compañía</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($passengers as $passenger)
                <tr>
                    <th scope="row">{{ $passenger->id }}</th>
                    <td>{{ $passenger->full_name }}</td>
                    <td>{{ $passenger->email }}</td>
                    <td>{{ $passenger->phone }}</td>
                    <td>{{ $passenger->company->name }}</td>
                    <td>
                        <a href="{{ route('passengers.show', $passenger) }}">
                            Detalles
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $passengers->links() }}
    </div>
</div>