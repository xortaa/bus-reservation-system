<x-app-layout>
    <header class="bg-blue-500 text-white py-20">
        <div class="container mx-auto text-center px-6">
            <h1 class="text-5xl font-bold mb-4">
                Discover Amazing Destinations
            </h1>
            <p class="text-xl mb-8">
                Experience the journey of a lifetime with Scenic Bus Adventures
            </p>
            <a
                href="#our-routes"
                class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold py-3 px-6 rounded-full text-lg transition duration-300"
                >Explore Our Routes</a
            >
        </div>
    </header>

    <main class="container mx-auto my-12 px-6">
        <section id="our-buses" class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-8">Our Buses</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($buses as $bus)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @if($bus->image)
                    <img
                        src="{{ asset('storage/' . $bus->image) }}"
                        alt="{{ $bus->bus_number }}"
                        class="w-full h-48 object-cover"
                    />
                    @else
                    <div
                        class="w-full h-48 bg-gray-200 flex items-center justify-center"
                    >
                        <span class="text-gray-500">No image available</span>
                    </div>
                    @endif
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">
                            Bus {{ $bus->bus_number }}
                        </h3>
                        <p class="text-gray-600 mb-2">
                            Capacity: {{ $bus->seating_capacity }} seats
                        </p>
                        <p class="text-gray-600">
                            Driver: {{ $bus->driver_name }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <section id="our-routes" class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-8">Our Routes</h2>
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Route Name
                            </th>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Departure
                            </th>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Destination
                            </th>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Distance
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($routes as $route)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-4 px-4">{{ $route->route_name }}</td>
                            <td class="py-4 px-4">
                                {{ $route->departure_location }}
                            </td>
                            <td class="py-4 px-4">{{ $route->destination }}</td>
                            <td class="py-4 px-4">{{ $route->distance }} km</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-8">
                Why Choose Scenic Bus Adventures?
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-bold text-xl mb-4">Comfortable Buses</h3>
                    <p>
                        Travel in style with our modern, air-conditioned buses
                        equipped with comfortable seating and ample legroom.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-bold text-xl mb-4">Scenic Routes</h3>
                    <p>
                        Enjoy breathtaking views and discover hidden gems along
                        our carefully selected scenic routes.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-bold text-xl mb-4">Experienced Drivers</h3>
                    <p>
                        Relax and enjoy your journey with our professional,
                        experienced drivers who prioritize your safety and
                        comfort.
                    </p>
                </div>
            </div>
        </section>

        <section class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-8">
                Upcoming Departures
            </h2>
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Route
                            </th>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Departure
                            </th>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Available Seats
                            </th>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            >
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules->take(5) as $schedule)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-4 px-4">
                                {{ $schedule->route->route_name }}
                            </td>
                            <td class="py-4 px-4">
                                {{ $schedule->departure_date }}
                                {{ $schedule->departure_time }}
                            </td>
                            <td class="py-4 px-4">
                                {{ $schedule->available_seats }}
                            </td>
                            <td class="py-4 px-4">
                                @auth
                                <a
                                    href="{{ route('reservations.create', ['schedule' => $schedule->id]) }}"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded text-sm transition duration-300"
                                    >Book Now</a
                                >
                                @else
                                <a
                                    href="{{ route('login') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-sm transition duration-300"
                                    >Login to Book</a
                                >
                                @endauth
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-8">
                <a
                    href="{{ route('schedules.index') }}"
                    class="text-blue-600 hover:text-blue-800 font-semibold"
                    >View All Schedules</a
                >
            </div>
        </section>
    </main>
</x-app-layout>
