@include('admin.header')

<main class="flex-1">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Catalog</h3>
                <div class="mt-3 sm:mt-0 sm:ml-4">
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="bg-white p-4 rounded-md mb-4">
                <img src="{{ asset('storage/' . $catalog->image_path) }}" alt="{{ $catalog->description }}"
                    style="width: 200px;">

                    <div class="mb-2">
                        <label class="font-semibold">Description:</label>
                        <p class="text-gray-800">{{ $catalog->description }}</p>
                    </div>
                    <div class="mb-2">
                        <label class="font-semibold">Start Date:</label>
                        <p class="text-gray-800">{{ $catalog->start_date }}</p>
                    </div>
                    <div class="mb-2">
                        <label class="font-semibold">End Date:</label>
                        <p class="text-gray-800">{{ $catalog->end_date }}</p>
                    </div>

                <a href="{{ route('catalogs.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Back to Catalogs
                </a>
            </div>
        </div>
</main>
@include('admin.footer')