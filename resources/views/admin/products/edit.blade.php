@include('admin.header')

<main class="flex-1">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Product</h3>
                <div class="mt-3 sm:mt-0 sm:ml-4">
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <form action="{{ route('products.update', $product->id) }}" method="POST"
                class="max-w bg-white p-6 rounded-md">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $product->name }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="bahan_id" class="block text-sm font-medium text-gray-700">Bahan:</label>
                    <select name="bahan_id" id="bahan_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($bahans as $bahan)
                            <option value="{{ $bahan->id }}"
                                {{ $product->bahan_id === $bahan->id ? 'selected' : '' }}>{{ $bahan->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="warna_id" class="block text-sm font-medium text-gray-700">Warna:</label>
                    <select name="warna_id" id="warna_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($warnas as $warna)
                            <option value="{{ $warna->id }}"
                                {{ $product->warna_id === $warna->id ? 'selected' : '' }}>{{ $warna->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="ukuran_id" class="block text-sm font-medium text-gray-700">Ukuran:</label>
                    <select name="ukuran_id" id="ukuran_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($ukurans as $ukuran)
                            <option value="{{ $ukuran->id }}"
                                {{ $product->ukuran_id === $ukuran->id ? 'selected' : '' }}>P:{{ $ukuran->length }}m ⨉
                                L:{{ $ukuran->width }}cm, ⨉ T:{{ $ukuran->height }}mm</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update
                    Product</button>
            </form>

        </div>
    </div>
</main>
@include('admin.footer')