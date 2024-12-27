<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Route') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Validation Error!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('routes.update', $route) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="route_name" class="block text-gray-700 text-sm font-bold mb-2">Route Name</label>
                            <input type="text" name="route_name" id="route_name" value="{{ old('route_name', $route->route_name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="departure_location" class="block text-gray-700 text-sm font-bold mb-2">Departure Location</label>
                            <input type="text" name="departure_location" id="departure_location" value="{{ old('departure_location', $route->departure_location) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="destination" class="block text-gray-700 text-sm font-bold mb-2">Destination</label>
                            <input type="text" name="destination" id="destination" value="{{ old('destination', $route->destination) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="distance" class="block text-gray-700 text-sm font-bold mb-2">Distance (km)</label>
                            <input type="number" name="distance" id="distance" step="0.01" value="{{ old('distance', $route->distance) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Duration</label>
                            <div class="flex items-center">
                                <div class="mr-4">
                                    <label for="duration_hours" class="block text-gray-700 text-sm mb-1">Hours</label>
                                    <input type="number" name="duration_hours" id="duration_hours" min="0" value="{{ old('duration_hours', $route->duration_hours) }}" class="shadow appearance-none border rounded w-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div>
                                    <label for="duration_minutes" class="block text-gray-700 text-sm mb-1">Minutes</label>
                                    <input type="number" name="duration_minutes" id="duration_minutes" min="0" max="59" value="{{ old('duration_minutes', $route->duration_minutes) }}" class="shadow appearance-none border rounded w-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Route
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

