<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bus Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">Bus Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-gray-600">Bus Number:</p>
                                <p class="font-semibold">{{ $bus->bus_number }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Seating Capacity:</p>
                                <p class="font-semibold">{{ $bus->seating_capacity }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Driver Name:</p>
                                <p class="font-semibold">{{ $bus->driver_name }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Departure Location:</p>
                                <p class="font-semibold">{{ $bus->departure_location }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Destination:</p>
                                <p class="font-semibold">{{ $bus->destination }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Departure Time:</p>
                                <p class="font-semibold">{{ $bus->departure_time }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Arrival Time:</p>
                                <p class="font-semibold">{{ $bus->arrival_time }}</p>
                            </div>
                        </div>
                    </div>

                    @if ($bus->image)
                        <div class="mt-6">
                            <h4 class="text-lg font-semibold mb-2">Bus Image</h4>
                            <img src="{{ asset('storage/' . $bus->image) }}" alt="Bus Image" class="max-w-md rounded-lg shadow-md">
                        </div>
                    @endif

                    <div class="mt-6 flex space-x-4">
                        @if(auth()->user()->isAdmin() || auth()->user()->isEmployee())
                            <a href="{{ route('buses.edit', $bus) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit Bus
                            </a>
                            <form action="{{ route('buses.destroy', $bus) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this bus?')">
                                    Delete Bus
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('buses.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

