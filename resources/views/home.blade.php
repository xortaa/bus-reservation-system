@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Welcome to Bus Reservation System</h1>
    <p>This is the home page of our Bus Reservation System.</p>
    <a href="{{ route('buses.index') }}" class="btn btn-primary">View Buses</a>
</div>
@endsection

