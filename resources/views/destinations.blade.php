<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Popular Destinations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold mb-6">Explore Our Top Destinations</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('images/destination-1.jpg') }}" alt="Mountain Vista" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h4 class="font-bold text-xl mb-2">Mountain Vista</h4>
                                <p class="text-gray-700">Experience breathtaking views of majestic mountains and serene lakes.</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('images/destination-2.jpg') }}" alt="Coastal Paradise" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h4 class="font-bold text-xl mb-2">Coastal Paradise</h4>
                                <p class="text-gray-700">Relax on pristine beaches and explore charming coastal towns.</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('images/destination-3.jpg') }}" alt="Historic City Tour" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h4 class="font-bold text-xl mb-2">Historic City Tour</h4>
                                <p class="text-gray-700">Discover the rich history and culture of our most popular city destinations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

