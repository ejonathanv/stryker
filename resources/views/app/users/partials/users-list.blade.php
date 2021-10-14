<div class="card">
    <div class="card-header d-flex align-items-center">
        <div>
            <h5>Lista de usuarios</h5>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-success ms-auto">
            Nuevo
        </a>
    </div>
    @if(count($users))
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre(s)</th>
                    <th scope="col">Apellido(s)</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('users.show', $user) }}">
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
        <p class="m-0">No hay usuarios registrados.</p>
    </div>
    @endif
    @if($users->total() > $users->perPage())
    <div class="card-footer">
        {{ $users->links() }}
    </div>
    @endif
</div>