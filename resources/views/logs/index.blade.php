<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application Logs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Recent Logs (Last 100 entries)</h3>
                    <p class="mb-4 text-sm text-gray-600">These logs are visible to both admin and employee users.</p>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-4 border-b text-left">Timestamp</th>
                                    <th class="py-2 px-4 border-b text-left">Level</th>
                                    <th class="py-2 px-4 border-b text-left">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                    @php
                                        $parts = explode('] ', $log);
                                        $timestamp = trim(str_replace(['[', ']'], '', $parts[0] ?? ''));
                                        $level = trim(str_replace(['[', ']'], '', $parts[1] ?? ''));
                                        $message = trim($parts[2] ?? '');
                                    @endphp
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $timestamp }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ strtolower($level) === 'error' ? 'bg-red-100 text-red-800' : 
                                                   (strtolower($level) === 'warning' ? 'bg-yellow-100 text-yellow-800' : 
                                                   'bg-green-100 text-green-800') }}">
                                                {{ $level }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b">{{ $message }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

