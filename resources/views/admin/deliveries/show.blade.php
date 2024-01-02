@include('admin.header')

<main class="flex-1">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Delivery Details</h3>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="bg-white p-4 rounded-md mb-4">
                <div>
                    <label class="font-semibold">Driver:</label>
                    <p class="text-gray-800">{{ $delivery->driver }}</p>
                </div>
                <div>
                    <label class="font-semibold">Vehicle:</label>
                    <p class="text-gray-800">{{ $delivery->vehicle }}</p>
                </div>
                <div>
                    <label class="font-semibold">License Plate:</label>
                    <p class="text-gray-800">{{ $delivery->license_plate }}</p>
                </div>
                <div>
                    <label class="font-semibold">Fee:</label>
                    <p class="text-gray-800">{{ $delivery->fee }}</p>
                </div>
                <a href="{{ route('deliveries.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back
                    to Deliveries List</a>
            </div>
        </div>
    </div>
</main>
