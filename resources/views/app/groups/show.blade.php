<x-dashboard-layout pageTitle="Detalles de grupo">
	<x-slot name="helperLinks">
		<form action="{{ route('export-group-to-pdf', $group) }}" method="post">
			@csrf
			<button type="submit" class="btn btn-success">
				<i class="fa fa-file-pdf fa-xs me-2"></i>
				Exportar a PDF
			</button>
		</form>
	</x-slot>
	<x-group-form :group="$group" type="update" class="mb-3" />
	<x-trips-list :trips="$trips" />
</x-dashboard-layout>