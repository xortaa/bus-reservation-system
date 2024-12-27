<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Bus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('buses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="bus_number" class="block text-gray-700 text-sm font-bold mb-2">Bus Number</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bus_number" name="bus_number" required>
                        </div>
                        <div class="mb-4">
                            <label for="seating_capacity" class="block text-gray-700 text-sm font-bold mb-2">Seating Capacity</label>
                            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="seating_capacity" name="seating_capacity" required>
                        </div>
                        <div class="mb-4">
                            <label for="driver_name" class="block text-gray-700 text-sm font-bold mb-2">Driver Name</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="driver_name" name="driver_name" required>
                        </div>
                        <div class="mb-4">
                            <label for="departure_location" class="block text-gray-700 text-sm font-bold mb-2">Departure Location</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="departure_location" name="departure_location" required>
                        </div>
                        <div class="mb-4">
                            <label for="destination" class="block text-gray-700 text-sm font-bold mb-2">Destination</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="destination" name="destination" required>
                        </div>
                        <div class="mb-4">
                            <label for="departure_time" class="block text-gray-700 text-sm font-bold mb-2">Departure Time</label>
                            <input type="time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="departure_time" name="departure_time" required>
                        </div>
                        <div class="mb-4">
                            <label for="arrival_time" class="block text-gray-700 text-sm font-bold mb-2">Arrival Time</label>
                            <input type="time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="arrival_time" name="arrival_time" required>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Bus Image</label>
                            <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" name="image">
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Add Bus
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

