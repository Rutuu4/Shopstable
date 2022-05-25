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

<body>
    <header class="text-gray-600 body-font">
        <div class="flex justify-between items-center">

            <div class="flex flex-wrap p-5 flex-col md:flex-row items-center">
                <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2"
                        class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="ml-3 text-xl">Shopstable</span>
                </a>

                @if (!empty($navbar))
                    <div
                        class="md:mr-auto md:ml-4 md:py-1 md:pl-4  md:border-gray-400 flex flex-wrap text-base justify-center">
                        @foreach ($navbar as $item)
                            <a target="_blank" href={{ $item->nav_item_link }} class="mx-2">
                                {{ $item->nav_item_name }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>


            <div class="py-2 px-5">
                <x-button onclick="history.back()">
                    {{ __('Back') }}
                </x-button>
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
                    <div id="tabs-1-panel-1" class="px-4 py-6 space-y-12" aria-labelledby="tabs-1-tab-1" role="tabpanel"
                        tabindex="0">
                        <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                            <div class="group relative">
                                <div
                                    class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg"
                                        alt="Models sitting back to back, wearing Basic Tee in black and bone."
                                        class="object-center object-cover">
                                </div>
                                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                    New Arrivals
                                </a>
                                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                            </div>

                            <div class="group relative">
                                <div
                                    class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg"
                                        alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees."
                                        class="object-center object-cover">
                                </div>
                                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                    Basic Tees
                                </a>
                                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                            </div>

                            <div class="group relative">
                                <div
                                    class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-03.jpg"
                                        alt="Model wearing minimalist watch with black wristband and white watch face."
                                        class="object-center object-cover">
                                </div>
                                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                    Accessories
                                </a>
                                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                            </div>

                            <div class="group relative">
                                <div
                                    class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-04.jpg"
                                        alt="Model opening tan leather long wallet with credit card pockets and cash pouch."
                                        class="object-center object-cover">
                                </div>
                                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                    Carry
                                </a>
                                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                            </div>
                        </div>
                    </div>

                    <!-- 'Men' tab panel, show/hide based on tab state. -->
                    <div id="tabs-1-panel-2" class="px-4 py-6 space-y-12" aria-labelledby="tabs-1-tab-2" role="tabpanel"
                        tabindex="0">
                        <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                            <div class="group relative">
                                <div
                                    class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-01.jpg"
                                        alt="Hats and sweaters on wood shelves next to various colors of t-shirts on hangers."
                                        class="object-center object-cover">
                                </div>
                                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                    New Arrivals
                                </a>
                                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                            </div>

                            <div class="group relative">
                                <div
                                    class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-02.jpg"
                                        alt="Model wearing light heather gray t-shirt."
                                        class="object-center object-cover">
                                </div>
                                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                    Basic Tees
                                </a>
                                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                            </div>

                            <div class="group relative">
                                <div
                                    class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-03.jpg"
                                        alt="Grey 6-panel baseball hat with black brim, black mountain graphic on front, and light heather gray body."
                                        class="object-center object-cover">
                                </div>
                                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                    Accessories
                                </a>
                                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                            </div>

                            <div class="group relative">
                                <div
                                    class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-04.jpg"
                                        alt="Model putting folded cash into slim card holder olive leather wallet with hand stitching."
                                        class="object-center object-cover">
                                </div>
                                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                    Carry
                                </a>
                                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
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


        <main class="max-w-7xl mx-auto  pb-24 px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto lg:max-w-none">
                <h1 class="sr-only">Checkout</h1>

                <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16"
                    action="http://{{ tenant('domain') }}/shipping">
                    <div>
                        <div>
                            <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

                            <div class="mt-4">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">Email
                                    address</label>
                                <div class="mt-1">
                                    <input type="email" id="email-address" name="email-address" autocomplete="email"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 border-t border-gray-200 pt-10">
                            <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>

                            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <div>
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">First
                                        name</label>
                                    <div class="mt-1">
                                        <input type="text" id="first-name" name="first-name" autocomplete="given-name"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last
                                        name</label>
                                    <div class="mt-1">
                                        <input type="text" id="last-name" name="last-name" autocomplete="family-name"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="company"
                                        class="block text-sm font-medium text-gray-700">Company</label>
                                    <div class="mt-1">
                                        <input type="text" name="company" id="company"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="address"
                                        class="block text-sm font-medium text-gray-700">Address</label>
                                    <div class="mt-1">
                                        <input type="text" name="address" id="address" autocomplete="street-address"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="apartment" class="block text-sm font-medium text-gray-700">Apartment,
                                        suite, etc.</label>
                                    <div class="mt-1">
                                        <input type="text" name="apartment" id="apartment"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <div class="mt-1">
                                        <input type="text" name="city" id="city" autocomplete="address-level2"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="country"
                                        class="block text-sm font-medium text-gray-700">Country</label>
                                    <div class="mt-1">
                                        <select id="country" name="country"
                                            class="block w-fit pl-4 pr-8 rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option>United States</option>
                                            <option>Canada</option>
                                            <option>Mexico</option>
                                        </select>

                                    </div>
                                </div>

                                <div>
                                    <label for="region" class="block text-sm font-medium text-gray-700">State /
                                        Province</label>
                                    <div class="mt-1">
                                        <input type="text" name="region" id="region" autocomplete="address-level1"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="postal-code" class="block text-sm font-medium text-gray-700">Postal
                                        code</label>
                                    <div class="mt-1">
                                        <input type="text" name="postal-code" id="postal-code"
                                            autocomplete="postal-code"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                    <div class="mt-1">
                                        <input type="text" name="phone" id="phone" autocomplete="tel"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 border-t border-gray-200 pt-10">
                            <fieldset>
                                <legend class="text-lg font-medium text-gray-900">Delivery method</legend>

                                <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <!--
                  Checked: "border-transparent", Not Checked: "border-gray-300"
                  Active: "ring-2 ring-indigo-500"
                -->
                                    <label
                                        class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                                        <input type="radio" name="delivery-method" value="Standard"
                                            class="sr-only" aria-labelledby="delivery-method-0-label"
                                            aria-describedby="delivery-method-0-description-0 delivery-method-0-description-1">
                                        <div class="flex-1 flex">
                                            <div class="flex flex-col">
                                                <span id="delivery-method-0-label"
                                                    class="block text-sm font-medium text-gray-900"> Standard </span>
                                                <span id="delivery-method-0-description-0"
                                                    class="mt-1 flex items-center text-sm text-gray-500"> 4–10 business
                                                    days </span>
                                                <span id="delivery-method-0-description-1"
                                                    class="mt-6 text-sm font-medium text-gray-900"> $5.00 </span>
                                            </div>
                                        </div>
                                        <!--
                    Not Checked: "hidden"

                    Heroicon name: solid/check-circle
                  -->
                                        <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                                        <div class="absolute -inset-px rounded-lg border-2 pointer-events-none"
                                            aria-hidden="true"></div>
                                    </label>

                                    <!--
                  Checked: "border-transparent", Not Checked: "border-gray-300"
                  Active: "ring-2 ring-indigo-500"
                -->
                                    <label
                                        class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                                        <input type="radio" name="delivery-method" value="Express"
                                            class="sr-only" aria-labelledby="delivery-method-1-label"
                                            aria-describedby="delivery-method-1-description-0 delivery-method-1-description-1">
                                        <div class="flex-1 flex">
                                            <div class="flex flex-col">
                                                <span id="delivery-method-1-label"
                                                    class="block text-sm font-medium text-gray-900"> Express </span>
                                                <span id="delivery-method-1-description-0"
                                                    class="mt-1 flex items-center text-sm text-gray-500"> 2–5 business
                                                    days </span>
                                                <span id="delivery-method-1-description-1"
                                                    class="mt-6 text-sm font-medium text-gray-900"> $16.00 </span>
                                            </div>
                                        </div>
                                        <!--
                    Not Checked: "hidden"

                    Heroicon name: solid/check-circle
                  -->
                                        <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                                        <div class="absolute -inset-px rounded-lg border-2 pointer-events-none"
                                            aria-hidden="true"></div>
                                    </label>
                                </div>
                            </fieldset>
                        </div>

                        <!-- Payment -->
                        <div class="mt-10 border-t border-gray-200 pt-10">
                            <h2 class="text-lg font-medium text-gray-900">Payment</h2>

                            <fieldset class="mt-4">
                                <legend class="sr-only">Payment type</legend>
                                <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                                    <div class="flex items-center">
                                        <input id="credit-card" name="payment-type" type="radio" checked
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="credit-card" class="ml-3 block text-sm font-medium text-gray-700">
                                            Credit card </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="paypal" name="payment-type" type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="paypal" class="ml-3 block text-sm font-medium text-gray-700">
                                            PayPal </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="etransfer" name="payment-type" type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="etransfer" class="ml-3 block text-sm font-medium text-gray-700">
                                            eTransfer </label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="mt-6 grid grid-cols-4 gap-y-6 gap-x-4">
                                <div class="col-span-4">
                                    <label for="card-number" class="block text-sm font-medium text-gray-700">Card
                                        number</label>
                                    <div class="mt-1">
                                        <input type="text" id="card-number" name="card-number" autocomplete="cc-number"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="col-span-4">
                                    <label for="name-on-card" class="block text-sm font-medium text-gray-700">Name on
                                        card</label>
                                    <div class="mt-1">
                                        <input type="text" id="name-on-card" name="name-on-card" autocomplete="cc-name"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="col-span-3">
                                    <label for="expiration-date"
                                        class="block text-sm font-medium text-gray-700">Expiration date (MM/YY)</label>
                                    <div class="mt-1">
                                        <input type="text" name="expiration-date" id="expiration-date"
                                            autocomplete="cc-exp"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                                    <div class="mt-1">
                                        <input type="text" name="cvc" id="cvc" autocomplete="csc"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order summary -->
                    <div class="mt-10 lg:mt-0">
                        <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

                        <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                            <h3 class="sr-only">Items in your cart</h3>
                            <ul role="list" class="divide-y divide-gray-200">
                                <li class="flex py-6 px-4 sm:px-6">
                                    <div class="flex-shrink-0">
                                        <img src="https://tailwindui.com/img/ecommerce-images/checkout-page-02-product-01.jpg"
                                            alt="Front of men&#039;s Basic Tee in black." class="w-20 rounded-md">
                                    </div>

                                    <div class="ml-6 flex-1 flex flex-col">
                                        <div class="flex">
                                            <div class="min-w-0 flex-1">
                                                <h4 class="text-sm">
                                                    <a href="#" class="font-medium text-gray-700 hover:text-gray-800">
                                                        Basic Tee </a>
                                                </h4>
                                                <p class="mt-1 text-sm text-gray-500">Black</p>
                                                <p class="mt-1 text-sm text-gray-500">Large</p>
                                            </div>

                                            <div class="ml-4 flex-shrink-0 flow-root">
                                                <button type="button"
                                                    class="-m-2.5 bg-white p-2.5 flex items-center justify-center text-gray-400 hover:text-gray-500">
                                                    <span class="sr-only">Remove</span>
                                                    <!-- Heroicon name: solid/trash -->
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="flex-1 pt-2 flex items-end justify-between">
                                            <p class="mt-1 text-sm font-medium text-gray-900">$32.00</p>

                                            <div class="ml-4">
                                                <label for="quantity" class="sr-only">Quantity</label>
                                                <select id="quantity-0" name="quantity-0"
                                                    class="block w-fit pl-4 pr-8 rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- More products... -->
                            </ul>
                            <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">Subtotal</dt>
                                    <dd class="text-sm font-medium text-gray-900">$64.00</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">Shipping</dt>
                                    <dd class="text-sm font-medium text-gray-900">$5.00</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">Taxes</dt>
                                    <dd class="text-sm font-medium text-gray-900">$5.52</dd>
                                </div>
                                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                                    <dt class="text-base font-medium">Total</dt>
                                    <dd class="text-base font-medium text-gray-900">$75.52</dd>
                                </div>
                            </dl>

                            <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                                <button type="submit"
                                    class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Confirm
                                    order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        <footer aria-labelledby="footer-heading" class="bg-white border-t border-gray-200">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-20">
                    <div
                        class="grid grid-cols-1 md:grid-cols-12 md:grid-flow-col md:gap-x-8 md:gap-y-16 md:auto-rows-min">
                        <!-- Image section -->
                        <div class="col-span-1 md:col-span-2 lg:row-start-1 lg:col-start-1">
                            <img src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt=""
                                class="h-8 w-auto">
                        </div>

                        <!-- Sitemap sections -->
                        <div
                            class="mt-10 col-span-6 grid grid-cols-2 gap-8 sm:grid-cols-3 md:mt-0 md:row-start-1 md:col-start-3 md:col-span-8 lg:col-start-2 lg:col-span-6">
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
                                            <a href="#" class="text-gray-500 hover:text-gray-600"> Sustainability </a>
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
                        <div
                            class="mt-12 md:mt-0 md:row-start-2 md:col-start-3 md:col-span-8 lg:row-start-1 lg:col-start-9 lg:col-span-4">
                            <h3 class="text-sm font-medium text-gray-900">Sign up for our newsletter</h3>
                            <p class="mt-6 text-sm text-gray-500">The latest deals and savings, sent to your inbox
                                weekly.</p>
                            <form class="mt-2 flex sm:max-w-md">
                                <label for="newsletter-email-address" class="sr-only">Email address</label>
                                <input id="newsletter-email-address" type="text" autocomplete="email" required
                                    class="appearance-none min-w-0 w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                <div class="ml-4 flex-shrink-0">
                                    <button type="submit"
                                        class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign
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

</html>
