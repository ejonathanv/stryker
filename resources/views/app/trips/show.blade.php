<x-dashboard-layout pageTitle="Detalles de viaje">

	<x-slot name="helperLinks">
		<form action="{{ route('export-to-pdf', $trip) }}" method="post">
			@csrf
			<button type="submit" class="btn btn-success">
				<i class="fa fa-file-pdf fa-xs me-2"></i>
				Exportar a PDF
			</button>
		</form>
	</x-slot>

	<x-trip-form title="Información general" type="update" :trip="$trip" class="mb-3" />
	<x-trip-drivers-form title="Conductor y vehículo" :trip="$trip" class="mb-3" />
	<x-trip-passengers-form title="Agregar pasajeros" :trip="$trip" />
</x-dashboard-layout>