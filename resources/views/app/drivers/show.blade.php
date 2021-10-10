<x-dashboard-layout pageTitle="Detalles de conductor">

<div class="row">
	<div class="col-12 col-sm-4">
		<div class="card">
			<div class="card-body">
				<div class="d-flex flex-column align-items-center justify-content-center">
					<div class="avatarThumb mb-3" style="background-image: url('{{ $driver->avatar_url }}');"></div>
					<h4 class="mb-3">{{ $driver->full_name }}</h4>
					<p class="mb-0 text-muted">E-mail: {{ $driver->user->email }}</p>
					<p class="mb-4 text-muted">Phone: {{ $driver->phone }}</p>
					<a href="{{ route('drivers.edit', $driver) }}" class="text-success">
						<i class="fa fa-pencil-alt fa-xs me-2"></i>
						Editar perfil
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-8">
		<x-trips-list :trips="$trips" title="Viajes asignados" subtitle="Todos los viajes de {{ $driver->full_name }}" />
	</div>
</div>
</x-dashboard-layout>