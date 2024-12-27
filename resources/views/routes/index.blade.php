<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Routes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(auth()->user()->isAdmin() || auth()->user()->isEmployee())
                        <a href="{{ route('routes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                            Create New Route
                        </a>
                    @endif

                    @if($routes->isEmpty())
                        <p class="text-gray-600">No routes available.</p>
                    @else
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Route Name
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Departure
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Destination
                                    </th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($routes as $route)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $route->route_name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $route->departure_location }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $route->destination }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <a href="{{ route('routes.show', $route) }}" class="text-blue-600 hover:text-blue-900 mr-2">View</a>
                                            @if(auth()->user()->isAdmin() || auth()->user()->isEmployee())
                                                <a href="{{ route('routes.edit', $route) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">Edit</a>
                                                <form action="{{ route('routes.destroy', $route) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this route?')">Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <div class="mt-4">
                        {{ $routes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

