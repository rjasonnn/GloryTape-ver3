<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href={{asset("assets/components-v2.css")}}>
    <script src={{asset("assets/components-v2.js")}}></script>
    <script src={{asset("assets/alpine.js")}} defer=""></script>
</head>
<body class="antialiased font-sans bg-gray-200 overflow-hidden">
{{--<div class="" style="">--}}
{{--    <div class="min-h-[700px] flex">--}}
{{--        <div class="w-full bg-white flex items-center justify-center px-4 sm:px-6 lg:px-8">--}}

{{--            <div class="w-72">--}}
                <div x-data="{ open: false }" @keydown.window.escape="open = false">
                    <div class="flex items-end p-4">
                        <button type="button"
                                class="relative z-10 w-full bg-black bg-opacity-75 py-2 px-4 rounded-md text-sm text-gray-200 opacity-100 group-hover:opacity-100 focus:opacity-100"
                                @click="open = true">Quick View<span class="sr-only"></span>
                        </button>
                    </div>

                    <div x-show="open" class="fixed z-10 inset-0 overflow-y-auto" x-ref="dialog" aria-modal="true"
                         style="display: none;">
                        <div class="flex min-h-screen text-center md:block md:px-2 lg:px-4" style="font-size: 0;">
                            <div x-show="open" x-transition:enter="ease-out duration-300"
                                 x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 x-description="Background overlay, show/hide based on modal state."
                                 class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity md:block"
                                 @click="open = false" aria-hidden="true" style="display: none;"></div>
                            <!-- This element is to trick the browser into centering the modal contents. --> <span
                                class="hidden md:inline-block md:align-middle md:h-screen" aria-hidden="true">​</span>
                            <div x-show="open" x-transition:enter="ease-out duration-300"
                                 x-transition:enter-start="opacity-0 translate-y-4 md:translate-y-0 md:scale-95"
                                 x-transition:enter-end="opacity-100 translate-y-0 md:scale-100"
                                 x-transition:leave="ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0 md:scale-100"
                                 x-transition:leave-end="opacity-0 translate-y-4 md:translate-y-0 md:scale-95"
                                 x-description="Modal panel, show/hide based on modal state."
                                 class="flex text-base text-left transform transition w-full md:inline-block md:max-w-2xl md:px-4 md:my-8 md:align-middle lg:max-w-4xl"
                                 style="display: none;">
                                <div class="w-full relative flex items-center bg-white px-4 pt-14 pb-8 overflow-hidden shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                                    <button type="button"
                                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8"
                                            @click="open = false"><span class="sr-only">Close</span>
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                    <div
                                        class="w-full grid grid-cols-1 gap-y-8 gap-x-6 items-start sm:grid-cols-12 lg:items-center lg:gap-x-8">
                                        <!-- list product -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
</body>
</html>
