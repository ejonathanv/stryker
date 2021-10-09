<div class="card">
    <div class="card-header d-flex align-items-center">
        <div>
            <h5>Grupos de viajes</h5>
            <span>Lista de todos los grupos registrados.</span>
        </div>
        <a href="{{ route('groups.create') }}" class="btn btn-success ms-auto">
            Nuevo
        </a>
    </div>
    @if(count($groups))
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Total de viajes</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                <tr>
                    <th scope="row">{{ $group->id }}</th>
                    <td>{{ $group->name }}</td>
                    <td>({{ count($group->trips) }}) Viajes</td>
                    <td class="text-end">
                        <a href="{{ route('groups.show', $group) }}">
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
            <p class="m-0">No hay grupos registrados.</p>
        </div>
    @endif

    @if($groups->total() > $groups->perPage())
    <div class="card-footer">
        {{ $groups->links() }}
    </div>
    @endif
</div>