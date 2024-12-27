<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservation Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">Reservation Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-gray-600">Passenger Name:</p>
                                <p class="font-semibold">{{ $reservation->passenger_name }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Contact Information:</p>
                                <p class="font-semibold">{{ $reservation->contact_information }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Seat Number:</p>
                                <p class="font-semibold">{{ $reservation->seat_number }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Reservation Date:</p>
                                <p class="font-semibold">{{ $reservation->reservation_date }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Status:</p>
                                <p class="font-semibold">{{ ucfirst($reservation->status) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">Schedule Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-gray-600">Bus Number:</p>
                                <p class="font-semibold">{{ $reservation->schedule->bus->bus_number }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Route:</p>
                                <p class="font-semibold">{{ $reservation->schedule->route->route_name }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Departure Date:</p>
                                <p class="font-semibold">{{ $reservation->schedule->departure_date }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Departure Time:</p>
                                <p class="font-semibold">{{ $reservation->schedule->departure_time }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('reservations.edit', $reservation) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit Reservation
                        </a>
                        <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this reservation?')">
                                Delete Reservation
                            </button>
                        </form>
                        <a href="{{ route('reservations.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

