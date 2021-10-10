<x-trip-pdf-layout title="{{ $group->name }}">
@foreach($trips as $key => $trip)
	<h3>Viaje #{{ $key + 1 }}</h3>
	<x-trip-pdf :trip="$trip" />
	<hr>
@endforeach
</x-trip-pdf-layout>