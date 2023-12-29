@include('admin.header')

<main class="flex-1">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Create Transaction</h3>
                <div class="mt-3 sm:mt-0 sm:ml-4">
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->

            <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data"
                  class="space-y-8 divide-y divide-gray-200">
                @csrf
                @method('POST')
                @if ($errors->any())
                    <div class="bg-red-400 p-4 rounded-lg text-black">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <!-- display all error messages -->
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            <!-- end loop -->
                        </ul>
                    </div>
                @endif
                <div class="space-y-8 divide-y divide-gray-200">
                    <div>
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                            <div class="sm:col-span-6">
                                <label for="invoice" class="block text-sm font-medium text-gray-700"> Invoice </label>
                                <div class="bg-white p7 rounded mx-auto">
                                    <div x-data="dataFileDnD()"
                                         class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                                        <div x-ref="dnd"
                                             class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                                            <input accept="*" type="file" name="invoice" id="image_path"
                                                   class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                                                   @change="addFiles($event)"
                                                   @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                                                   @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                                   @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                                   title=""/>

                                            <div class="flex flex-col items-center justify-center py-10 text-center">
                                                <svg class="w-6 h-6 mr-1 text-current-50"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <p class="m-0">Drag your files here or click in this area.</p>
                                            </div>
                                        </div>

                                        <template x-if="files.length > 0">
                                            <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6"
                                                 @drop.prevent="drop($event)"
                                                 @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                                <template x-for="(_, index) in Array.from({ length: files.length })">
                                                    <div
                                                        class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                                        style="padding-top: 100%;" @dragstart="dragstart($event)"
                                                        @dragend="fileDragging = null"
                                                        :class="{'border-blue-600': fileDragging == index}"
                                                        draggable="true"
                                                        :data-index="index">
                                                        <button
                                                            class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                                            type="button" @click="remove(index)">
                                                            <svg class="w-4 h-4 text-gray-700"
                                                                 xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                            </svg>
                                                        </button>
                                                        <template x-if="files[index].type.includes('audio/')">
                                                            <svg
                                                                class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                                            </svg>
                                                        </template>
                                                        <template
                                                            x-if="files[index].type.includes('application/') || files[index].type === ''">
                                                            <svg
                                                                class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                            </svg>
                                                        </template>
                                                        <template x-if="files[index].type.includes('image/')">
                                                            <img
                                                                class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                                x-bind:src="loadFile(files[index])"/>
                                                        </template>
                                                        <template x-if="files[index].type.includes('video/')">
                                                            <video
                                                                class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                                <fileDragging x-bind:src="loadFile(files[index])"
                                                                              type="video/mp4">
                                                                </fileDragging>
                                                            </video>
                                                        </template>

                                                        <div
                                                            class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                            <span class="w-full font-bold text-gray-900 truncate"
                                                                  x-text="files[index].name">Loading</span>
                                                            <span class="text-xs text-gray-900"
                                                                  x-text="humanFileSize(files[index].size)">...</span>
                                                        </div>

                                                        <div
                                                            class="absolute inset-0 z-40 transition-colors duration-300"
                                                            @dragenter="dragenter($event)"
                                                            @dragleave="fileDropping = null"
                                                            :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}">
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="customer" class="block text-sm font-medium text-gray-700">Customer</label>
                                <select id="customer" name="customer_id"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="delivery" class="block text-sm font-medium text-gray-700">Delivery</label>
                                <select id="delivery" name="delivery_id"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach ($deliveries as $delivery)
                                        <option value="{{ $delivery->id }}">{{ $delivery->driver }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="date" class="block text-sm font-medium text-gray-700"> Date </label>
                                <div class="mt-1">
                                    <input type="date" name="date" id="date"
                                           class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="pt-8">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 ">Products</h3>
                        <div class="mt-3 ">
                            <button type="button" data-toggle="modal" data-target="#productModal"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Add Product
                            </button>

                            <!-- make button with modal, modal will show list of products -->

                        </div>
                    </div>


                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div id="products-container">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">
                                        Product
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                        Quantity
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                        Price
                                    </th>
                                    <th scope="col" class="relative py-3 pl-3 "><span class="sr-only">View</span></th>
                                    <th scope="col" class="relative py-3 pl-3 "><span class="sr-only">Edit</span></th>
                                    <th scope="col" class="relative py-3 pl-3 "><span class="sr-only">Delete</span></th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="button" onclick="window.location='{{ route('catalogs.index') }}'"
                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button type="submit"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>

            <!-- /End replace -->
        </div>
    </div>
</main>



<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/create-file-list"></script>

<script>
    $(document).ready(function () {
        // Fetch products for modal
        $('#productModal').on('show.bs.modal', function () {
            $.ajax({
                url: '/api/products', // Make sure to include the correct path to your route
                success: function (products) {
                    console.log(products);
                    // Populate modal content with product options (e.g., a list)
                    let productList = '';
                    $.each(products, function (i, product) {
                        // productList += '<li data-product-id="' + product.id + '">' + product.name + '</li>';
                        productList += '<a data-product-id="' + product.id + '">' + product.name + '</a><br>';
                    });
                    // $('#productModal .modal-body').html('<ul>' + productList + '</ul>');
                    $('#productModal .modal-body').html('<div>' + productList + '</div>');
                }
            });
        });

        // Handle product selection
        $('#productModal div').on('click', 'a', function (event) {
            event.preventDefault(); // Add this line to prevent default form submission
            const productId = $(this).data('product-id');
            const productName = $(this).text();

            // Check if product is already in the list
            const existingProduct = $('#products-container table tbody').find('.product-item[data-product-id="' + productId + '"]');
            if (existingProduct.length) {
                // alert('This product is already in the list.');
                return;
            }

            // Create product item element
            const productItem = $('' +
                '<tr class="product-item" data-product-id="' + productId + '">' +
                '<td>' + productName + '</td>' +
                '<input type="hidden" name="products[' + productId + '][product_id]" value=' + productId + '>' +
                '<td><input type="number" name="products[' + productId + '][quantity]" value="1" class="form-control"></td>' +
                '<td><input type="number" name="products[' + productId + '][price]" class="form-control"></td>' +
                '<td><button type="button" class="btn btn-danger remove-product">Remove</button></td>' +
                '</tr>');

            // Append to products container
            $('#products-container table tbody').append(productItem);

            // Close modal
            $('#productModal').modal('hide');
        });

// Handle product removal
        $('#products-container').on('click', '.remove-product', function () {
            $(this).closest('.product-item').remove();
        });
    });
</script>

<script>
    function dataFileDnD() {
        return {
            files: [],
            fileDragging: null,
            fileDropping: null,
            humanFileSize(size) {
                const i = Math.floor(Math.log(size) / Math.log(1024));
                return (
                    (size / Math.pow(1024, i)).toFixed(2) * 1 +
                    " " +
                    ["B", "kB", "MB", "GB", "TB"][i]
                );
            },
            remove(index) {
                let files = [...this.files];
                files.splice(index, 1);

                this.files = createFileList(files);
            },
            drop(e) {
                let removed, add;
                let files = [...this.files];

                removed = files.splice(this.fileDragging, 1);
                files.splice(this.fileDropping, 0, ...removed);

                this.files = createFileList(files);

                this.fileDropping = null;
                this.fileDragging = null;
            },
            dragenter(e) {
                let targetElem = e.target.closest("[draggable]");

                this.fileDropping = targetElem.getAttribute("data-index");
            },
            dragstart(e) {
                this.fileDragging = e.target
                    .closest("[draggable]")
                    .getAttribute("data-index");
                e.dataTransfer.effectAllowed = "move";
            },
            loadFile(file) {
                const preview = document.querySelectorAll(".preview");
                const blobUrl = URL.createObjectURL(file);

                preview.forEach(elem => {
                    elem.onload = () => {
                        URL.revokeObjectURL(elem.src); // free memory
                    };
                });

                return blobUrl;
            },
            addFiles(e) {
                const files = createFileList([...this.files], [...e.target.files]);
                this.files = files;
                this.form.formData.files = [...files];
            }
        };
    }
</script>

@include('admin.footer')
