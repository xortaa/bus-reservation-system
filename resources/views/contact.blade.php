<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold mb-6">Get in Touch</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-xl font-semibold mb-4">Contact Information</h4>
                            <p class="mb-2"><strong>Address:</strong> 123 Adventure Road, Tourville, TB 12345</p>
                            <p class="mb-2"><strong>Phone:</strong> (555) 123-4567</p>
                            <p class="mb-2"><strong>Email:</strong> info@scenicbusadventures.com</p>
                            <p class="mb-4"><strong>Hours:</strong> Monday - Friday, 9:00 AM - 5:00 PM</p>
                            <h4 class="text-xl font-semibold mb-4">Follow Us</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="text-blue-600 hover:text-blue-800">Facebook</a>
                                <a href="#" class="text-blue-600 hover:text-blue-800">Twitter</a>
                                <a href="#" class="text-blue-600 hover:text-blue-800">Instagram</a>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold mb-4">Send Us a Message</h4>
                            <form action="#" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                    <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                    <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="mb-4">
                                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message</label>
                                    <textarea name="message" id="message" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                                </div>
                                <div class="flex items-center justify-between">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

