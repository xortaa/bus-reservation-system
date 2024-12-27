<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Reservation') }}
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

                    <form action="{{ route('reservations.update', $reservation) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="schedule_id" class="block text-gray-700 text-sm font-bold mb-2">Schedule</label>
                            <select name="schedule_id" id="schedule_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">Select a schedule</option>
                                @foreach ($schedules as $schedule)
                                    <option value="{{ $schedule->schedule_id }}" {{ old('schedule_id', $reservation->schedule_id) == $schedule->schedule_id ? 'selected' : '' }}>
                                        {{ $schedule->bus->bus_number }} - {{ $schedule->route->route_name }} ({{ $schedule->departure_date }} {{ $schedule->departure_time }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="passenger_name" class="block text-gray-700 text-sm font-bold mb-2">Passenger Name</label>
                            <input type="text" name="passenger_name" id="passenger_name" value="{{ old('passenger_name', $reservation->passenger_name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="contact_information" class="block text-gray-700 text-sm font-bold mb-2">Contact Information</label>
                            <input type="text" name="contact_information" id="contact_information" value="{{ old('contact_information', $reservation->contact_information) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="seat_number" class="block text-gray-700 text-sm font-bold mb-2">Seat Number</label>
                            <input type="text" name="seat_number" id="seat_number" value="{{ old('seat_number', $reservation->seat_number) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="reservation_date" class="block text-gray-700 text-sm font-bold mb-2">Reservation Date</label>
                            <input type="date" name="reservation_date" id="reservation_date" value="{{ old('reservation_date', $reservation->reservation_date) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="reserved" {{ old('status', $reservation->status) == 'reserved' ? 'selected' : '' }}>Reserved</option>
                                <option value="canceled" {{ old('status', $reservation->status) == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                <option value="boarded" {{ old('status', $reservation->status) == 'boarded' ? 'selected' : '' }}>Boarded</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Reservation
                            </button>
                            <a href="{{ route('reservations.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

