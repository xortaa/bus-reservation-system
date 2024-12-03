@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buses</h1>
    <a href="{{ route('buses.create') }}" class="btn btn-primary mb-3">Add New Bus</a>

    <form action="{{ route('buses.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search buses..." value="{{ $search }}">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Bus Number</th>
                <th>Driver Name</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buses as $bus)
            <tr>
                <td>{{ $bus->bus_number }}</td>
                <td>{{ $bus->driver_name }}</td>
                <td>{{ $bus->departure_location }}</td>
                <td>{{ $bus->destination }}</td>
                <td>
                    <a href="{{ route('buses.show', $bus) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('buses.edit', $bus) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('buses.destroy', $bus) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $buses->links() }}
</div>
@endsection

