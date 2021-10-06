<x-dashboard-layout pageTitle="Detalles de viaje">
	<div class="row">
		<div class="col-12 col-sm-6">
			<x-trip-form title="Información general" type="update" :trip="$trip" class="mb-3" />
			<x-trip-drivers-form title="Conductor y vehículo" :trip="$trip" />
		</div>
		<div class="col-12 col-sm-6">
			<x-trip-passengers-form title="Agregar pasajeros" :trip="$trip" />
		</div>
	</div>
</x-dashboard-layout>