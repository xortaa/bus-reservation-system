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
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <strong class="font-bold">Please fix the following errors:</strong>
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('buses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="bus_number" class="block text-gray-700 text-sm font-bold mb-2">Bus Number</label>
                            <input type="text" name="bus_number" id="bus_number" value="{{ old('bus_number') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('bus_number') border-red-500 @enderror" required>
                        </div>

                        <div class="mb-4">
                            <label for="seating_capacity" class="block text-gray-700 text-sm font-bold mb-2">Seating Capacity</label>
                            <input type="number" name="seating_capacity" id="seating_capacity" value="{{ old('seating_capacity') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('seating_capacity') border-red-500 @enderror" required>
                        </div>

                        <div class="mb-4">
                            <label for="driver_name" class="block text-gray-700 text-sm font-bold mb-2">Driver Name</label>
                            <input type="text" name="driver_name" id="driver_name" value="{{ old('driver_name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('driver_name') border-red-500 @enderror" required>
                        </div>

                        <div class="mb-4">
                            <label for="departure_location" class="block text-gray-700 text-sm font-bold mb-2">Departure Location</label>
                            <input type="text" name="departure_location" id="departure_location" value="{{ old('departure_location') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('departure_location') border-red-500 @enderror" required>
                        </div>

                        <div class="mb-4">
                            <label for="destination" class="block text-gray-700 text-sm font-bold mb-2">Destination</label>
                            <input type="text" name="destination" id="destination" value="{{ old('destination') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('destination') border-red-500 @enderror" required>
                        </div>

                        <div class="mb-4">
                            <label for="departure_time" class="block text-gray-700 text-sm font-bold mb-2">Departure Time</label>
                            <input type="time" name="departure_time" id="departure_time" value="{{ old('departure_time') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('departure_time') border-red-500 @enderror" required>
                        </div>

                        <div class="mb-4">
                            <label for="arrival_time" class="block text-gray-700 text-sm font-bold mb-2">Arrival Time</label>
                            <input type="time" name="arrival_time" id="arrival_time" value="{{ old('arrival_time') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('arrival_time') border-red-500 @enderror" required>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Bus Image</label>
                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror" accept="image/*">
                            @error('image')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Add Bus
                            </button>
                            <a href="{{ route('buses.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

