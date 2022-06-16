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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script src="/js/app.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js" integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

</head>
<style>
    .truncate-text {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<body class="globle_theme_attach">
    {{-- Toster --}}
    <div class="relative">
        <div class="toast absolute w-fit hidden right-0">
            <div class="toast-content shadow-xl z-10 bg-white px-4 py-2 rounded-xl flex items-center gap-4">
                <img src="/Icons/check.svg" class="bg-green-400/50 p-1 rounded-full"></img>
                <div class="message">
                    <span class="text text-1 toster_text_1"></span>
                    <p class="alert">
                        {{ Session::get('message') }}</p>
                    <span class="text text-2 toster_text_2"></span>
                </div>
            </div>
            {{-- <i class="fa-solid fa-xmark close"></i> --}}
            {{-- 3 second progress bar --}}

        </div>
    </div>

    <div class="bg-white">
        <!--
        Mobile menu

        Off-canvas menu for mobile, show/hide based on off-canvas menu state.
        -->

        <header class="text-gray-600 body-font">
            <div class="flex justify-between items-center ">
                <div class="flex flex-wrap p-5 flex-col md:flex-row items-center">
                    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
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
                        <div class="md:mr-auto md:ml-4 md:py-1 md:pl-4  md:border-gray-400 flex flex-wrap text-base justify-center">
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
                            <form class='inline-flex items-center' action="http://{{ request()->getHttpHost() }}/customer/logout" method="POST">
                                @csrf
                                <button class="border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0" type="submit">Logout</button>
                            </form>
                        @endif

                        @if (($_COOKIE['customer_token'] ?? null) == null)
                            <a class="inline-flex items-center border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0" href="http://{{ request()->getHttpHost() }}/customer/login">
                                Login
                            </a>
                            <a class="inline-flex items-center border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0" href="http://{{ request()->getHttpHost() }}/customer/register">
                                Register
                            </a>
                        @endif
                    @endif


                    <div class="flex items-center">
                        <a href="http://{{ tenant('domain') }}/shopping_cart">
                            <img src="/Icons/cart.svg" class='w-5' alt="">
                        </a>

                        <div id="cart_count" class="w-5 h-5 text-xs -mt-5 bg-green-400/90 rounded-full mx-auto text-white p-1 flex items-center justify-center">
                            {{ $purchase_product_count }}</div>

                        <a href="http://{{ tenant('domain') }}/shipping">
                            <img src="/Icons/order_list.svg" class='w-5 ml-2' alt="">
                        </a>

                        <div class="py-2 px-5">
                            <x-button onclick="window.location.reload(history.back())">
                                {{ __('Back') }}
                            </x-button>
                        </div>
                    </div>
                </div>

            </div>
        </header>

        <main class="max-w-2xl mx-auto pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Shopping Cart</h1>

            <form class="mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16" action="http://{{ tenant('domain') }}/order">
                <section aria-labelledby="cart-heading" class="lg:col-span-7">
                    <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>
                    <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                        @if (!empty($cart))
                            @foreach ($cart as $item)
                                <script>
                                    count = count + {{ $item->sub_total }}
                                    console.log(count, '--count');
                                </script>

                                <li class="shopping_delete flex py-6 sm:py-10">
                                    <div class="flex-shrink-0">
                                        <img src="/{{ $item->imageName }}" alt="Front of men&#039;s Basic Tee in sienna." class="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48">
                                    </div>
                                    <div class="relative ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                        <div class=" pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                            <div class="">
                                                <div class="flex justify-between">
                                                    <h3 class="purchase_item_title text-sm">
                                                        <a href="#" class="font-medium text-lg text-gray-700 hover:text-gray-800">
                                                            {{ $item->title }}
                                                        </a>
                                                    </h3>
                                                </div>
                                                <p class="mt-2 text-sm truncate-text">{{ $item->shortDescription }}
                                                </p>
                                                <div class="absolute bottom-6 flex mt-1 text-sm font-medium text-gray-900">
                                                    <p class="">Price:</p>
                                                    <p class="">
                                                        &nbsp{{ $theme->globle_currency }}{{ $item->price ? sprintf('%0.2f', $item->price) : 0.0 }}
                                                    </p>
                                                </div>
                                                <div class="absolute bottom-0 flex mt-1 text-sm font-medium text-gray-900">
                                                    <p class="">Subtotal:</p>
                                                    <div class="flex items-center">
                                                        <p>&nbsp{{ $theme->globle_currency }}</p>
                                                        <p class="shopping_cart_subtotal ">
                                                            {{ $item->sub_total ? sprintf('%0.2f', $item->sub_total) : 0.0 }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 sm:mt-0 sm:pr-9">
                                                <label for="quantity-0" class="sr-only">Quantity, Basic
                                                    Tee</label>
                                                <input class="absolute right-10 shopping_cart_quantity w-20 rounded-lg text-xs" min="1" onchange="shopping_cart_quantity_change(this, {{ $item->price }}, {{ $item->id }})" value="{{ $item->quantity }}" type="number" />


                                                <div class="absolute top-0 right-0">
                                                    <button onclick='deleteItem(this, {{ $item->purchase_item_id }})' type="button" class=" shopping_cart_delete -m-2 p-2 inline-flex text-gray-400 hover:text-gray-500">
                                                        <span class="sr-only">Remove</span>
                                                        <!-- Heroicon name: solid/x -->
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="font-medium absolute bottom-0 right-0 text-indigo-600" href="http://{{ tenant('domain') }}/product/detail/{{ $item->product_id }}">show
                                            product</a>
                                        {{-- <p class="mt-4 flex text-sm text-gray-700 space-x-2">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="flex-shrink-0 h-5 w-5 text-green-500"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>In stock</span>
                                        </p> --}}
                                    </div>
                                </li>
                            @endforeach
                        @endif

                    </ul>
                </section>

                <!-- Order summary -->
                <section aria-labelledby="summary-heading" class="mt-16 bg-gray-50 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
                    <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Order summary</h2>

                    <dl class="mt-6 space-y-4">
                        {{-- <div class="flex items-center justify-between">
                            <dt class="text-sm text-gray-600">Subtotal</dt>
                            <dd class="shopping_cart_subtotal  text-sm font-medium text-gray-900">
                                {{ $item->sub_total }}</dd>
                        </div> --}}
                        {{-- <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                            <dt class="flex items-center text-sm text-gray-600">
                                <span>Shipping estimate</span>
                                <a href="#" class="ml-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Learn more about how shipping is calculated</span>
                                    <!-- Heroicon name: solid/question-mark-circle -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </dt>
                            <dd class="text-sm font-medium text-gray-900">$5.00</dd>
                        </div>
                        <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                            <dt class="flex text-sm text-gray-600">
                                <span>Tax estimate</span>
                                <a href="#" class="ml-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Learn more about how tax is calculated</span>
                                    <!-- Heroicon name: solid/question-mark-circle -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </dt>
                            <dd class="text-sm font-medium text-gray-900">$8.32</dd>
                        </div> --}}
                        <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                            <dt class="text-base font-medium text-gray-900">Order total</dt>
                            <div class="flex">
                                <p class="currency">{{ $theme->globle_currency }}</p>
                                <div class="">
                                    <p class="shopping_cart_total text-base font-medium text-gray-900">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </dl>


                    <div class="mt-6">
                        <button type="submit" class="diableButton w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500" onclick="diableButton(this)">Checkout</button>

                    </div>
                </section>
            </form>

            <!-- Related products -->
            {{-- <section aria-labelledby="related-heading" class="mt-24">
                <h2 id="related-heading" class="text-lg font-medium text-gray-900">You may also like&hellip;</h2>

                <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    <div class="group relative">
                        <div
                            class="w-full min-h-80 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                            <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-related-product-01.jpg"
                                alt="Front of Billfold Wallet in natural leather."
                                class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        Billfold Wallet
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">Natural</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900">$118</p>
                        </div>
                    </div>

                    <!-- More products... -->
                </div>
            </section> --}}
        </main>
        <section aria-labelledby="policies-heading" class="bg-gray-50 border-t border-gray-200">
            <h2 id="policies-heading" class="sr-only">Our policies</h2>

            <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:px-8">
                <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-0">
                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-returns-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                            <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">Free returns
                            </h3>
                            <p class="mt-3 text-sm text-gray-500">Not what you expected? Place it back in the parcel
                                and attach the pre-paid postage stamp.</p>
                        </div>
                    </div>

                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-calendar-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                            <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">Same day
                                delivery
                            </h3>
                            <p class="mt-3 text-sm text-gray-500">We offer a delivery service that has never been
                                done
                                before. Checkout today and receive your products within hours.</p>
                        </div>
                    </div>

                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-gift-card-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                            <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">All year
                                discount
                            </h3>
                            <p class="mt-3 text-sm text-gray-500">Looking for a deal? You can use the code
                                &quot;ALLYEAR&quot; at checkout and get money off all year round.</p>
                        </div>
                    </div>

                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-planet-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                            <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">For the planet
                            </h3>
                            <p class="mt-3 text-sm text-gray-500">We’ve pledged 1% of sales to the preservation and
                                restoration of the natural environment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer aria-labelledby="footer-heading" class="bg-white">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="border-t border-gray-200 py-20">
                    <div class="grid grid-cols-1 md:grid-cols-12 md:grid-flow-col md:gap-x-8 md:gap-y-16 md:auto-rows-min">
                        <!-- Image section -->
                        <div class="col-span-1 md:col-span-2 lg:row-start-1 lg:col-start-1">
                            <img src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt="" class="h-8 w-auto">
                        </div>

                        <!-- Sitemap sections -->
                        <div class="mt-10 col-span-6 grid grid-cols-2 gap-8 sm:grid-cols-3 md:mt-0 md:row-start-1 md:col-start-3 md:col-span-8 lg:col-start-2 lg:col-span-6">
                            <div class="grid grid-cols-1 gap-y-12 sm:col-span-2 sm:grid-cols-2 sm:gap-x-8">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">Products</h3>
                                    <ul role="list" class="mt-6 space-y-6">
                                        <li class="text-sm">
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Bags </a>
                                        </li>

                                        <li class="text-sm">
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Tees </a>
                                        </li>

                                        <li class="text-sm">
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Objects </a>
                                        </li>

                                        <li class="text-sm">
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Home Goods </a>
                                        </li>

                                        <li class="text-sm">
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Accessories </a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">Company</h3>
                                    <ul role="list" class="mt-6 space-y-6">
                                        <li class="text-sm">
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Who we are </a>
                                        </li>

                                        <li class="text-sm">
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Sustainability
                                            </a>
                                        </li>

                                        <li class="text-sm">
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Press </a>
                                        </li>

                                        <li class="text-sm">
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Careers </a>
                                        </li>

                                        <li class="text-sm">
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Terms &amp;
                                                Conditions </a>
                                        </li>

                                        <li class="text-sm">
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Privacy </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">Customer Service</h3>
                                <ul role="list" class="mt-6 space-y-6">
                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600"> Contact </a>
                                    </li>

                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600"> Shipping </a>
                                    </li>

                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600"> Returns </a>
                                    </li>

                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600"> Warranty </a>
                                    </li>

                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600"> Secure Payments </a>
                                    </li>

                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600"> FAQ </a>
                                    </li>

                                    <li class="text-sm">
                                        <a href="#" class="text-gray-500 hover:text-gray-600"> Find a store </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Newsletter section -->
                        <div class="mt-12 md:mt-0 md:row-start-2 md:col-start-3 md:col-span-8 lg:row-start-1 lg:col-start-9 lg:col-span-4">
                            <h3 class="text-sm font-medium text-gray-900">Sign up for our newsletter</h3>
                            <p class="mt-6 text-sm text-gray-500">The latest deals and savings, sent to your inbox
                                weekly.</p>
                            <form class="mt-2 flex sm:max-w-md">
                                <label for="email-address" class="sr-only">Email address</label>
                                <input id="email-address" type="text" autocomplete="email" required class="appearance-none min-w-0 w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                <div class="ml-4 flex-shrink-0">
                                    <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign
                                        up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-100 py-10 text-center">
                    <p class="text-sm text-gray-500">&copy; 2021 Workflow, Inc. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
<script>
    
    var currentColorTheme = {!! json_encode($theme->toArray()) !!};
    let theme = {!! json_encode($theme->toArray()) !!};
    console.log(currentColorTheme['theme_color'], 'currentColorTheme');
    currentColorTheme = currentColorTheme['theme_color'];
    document.querySelectorAll('[contentEditable]').forEach(function(element) {
        element.setAttribute('contenteditable', 'false');
    });

    $(document).html($(document).html().replaceAll('indigo', currentColorTheme));

    function shopping_cart_quantity_change(el, item_price, item_id) {
        console.log(el.value, '--quantity');
        console.log($(el.parentNode.parentNode.parentNode.parentNode).text(), '--purchase_item_title');
        console.log(el.value, '--quantity');
        let let_sub_total = el.value * item_price;
        let let_old_sub_total = $(el.parentNode.parentNode.parentNode.parentNode
            .querySelector('.shopping_cart_subtotal')).text();
        console.log(let_sub_total, '--sub_total');
        // console.log(el.parentNode.parentNode.parentNode.parentNode.parentNode
        //     .querySelector('.shopping_cart_subtotal').textContent.replace(let_sub_total));
        $.ajax({
            url: "http://{{ tenant('domain') }}/purchase_item/" + item_id,
            type: "PUT",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: item_id,
                quantity: el.value,
                sub_total: el.value * item_price
            },
            success: function(data) {
                
                console.log(count, '==count');
                console.log('-------------------------toggleClass("hidden")');
                // $('.toast').removeClass("hidden");
                toastr.success('Product value updated successfully');

                // add toster concatenation

                console.log(parseFloat(let_sub_total).toFixed(2), '--sub_total');
                console.log(parseFloat($('.shopping_cart_total').text()) - let_sub_total +
                    let_old_sub_total, '--shopping_cart_total');
                console.log($(el.parentNode.parentNode.parentNode.parentNode
                        .querySelector('.shopping_cart_subtotal')).text(let_sub_total),
                    '--shopping_cart_subtotal');
                $(el.parentNode.parentNode.parentNode.parentNode
                    .querySelector('.shopping_cart_subtotal')).text(parseFloat(let_sub_total).toFixed(
                    2));
                // parseFloat($(el.parentNode.parentNode.parentNode.parentNode
                //     .querySelector('.shopping_cart_subtotal')).text(let_sub_total)).toFixed(2);
                $('.shopping_cart_total').text(
                    parseFloat(
                        parseFloat($('.shopping_cart_total').text()) +
                        parseFloat(let_sub_total) -
                        parseFloat(let_old_sub_total)).toFixed(2)
                );
                console.log(parseFloat($('.shopping_cart_total').text()) + let_sub_total, '--total');

                setTimeout(function() {
                    $('.toast').addClass("hidden");;
                }, 3000);
            }
        });
    };
</script>
<script>
    $('.shopping_cart_total').text(Number(count)
        .toFixed(2));
    var currentColorTheme = {!! json_encode($theme->toArray()) !!};
    console.log(currentColorTheme['theme_color'], 'currentColorTheme');
    currentColorTheme = currentColorTheme['theme_color'];
    //    change all *-indigo-* with currentColorTheme
    $(".globle_theme_attach").html($(".globle_theme_attach").html().replaceAll('indigo',
        currentColorTheme));

    function deleteItem(el, id) {
        $.ajax({
            url: "http://{{ tenant('domain') }}/purchase_item/" + id,
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function(data) {
                // $('.shopping_delete').remove();
                toastr.success('Product deleted successfully');
                console.log(id, 'id');
                console.log(el, 'el');

                // after delete api
                // remove card element

                let deleted_amount = el.parentNode.parentNode.parentNode.parentNode.parentNode
                    .querySelector('.shopping_cart_subtotal').textContent.replace(/\s+/g, '');
                console.log(el.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector(
                    '.shopping_cart_subtotal').textContent.replace(/\s+/g, ''));
                $(el.parentNode.parentNode.parentNode.parentNode.parentNode).remove();
                // update total
                let temp_total = count - deleted_amount;
                $('.shopping_cart_total').text(Number(temp_total)
                    .toFixed(2));
                count = count - deleted_amount;
                console.log('--------------');
                console.log('count-----------', count);
                console.log('deleted_amount--', deleted_amount);
                console.log('--------------');
                shopping_item_count -= 1;
                $('#cart_count').text({!! $theme->globle_currency !!} + shopping_item_count);

            }
        }).done((data) => {
            console.log('item deleted')
        });

    };
</script>
<script>
    // if session have message show it
    if (sessionStorage.getItem('message')) {
        console.log(sessionStorage.getItem('message'), 'sessionStorage.getItem(message)');
        // $('.alert-success').text(sessionStorage.getItem('message'));
        // $('.alert-success').show();
        Toastify({
            text: sessionStorage.getItem('message'),
            duration: 3000
        }).showToast();
        sessionStorage.removeItem('message');
    }
</script>
<style>

</style>

</html>

<x-toster />
