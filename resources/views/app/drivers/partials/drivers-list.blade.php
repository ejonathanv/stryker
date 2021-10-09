<div class="card">
    <div class="card-header d-flex align-items-center">
        <div>
            <h5>Conductores</h5>
            <span>Lista de todos los conductores.</span>
        </div>
        <a href="{{ route('drivers.create') }}" class="btn btn-success ms-auto">
            Nuevo
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Teléfono</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($drivers as $driver)
                <tr>
                    <td style="vertical-align: middle;" class="d-flex align-items-center">
                        <div class="avatarThumb sm" style="background-image: url('{{ $driver->avatar_url }}')"></div>
                        <span class="ms-2">{{ $driver->full_name }}</span>
                    </td>
                    <td style="vertical-align: middle;">{{ $driver->user->email }}</td>
                    <td style="vertical-align: middle;">{{ $driver->phone }}</td>
                    <td style="vertical-align: middle;" class="text-end">
                        <a href="{{ route('drivers.show', $driver) }}">
                            Detalles
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $drivers->links() }}
    </div>
</div>