<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <div class="bg-white">
        <!--
    Mobile menu

    Off-canvas menu for mobile, show/hide based on off-canvas menu state.
  -->



        <main class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Shopping Cart</h1>

            <form class="mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16" action="http://{{ tenant('domain') }}/billing">
                <section aria-labelledby="cart-heading" class="lg:col-span-7">
                    <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

                    <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                        <li class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-01.jpg"
                                    alt="Front of men&#039;s Basic Tee in sienna."
                                    class="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48">
                            </div>

                            <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                    <div>
                                        <div class="flex justify-between">
                                            <h3 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800"> Basic
                                                    Tee </a>
                                            </h3>
                                        </div>
                                        <div class="mt-1 flex text-sm">
                                            <p class="text-gray-500">Sienna</p>

                                            <p class="ml-4 pl-4 border-l border-gray-200 text-gray-500">Large</p>
                                        </div>
                                        <p class="mt-1 text-sm font-medium text-gray-900">$32.00</p>
                                    </div>

                                    <div class="mt-4 sm:mt-0 sm:pr-9">
                                        <label for="quantity-0" class="sr-only">Quantity, Basic Tee</label>
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
                                        <div class="absolute top-0 right-0">
                                            <button type="button"
                                                class="-m-2 p-2 inline-flex text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Remove</span>
                                                <!-- Heroicon name: solid/x -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-4 flex text-sm text-gray-700 space-x-2">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>In stock</span>
                                </p>
                            </div>
                        </li>

                        <li class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-02.jpg"
                                    alt="Front of men&#039;s Basic Tee in black."
                                    class="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48">
                            </div>

                            <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                    <div>
                                        <div class="flex justify-between">
                                            <h3 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800"> Basic
                                                    Tee </a>
                                            </h3>
                                        </div>
                                        <div class="mt-1 flex text-sm">
                                            <p class="text-gray-500">Black</p>

                                            <p class="ml-4 pl-4 border-l border-gray-200 text-gray-500">Large</p>
                                        </div>
                                        <p class="mt-1 text-sm font-medium text-gray-900">$32.00</p>
                                    </div>

                                    <div class="mt-4 sm:mt-0 sm:pr-9">
                                        <label for="quantity-1" class="sr-only">Quantity, Basic Tee</label>
                                        <select id="quantity-1" name="quantity-1"
                                            class="max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>

                                        <div class="absolute top-0 right-0">
                                            <button type="button"
                                                class="-m-2 p-2 inline-flex text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Remove</span>
                                                <!-- Heroicon name: solid/x -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-4 flex text-sm text-gray-700 space-x-2">
                                    <!-- Heroicon name: solid/clock -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Ships in 3–4 weeks</span>
                                </p>
                            </div>
                        </li>

                        <li class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-03.jpg"
                                    alt="Insulated bottle with white base and black snap lid."
                                    class="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48">
                            </div>

                            <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                    <div>
                                        <div class="flex justify-between">
                                            <h3 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800"> Nomad
                                                    Tumbler </a>
                                            </h3>
                                        </div>
                                        <div class="mt-1 flex text-sm">
                                            <p class="text-gray-500">White</p>
                                        </div>
                                        <p class="mt-1 text-sm font-medium text-gray-900">$35.00</p>
                                    </div>

                                    <div class="mt-4 sm:mt-0 sm:pr-9">
                                        <label for="quantity-2" class="sr-only">Quantity, Nomad Tumbler</label>
                                        <select id="quantity-2" name="quantity-2"
                                            class="max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>

                                        <div class="absolute top-0 right-0">
                                            <button type="button"
                                                class="-m-2 p-2 inline-flex text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Remove</span>
                                                <!-- Heroicon name: solid/x -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-4 flex text-sm text-gray-700 space-x-2">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>In stock</span>
                                </p>
                            </div>
                        </li>
                    </ul>
                </section>

                <!-- Order summary -->
                <section aria-labelledby="summary-heading"
                    class="mt-16 bg-gray-50 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
                    <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Order summary</h2>

                    <dl class="mt-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <dt class="text-sm text-gray-600">Subtotal</dt>
                            <dd class="text-sm font-medium text-gray-900">$99.00</dd>
                        </div>
                        <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
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
                        </div>
                        <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                            <dt class="text-base font-medium text-gray-900">Order total</dt>
                            <dd class="text-base font-medium text-gray-900">$112.32</dd>
                        </div>
                    </dl>

                    <div class="mt-6">


                            <button type="submit"
                                class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Checkout</button>

                    </div>
                </section>
            </form>

            <!-- Related products -->
            <section aria-labelledby="related-heading" class="mt-24">
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
            </section>
        </main>
        <section aria-labelledby="policies-heading" class="bg-gray-50 border-t border-gray-200">
            <h2 id="policies-heading" class="sr-only">Our policies</h2>

            <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:px-8">
                <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-0">
                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto"
                                    src="https://tailwindui.com/img/ecommerce/icons/icon-returns-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                            <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">Free returns</h3>
                            <p class="mt-3 text-sm text-gray-500">Not what you expected? Place it back in the parcel
                                and attach the pre-paid postage stamp.</p>
                        </div>
                    </div>

                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto"
                                    src="https://tailwindui.com/img/ecommerce/icons/icon-calendar-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                            <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">Same day delivery
                            </h3>
                            <p class="mt-3 text-sm text-gray-500">We offer a delivery service that has never been done
                                before. Checkout today and receive your products within hours.</p>
                        </div>
                    </div>

                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto"
                                    src="https://tailwindui.com/img/ecommerce/icons/icon-gift-card-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                            <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">All year discount
                            </h3>
                            <p class="mt-3 text-sm text-gray-500">Looking for a deal? You can use the code
                                &quot;ALLYEAR&quot; at checkout and get money off all year round.</p>
                        </div>
                    </div>

                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto"
                                    src="https://tailwindui.com/img/ecommerce/icons/icon-planet-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                            <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">For the planet</h3>
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
                                <label for="email-address" class="sr-only">Email address</label>
                                <input id="email-address" type="text" autocomplete="email" required
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
