<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Route Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">{{ $route->route_name }}</h3>
                    <p><strong>Departure:</strong> {{ $route->departure_location }}</p>
                    <p><strong>Destination:</strong> {{ $route->destination }}</p>
                    <p><strong>Distance:</strong> {{ $route->distance }} km</p>
                    <p><strong>Duration:</strong> {{ $route->duration }}</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('routes.edit', $route) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Edit</a>
                        <form action="{{ route('routes.destroy', $route) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="return confirm('Are you sure you want to delete this route?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

