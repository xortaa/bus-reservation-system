<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Please fix the following errors:</strong>
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('schedules.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="bus_id" class="block text-gray-700 text-sm font-bold mb-2">Bus</label>
                            <select name="bus_id" id="bus_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">Select a bus</option>
                                @foreach ($buses as $bus)
                                    <option value="{{ $bus->bus_id }}" {{ old('bus_id') == $bus->bus_id ? 'selected' : '' }}>
                                        {{ $bus->bus_number }} (Capacity: {{ $bus->seating_capacity }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="route_id" class="block text-gray-700 text-sm font-bold mb-2">Route</label>
                            <select name="route_id" id="route_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">Select a route</option>
                                @foreach ($routes as $route)
                                    <option value="{{ $route->route_id }}" {{ old('route_id') == $route->route_id ? 'selected' : '' }}>
                                        {{ $route->route_name }} ({{ $route->departure_location }} to {{ $route->destination }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="departure_date" class="block text-gray-700 text-sm font-bold mb-2">Departure Date</label>
                            <input type="date" name="departure_date" id="departure_date" value="{{ old('departure_date') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="departure_time" class="block text-gray-700 text-sm font-bold mb-2">Departure Time</label>
                            <input type="time" name="departure_time" id="departure_time" value="{{ old('departure_time') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="available_seats" class="block text-gray-700 text-sm font-bold mb-2">Available Seats</label>
                            <input type="number" name="available_seats" id="available_seats" value="{{ old('available_seats') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Create Schedule
                            </button>
                            <a href="{{ route('schedules.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

