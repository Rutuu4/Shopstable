<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shopstable') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"
        integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

</head>
<style>
    .text-truncate {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        /* truncate to 4 lines */
        -webkit-line-clamp: 4;
    }
</style>

<body>

    {{-- <div class="py-4 px-24 flex justify-between border-b-4 ">
        <a href="http://{{ tenant('domain') }}/pageBuilder/{{ $id }}">
            <x-button id="btn2">Web Builder
            </x-button>
        </a>
    </div> --}}

    <header class="text-gray-600 body-font">
        <div class="flex justify-between items-center ">
            <div class="flex flex-wrap p-5 flex-col md:flex-row items-center">
                <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2"
                        class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <a href="http://{{ tenant('domain') }}/">
                        <span class="ml-3 text-xl">Shopstable</span>
                    </a>
                </a>
                <script>
                    var count = 0;
                    var shopping_item_count = {!! json_encode($purchase_product_count) !!};
                </script>

                @if (!empty($navbar))
                    <div
                        class="md:mr-auto md:ml-4 md:py-1 md:pl-4  md:border-gray-400 flex flex-wrap text-base justify-center">
                        @foreach ($navbar as $item)
                            <a href={{ $item->nav_item_link }} class="mx-2">
                                {{ $item->nav_item_name }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-2">
                {{-- @if ($user_id == null) --}}
                @if (1 == 1)
                    <a class="inline-flex items-center border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0"
                        href="http://{{ request()->getHttpHost() }}/customer/login">
                        Login
                    </a>
                    <a class="inline-flex items-center border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0"
                        href="http://{{ request()->getHttpHost() }}/customer/register">
                        Register
                    </a>
                @endif


                <div class="flex items-center">
                    <a href="http://{{ tenant('domain') }}/shopping_cart">
                        <img src="/Icons/cart.svg" class='w-5' alt="">
                    </a>

                    {{-- @if ($purchase_product_count > 0) --}}
                    <div id="cart_count"
                        class="w-5 h-5 text-xs -mt-5 bg-green-400/90 rounded-full mx-auto text-white p-1 flex items-center justify-center">
                        {{ $purchase_product_count }}</div>

                    <a href="http://{{ tenant('domain') }}/shipping">
                        <img src="/Icons/order_list.svg" class='w-5 ml-2' alt="">
                    </a>
                    {{-- @endif --}}
                    <div class="py-2 px-5">
                        <x-button onclick="window.location.reload(history.back())">
                            {{ __('Back') }}
                        </x-button>
                    </div>
                </div>
            </div>

        </div>
    </header>



    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-5 px-4 sm:py-5 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-xl font-bold text-gray-900">{{ $categorytitle->title }} </h2>
            <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($categoryDetail as $product)
                    <div>
                        <a href="http://{{ tenant('domain') }}/product/detail/{{ $product->productId }}">
                            <div class="relative">
                                <div class="relative w-full h-40 rounded-lg overflow-hidden">
                                    <img class="bg-cover" src="/{{ $product->imageName }}"
                                        alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                        class="w-full h-full object-center object-cover">
                                </div>
                                <div class="relative mt-4">
                                    <div class="flex justify-between">
                                        <h3 class="text-sm font-medium text-gray-900">{{ $product->product_title }}
                                        </h3>
                                        <p class="relative text-sm ">{{ $theme->globle_currency }}
                                            {{ $product->price ? sprintf('%0.2f', $product->price) : 0.0 }}
                                        </p>
                                    </div>
                                    <p class="text-truncate category_description  mt-1 text-sm text-gray-500">
                                        {{ $product->shortDescription }}</p>
                                </div>
                                <div
                                    class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                                    <div aria-hidden="true"
                                        class="absolute inset-x-0 bottom-0 h-36 hover:bg-gradient-to-t">
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                    <script>
                        let category_detail = {!! json_encode($categoryDetail->toArray()) !!};
                        $(document).ready(function() {
                            $('.category_description').html(category_detail['data'][0]['description'])
                            console.log(category_detail['data'][0]['description']);
                        })
                    </script>

                    <!-- More products... -->
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://www.jsdelivr.com/package/npm/tailwindcss-line-clamp"></script>
</body>

</html>
