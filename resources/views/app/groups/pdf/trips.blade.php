<x-trip-pdf-layout title="{{ $group->name }}">
	@foreach($trips as $key => $trip)
		<div class="@if(!$loop->first) page_break @endif">
			<h3 style="margin: 0">Viaje #{{ $key + 1 }}</h3>
			<x-trip-pdf :trip="$trip" />
		</div>
	@endforeach
</x-trip-pdf-layout>