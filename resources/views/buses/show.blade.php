@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bus Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $bus->bus_number }}</h5>
            <p class="card-text">
                <strong>Seating Capacity:</strong> {{ $bus->seating_capacity }}<br>
                <strong>Driver Name:</strong> {{ $bus->driver_name }}<br>
                <strong>Departure Location:</strong> {{ $bus->departure_location }}<br>
                <strong>Destination:</strong> {{ $bus->destination }}<br>
                <strong>Departure Time:</strong> {{ $bus->departure_time }}<br>
                <strong>Arrival Time:</strong> {{ $bus->arrival_time }}
            </p>
            @if ($bus->image)
                <img src="{{ asset('storage/' . $bus->image) }}" alt="Bus Image" class="img-fluid mt-3" style="max-width: 300px;">
            @endif
        </div>
    </div>
    <a href="{{ route('buses.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection

