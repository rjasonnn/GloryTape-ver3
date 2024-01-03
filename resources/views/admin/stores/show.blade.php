@include('admin.header')

<main class="flex-1">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Store Details</h3>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="bg-white p-4 rounded-md mb-4">
                <div class="mb-2">
                    <label class="font-semibold">Name:</label>
                    <p class="text-gray-800">{{ $store->name }}</p>
                </div>
                <div class="mb-2">
                    <label class="font-semibold">Region:</label>
                    <p class="text-gray-800">{{ $store->region }}</p>
                </div>
                <div class="mb-2">
                    <label class="font-semibold">Phone:</label>
                    <p class="text-gray-800">{{ $store->phone }}</p>
                </div>
                <a href="{{ route('stores.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Back to Stores List</a>
            </div>
        </div>
    </div>
</main>
@include('admin.footer')
