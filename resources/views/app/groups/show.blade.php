<x-dashboard-layout pageTitle="Detalles de grupo">
	<x-slot name="helperLinks">
		<a href="#" class="btn btn-success">
			<i class="fa fa-download fa-xs me-2"></i>
			Descargar
		</a>
	</x-slot>
	<x-group-form :group="$group" type="update" class="mb-3" />
	<x-trips-list :trips="$trips" />
</x-dashboard-layout>