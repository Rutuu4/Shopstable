<html>

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

<body class="globle_theme_attach">
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
                    @if (!($_COOKIE['customer_token'] ?? null) == null)
                        <form class='mt-4 inline-flex items-center'
                            action="http://{{ request()->getHttpHost() }}/customer/logout" method="POST">
                            @csrf
                            <button
                                class="border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0"
                                type="submit">Logout</button>
                        </form>
                    @endif

                    @if (($_COOKIE['customer_token'] ?? null) == null)
                        <a class="inline-flex items-center border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0"
                            href="http://{{ request()->getHttpHost() }}/customer/login">
                            Login
                        </a>
                        <a class="inline-flex items-center border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0"
                            href="http://{{ request()->getHttpHost() }}/customer/register">
                            Register
                        </a>
                    @endif
                @endif


                <div class="flex items-center">
                    <a href="http://{{ tenant('domain') }}/shopping_cart">
                        <img src="/Icons/cart.svg" class='w-5' alt="">
                    </a>

                        <div id="cart_count"
                            class="w-5 h-5 text-xs -mt-5 bg-green-400/90 rounded-full mx-auto text-white p-1 flex items-center justify-center">
                            {{ $purchase_product_count }}</div>
                            
                    <div class="py-2 px-5">
                        <x-button onclick="history.back()">
                            {{ __('Back') }}
                        </x-button>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <div class="bg-gray-50">
        <!--
            Mobile menu

            Off-canvas menu for mobile, show/hide based on off-canvas menu state.
          -->
        <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
            <!--
              Off-canvas menu overlay, show/hide based on off-canvas menu state.

              Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

            <!--
              Off-canvas menu, show/hide based on off-canvas menu state.

              Entering: "transition ease-in-out duration-300 transform"
                From: "-translate-x-full"
                To: "translate-x-0"
              Leaving: "transition ease-in-out duration-300 transform"
                From: "translate-x-0"
                To: "-translate-x-full"
            -->
            <div class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto">
                <div class="px-4 pt-5 pb-2 flex">
                    <button type="button"
                        class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400">
                        <span class="sr-only">Close menu</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Links -->
                <div class="mt-2">
                    <div class="border-b border-gray-200">
                        <div class="-mb-px flex px-4 space-x-8" aria-orientation="horizontal" role="tablist">
                            <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
                            <button id="tabs-1-tab-1"
                                class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium"
                                aria-controls="tabs-1-panel-1" role="tab" type="button">Women</button>

                            <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
                            <button id="tabs-1-tab-2"
                                class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium"
                                aria-controls="tabs-1-panel-2" role="tab" type="button">Men</button>
                        </div>
                    </div>

                    <!-- 'Women' tab panel, show/hide based on tab state. -->
                    <div id="tabs-1-panel-1" class="px-4 pt-10 pb-6 space-y-12" aria-labelledby="tabs-1-tab-1"
                        role="tabpanel" tabindex="0">
                        <div class="grid grid-cols-1 items-start gap-y-10 gap-x-6">
                            <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                                <div>
                                    <p id="mobile-featured-heading-0" class="font-medium text-gray-900">Featured</p>
                                    <ul role="list" aria-labelledby="mobile-featured-heading-0" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Sleep </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Swimwear </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Underwear </a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p id="mobile-categories-heading" class="font-medium text-gray-900">Categories</p>
                                    <ul role="list" aria-labelledby="mobile-categories-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Basic Tees </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Artwork Tees </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Bottoms </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Underwear </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Accessories </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                                <div>
                                    <p id="mobile-collection-heading" class="font-medium text-gray-900">Collection</p>
                                    <ul role="list" aria-labelledby="mobile-collection-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Everything </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Core </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> New Arrivals </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Sale </a>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <p id="mobile-brand-heading" class="font-medium text-gray-900">Brands</p>
                                    <ul role="list" aria-labelledby="mobile-brand-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Full Nelson </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> My Way </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Re-Arranged </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Counterfeit </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Significant Other </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 'Men' tab panel, show/hide based on tab state. -->
                    <div id="tabs-1-panel-2" class="px-4 pt-10 pb-6 space-y-12" aria-labelledby="tabs-1-tab-2"
                        role="tabpanel" tabindex="0">
                        <div class="grid grid-cols-1 items-start gap-y-10 gap-x-6">
                            <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                                <div>
                                    <p id="mobile-featured-heading-1" class="font-medium text-gray-900">Featured</p>
                                    <ul role="list" aria-labelledby="mobile-featured-heading-1" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Casual </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Boxers </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Outdoor </a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p id="mobile-categories-heading" class="font-medium text-gray-900">Categories</p>
                                    <ul role="list" aria-labelledby="mobile-categories-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Artwork Tees </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Pants </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Accessories </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Boxers </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Basic Tees </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                                <div>
                                    <p id="mobile-collection-heading" class="font-medium text-gray-900">Collection</p>
                                    <ul role="list" aria-labelledby="mobile-collection-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Everything </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Core </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> New Arrivals </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Sale </a>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <p id="mobile-brand-heading" class="font-medium text-gray-900">Brands</p>
                                    <ul role="list" aria-labelledby="mobile-brand-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Significant Other </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> My Way </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Counterfeit </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Re-Arranged </a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500"> Full Nelson </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                    <div class="flow-root">
                        <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Company</a>
                    </div>

                    <div class="flow-root">
                        <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Stores</a>
                    </div>
                </div>

                <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                    <div class="flow-root">
                        <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Create an account</a>
                    </div>
                    <div class="flow-root">
                        <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Sign in</a>
                    </div>
                </div>

                <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                    <!-- Currency selector -->
                    <form>
                        <div class="inline-block">
                            <label for="mobile-currency" class="sr-only">Currency</label>
                            <div
                                class="-ml-2 group relative border-transparent rounded-md focus-within:ring-2 focus-within:ring-white">
                                <select id="mobile-currency" name="currency"
                                    class="bg-none border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-gray-700 group-hover:text-gray-800 focus:outline-none focus:ring-0 focus:border-transparent">
                                    <option>CAD</option>

                                    <option>USD</option>

                                    <option>AUD</option>

                                    <option>EUR</option>

                                    <option>GBP</option>
                                </select>
                                <div class="absolute right-0 inset-y-0 flex items-center pointer-events-none">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20" class="w-5 h-5 text-gray-500">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" d="M6 8l4 4 4-4" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <main class="max-w-2xl mx-auto pt-8 pb-24 sm:pt-16 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="px-4 space-y-2 sm:px-0 sm:flex sm:items-baseline sm:justify-between sm:space-y-0">
                <div class="flex sm:items-baseline sm:space-x-4">
                    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Orders</h1>
                    <a href="#" class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:block">View
                        invoice<span aria-hidden="true"> &rarr;</span></a>
                </div>
                <p class="text-sm text-gray-600">Order placed <time datetime="2021-03-22"
                        class="font-medium text-gray-900">March 22, 2021</time></p>
                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:hidden">View
                    invoice<span aria-hidden="true"> &rarr;</span></a>
            </div>
            {{-- {{ $shippings }} --}}

            <!-- Products -->
            <section aria-labelledby="products-heading" class="mt-6">
                <h2 id="products-heading" class="sr-only">Products purchased</h2>
                @foreach ($shippings as $shipping)
                    <div class="space-y-8">
                        <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:border sm:rounded-lg">
                            <div class="py-6 px-4 sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8">
                                <div class="sm:flex lg:col-span-7">
                                    <div
                                        class="flex-shrink-0 w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden sm:aspect-none sm:w-40 sm:h-40">
                                        <img src="{{ $shipping->imageName }}"
                                            alt="Insulated bottle with white base and black snap lid."
                                            class="w-full h-full object-center object-cover sm:w-full sm:h-full">
                                    </div>

                                    <div class="mt-6 sm:mt-0 sm:ml-6">
                                        <h3 class="text-base font-medium text-gray-900">
                                            <a href="#">{{ $shipping->title }}</a>
                                        </h3>
                                        <p class="mt-2 text-sm font-medium text-gray-900">$35.00</p>
                                        <p class="mt-3 text-sm text-gray-500">{{ $shipping->shortDescription }}</p>
                                    </div>
                                </div>

                                <div class="mt-6 lg:mt-0 lg:col-span-5">
                                    <dl class="grid grid-cols-2 gap-6 text-sm">
                                        <div>
                                            <dt class="font-medium text-gray-900">Shipping updates</dt>
                                            <dd class="mt-3 text-gray-500 space-y-3">
                                                <p>{{ $shipping->email }}</p>
                                                {{-- <p>1•••••••••40</p>
                                                <button type="button"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Edit</button> --}}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-900">Order ID</dt>
                                            <dd class="mt-3 text-gray-500 space-y-3">
                                                <p>{{ $shipping->order_id }}</p>
                                                {{-- <p>1•••••••••40</p>
                                                <button type="button"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Edit</button> --}}
                                            </dd>
                                        </div>
                                        <div class="col-span-2">
                                            <dt class="font-medium text-gray-900">Delivery address</dt>
                                            <dd class="mt-3 text-gray-500">
                                                <span class="block">{{ $shipping->address }}</span>
                                                {{-- <span class="block">7363 Cynthia Pass</span>
                                            <span class="block">Toronto, ON N3Y 4H8</span> --}}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 py-6 px-4 sm:px-6 lg:p-8">
                                <h4 class="sr-only">Status</h4>
                                <p class="text-sm font-medium text-gray-900">Preparing to ship on <time
                                        datetime="2021-03-24">March 24, 2021</time></p>
                                <div class="mt-6" aria-hidden="true">
                                    <div class="bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-2 bg-indigo-600 rounded-full"
                                            style="width: calc((1 * 2 + 1) / 8 * 100%)">
                                        </div>
                                    </div>
                                    <div class="hidden sm:grid grid-cols-4 text-sm font-medium text-gray-600 mt-6">
                                        <div class="text-indigo-600">Order placed</div>
                                        <div class="text-center text-indigo-600">Processing</div>
                                        <div class="text-center">Shipped</div>
                                        <div class="text-right">Delivered</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:border sm:rounded-lg">
                            <div class="py-6 px-4 sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8">
                                <div class="sm:flex lg:col-span-7">
                                    <div
                                        class="flex-shrink-0 w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden sm:aspect-none sm:w-40 sm:h-40">
                                        <img src="https://tailwindui.com/img/ecommerce-images/confirmation-page-03-product-02.jpg"
                                            alt="Arm modeling wristwatch with black leather band, white watch face, thin watch hands, and fine time markings."
                                            class="w-full h-full object-center object-cover sm:w-full sm:h-full">
                                    </div>

                                    <div class="mt-6 sm:mt-0 sm:ml-6">
                                        <h3 class="text-base font-medium text-gray-900">
                                            <a href="#">Minimalist Wristwatch</a>
                                        </h3>
                                        <p class="mt-2 text-sm font-medium text-gray-900">$149.00</p>
                                        <p class="mt-3 text-sm text-gray-500">This contemporary wristwatch has a clean,
                                            minimalist look and high quality components.</p>
                                    </div>
                                </div>

                                <div class="mt-6 lg:mt-0 lg:col-span-5">
                                    <dl class="grid grid-cols-2 gap-x-6 text-sm">
                                        <div>
                                            <dt class="font-medium text-gray-900">Delivery address</dt>
                                            <dd class="mt-3 text-gray-500">
                                                <span class="block">Floyd Miles</span>
                                                <span class="block">7363 Cynthia Pass</span>
                                                <span class="block">Toronto, ON N3Y 4H8</span>
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-900">Shipping updates</dt>
                                            <dd class="mt-3 text-gray-500 space-y-3">
                                                <p>f•••@example.com</p>
                                                <p>1•••••••••40</p>
                                                <button type="button"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Edit</button>
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 py-6 px-4 sm:px-6 lg:p-8">
                                <h4 class="sr-only">Status</h4>
                                <p class="text-sm font-medium text-gray-900">Shipped on <time
                                        datetime="2021-03-23">March
                                        23,
                                        2021</time></p>
                                <div class="mt-6" aria-hidden="true">
                                    <div class="bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-2 bg-indigo-600 rounded-full"
                                            style="width: calc((0 * 2 + 1) / 8 * 100%)">
                                        </div>
                                    </div>
                                    <div class="hidden sm:grid grid-cols-4 text-sm font-medium text-gray-600 mt-6">
                                        <div class="text-indigo-600">Order placed</div>
                                        <div class="text-center">Processing</div>
                                        <div class="text-center">Shipped</div>
                                        <div class="text-right">Delivered</div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!-- More products... -->
                    </div>
                @endforeach
            </section>

            <!-- Billing -->
            <section aria-labelledby="summary-heading" class="mt-16">
                <h2 id="summary-heading" class="sr-only">Billing Summary</h2>

                <div class="bg-gray-100 py-6 px-4 sm:px-6 sm:rounded-lg lg:px-8 lg:py-8 ">
                    {{-- <dl class="grid grid-cols-2 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:col-span-7">
                        <div>
                            <dt class="font-medium text-gray-900">Billing address</dt>
                            <dd class="mt-3 text-gray-500">
                                <span class="block">Floyd Miles</span>
                                <span class="block">7363 Cynthia Pass</span>
                                <span class="block">Toronto, ON N3Y 4H8</span>
                            </dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-900">Payment information</dt>
                            <div class="mt-3">
                                <dd class="-ml-4 -mt-4 flex flex-wrap">
                                    <div class="ml-4 mt-4 flex-shrink-0">
                                        <svg aria-hidden="true" width="36" height="24" viewBox="0 0 36 24"
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-auto">
                                            <rect width="36" height="24" rx="4" fill="#224DBA" />
                                            <path
                                                d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z"
                                                fill="#fff" />
                                        </svg>
                                        <p class="sr-only">Visa</p>
                                    </div>
                                    <div class="ml-4 mt-4">
                                        <p class="text-gray-900">Ending with 4242</p>
                                        <p class="text-gray-600">Expires 02 / 24</p>
                                    </div>
                                </dd>
                            </div>
                        </div>
                    </dl> --}}

                    <dl class="mt-8 divide-y divide-gray-200 text-sm lg:mt-0 lg:col-span-5">
                        {{-- <div class="pb-4 flex items-center justify-between">
                            <dt class="text-gray-600">Subtotal</dt>
                            <dd class="font-medium text-gray-900">$72</dd>
                        </div>
                        <div class="py-4 flex items-center justify-between">
                            <dt class="text-gray-600">Shipping</dt>
                            <dd class="font-medium text-gray-900">$5</dd>
                        </div>
                        <div class="py-4 flex items-center justify-between">
                            <dt class="text-gray-600">Tax</dt>
                            <dd class="font-medium text-gray-900">$6.16</dd>
                        </div> --}}
                        <div class="pt-4 flex items-center justify-between">
                            <dt class="font-medium text-gray-900">Order total</dt>
                            <dd class="font-medium text-indigo-600">{{ $shipping->total }}</dd>
                        </div>
                    </dl>
                </div>
            </section>
        </main>

        <footer aria-labelledby="footer-heading" class="bg-white border-t border-gray-200">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-20 grid grid-cols-2 gap-8 sm:gap-y-0 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="grid grid-cols-1 gap-y-10 lg:col-span-2 lg:grid-cols-2 lg:gap-y-0 lg:gap-x-8">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Account</h3>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Manage Account </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Saved Items </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Orders </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Redeem Gift card </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Service</h3>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Shipping &amp; Returns </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Warranty </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> FAQ </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Find a store </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Get in touch </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-y-10 lg:col-span-2 lg:grid-cols-2 lg:gap-y-0 lg:gap-x-8">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Company</h3>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Who we are </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Press </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Careers </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Terms &amp; Conditions </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Privacy </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Connect</h3>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Instagram </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Pinterest </a>
                                </li>

                                <li class="text-sm">
                                    <a href="#" class="text-gray-500 hover:text-gray-600"> Twitter </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-100 py-10 sm:flex sm:items-center sm:justify-between">
                    <div class="flex items-center justify-center text-sm text-gray-500">
                        <p>Shipping to Canada ($CAD)</p>
                        <p class="ml-3 border-l border-gray-200 pl-3">English</p>
                    </div>
                    <p class="mt-6 text-sm text-gray-500 text-center sm:mt-0">&copy; 2021 Clothing Company, Ltd.</p>
                </div>
            </div>
        </footer>
    </div>
    <script>
        var currentColorTheme = {!! json_encode($theme->toArray()) !!};
        let theme = {!! json_encode($theme->toArray()) !!};
        console.log(currentColorTheme['theme_color'], 'currentColorTheme');
        currentColorTheme = currentColorTheme['theme_color'];
        //    change all *-indigo-* with currentColorTheme
        $(".globle_theme_attach").html($(".globle_theme_attach").html().replaceAll('indigo',
            currentColorTheme));
    </script>
</body>

</html>
