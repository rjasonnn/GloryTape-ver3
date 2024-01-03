@include('admin.header')

<main class="flex-1">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Delivery</h3>
                <div class="mt-3 sm:mt-0 sm:ml-4">
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <form action="{{ route('deliveries.update', $delivery->id) }}" method="POST"
                class="max-w bg-white p-6 rounded-md">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="driver" class="block text-sm font-medium text-gray-700">Driver:</label>
                    <input type="text" name="driver" id="driver" value="{{ $delivery->driver }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="vehicle" class="block text-sm font-medium text-gray-700">Vehicle:</label>
                    <input type="text" name="vehicle" id="vehicle" value="{{ $delivery->vehicle }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="license_plate" class="block text-sm font-medium text-gray-700">License Plate:</label>
                    <input type="text" name="license_plate" id="license_plate" value="{{ $delivery->license_plate }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="fee" class="block text-sm font-medium text-gray-700">Fee:</label>
                    <input type="number" name="fee" id="fee" value="{{ $delivery->fee }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    update Delivery
                </button>
            </form>
        </div>
    </div>
</main>
@include('admin.footer')