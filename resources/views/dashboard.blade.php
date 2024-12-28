<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(auth()->user()->isAdmin())
                        <h3 class="text-lg font-semibold mb-4">Admin Dashboard</h3>
                        <ul class="list-disc list-inside">
                            <li><a href="{{ route('buses.index') }}" class="text-blue-600 hover:underline">Manage Buses</a></li>
                            <li><a href="{{ route('routes.index') }}" class="text-blue-600 hover:underline">Manage Routes</a></li>
                            <li><a href="{{ route('schedules.index') }}" class="text-blue-600 hover:underline">Manage Schedules</a></li>
                            <li><a href="#" class="text-blue-600 hover:underline">Manage Users</a></li>
                            <li><a href="#" class="text-blue-600 hover:underline">View Logs</a></li>
                        </ul>
                    @elseif(auth()->user()->isEmployee())
                        <h3 class="text-lg font-semibold mb-4">Employee Dashboard</h3>
                        <ul class="list-disc list-inside">
                            <li><a href="{{ route('buses.index') }}" class="text-blue-600 hover:underline">Manage Buses</a></li>
                            <li><a href="{{ route('routes.index') }}" class="text-blue-600 hover:underline">Manage Routes</a></li>
                            <li><a href="{{ route('schedules.index') }}" class="text-blue-600 hover:underline">Manage Schedules</a></li>
                            <li><a href="{{ route('reservations.index') }}" class="text-blue-600 hover:underline">Manage Reservations</a></li>
                        </ul>
                    @else
                        <h3 class="text-lg font-semibold mb-4">Customer Dashboard</h3>
                        <ul class="list-disc list-inside">
                            <li><a href="{{ route('reservations.index') }}" class="text-blue-600 hover:underline">My Reservations</a></li>
                            <li><a href="{{ route('reservations.create') }}" class="text-blue-600 hover:underline">Make a Reservation</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

