@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Bus</h1>
    <form action="{{ route('buses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="bus_number" class="form-label">Bus Number</label>
            <input type="text" class="form-control" id="bus_number" name="bus_number" required>
        </div>
        <div class="mb-3">
            <label for="seating_capacity" class="form-label">Seating Capacity</label>
            <input type="number" class="form-control" id="seating_capacity" name="seating_capacity" required>
        </div>
        <div class="mb-3">
            <label for="driver_name" class="form-label">Driver Name</label>
            <input type="text" class="form-control" id="driver_name" name="driver_name" required>
        </div>
        <div class="mb-3">
            <label for="departure_location" class="form-label">Departure Location</label>
            <input type="text" class="form-control" id="departure_location" name="departure_location" required>
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Destination</label>
            <input type="text" class="form-control" id="destination" name="destination" required>
        </div>
        <div class="mb-3">
            <label for="departure_time" class="form-label">Departure Time</label>
            <input type="time" class="form-control" id="departure_time" name="departure_time" required>
        </div>
        <div class="mb-3">
            <label for="arrival_time" class="form-label">Arrival Time</label>
            <input type="time" class="form-control" id="arrival_time" name="arrival_time" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Bus Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Add Bus</button>
    </form>
</div>
@endsection

