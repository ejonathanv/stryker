<x-dashboard-layout pageTitle="Detalles de viaje">

	<x-slot name="helperLinks">
		<a href="#" class="btn btn-success">
			<i class="fa fa-download fa-xs me-2"></i>
			Descargar
		</a>
	</x-slot>

	<x-trip-form title="Información general" type="update" :trip="$trip" class="mb-3" />
	<x-trip-drivers-form title="Conductor y vehículo" :trip="$trip" class="mb-3" />
	<x-trip-passengers-form title="Agregar pasajeros" :trip="$trip" />
</x-dashboard-layout>