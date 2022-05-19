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
        <div class="flex justify-between">

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

            <button class="mr-6 text-xl" onclick="history.back()">back</button>
        </div>
    </header>
    
    <div class="bg-white">
        <!--
    Mobile menu

    Off-canvas menu for mobile, show/hide based on off-canvas menu state.
  -->


        <main class="max-w-7xl mx-auto px-4 py-16 sm:px-6 sm:py-6 lg:px-8">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Order Details</h1>

            <div class="text-sm border-b border-gray-200 mt-2 pb-5 sm:flex sm:justify-between">
                <dl class="flex">
                    <dt class="text-gray-500">Order number&nbsp;</dt>
                    <dd class="font-medium text-gray-900">W086438695</dd>
                    <dt>
                        <span class="sr-only">Date</span>
                        <span class="text-gray-400 mx-2" aria-hidden="true">&middot;</span>
                    </dt>
                    <dd class="font-medium text-gray-900"><time datetime="2021-03-22">March 22, 2021</time></dd>
                </dl>
                <div class="mt-4 sm:mt-0">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">View invoice<span
                            aria-hidden="true"> &rarr;</span></a>
                </div>
            </div>

            <section aria-labelledby="products-heading" class="mt-8">
                <h2 id="products-heading" class="sr-only">Products purchased</h2>

                <div class="space-y-24">
                    <div
                        class="grid grid-cols-1 text-sm sm:grid-rows-1 sm:grid-cols-12 sm:gap-x-6 md:gap-x-8 lg:gap-x-8">
                        <div class="sm:col-span-4 md:col-span-5 md:row-end-2 md:row-span-2">
                            <div class="aspect-w-1 aspect-h-1 bg-gray-50 rounded-lg overflow-hidden">
                                <img src="https://tailwindui.com/img/ecommerce-images/confirmation-page-04-product-01.jpg"
                                    alt="Off-white t-shirt with circular dot illustration on the front of mountain ridges that fade."
                                    class="object-center object-cover">
                            </div>
                        </div>
                        <div class="mt-6 sm:col-span-7 sm:mt-0 md:row-end-1">
                            <h3 class="text-lg font-medium text-gray-900">
                                <a href="#">Distant Mountains Artwork Tee</a>
                            </h3>
                            <p class="font-medium text-gray-900 mt-1">$36.00</p>
                            <p class="text-gray-500 mt-3">You awake in a new, mysterious land. Mist hangs low along the
                                distant mountains. What does it mean?</p>
                        </div>
                        <div class="sm:col-span-12 md:col-span-7">
                            <dl
                                class="grid grid-cols-1 gap-y-8 border-b py-8 border-gray-200 sm:grid-cols-2 sm:gap-x-6 sm:py-6 md:py-10">
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
                            <p class="font-medium text-gray-900 mt-6 md:mt-10">Processing on <time
                                    datetime="2021-03-24">March 24, 2021</time></p>
                            <div class="mt-6">
                                <div class="bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-2 bg-indigo-600 rounded-full"
                                        style="width: calc((1 * 2 + 1) / 8 * 100%)"></div>
                                </div>
                                <div class="hidden sm:grid grid-cols-4 font-medium text-gray-600 mt-6">
                                    <div class="text-indigo-600">Order placed</div>
                                    <div class="text-center text-indigo-600">Processing</div>
                                    <div class="text-center">Shipped</div>
                                    <div class="text-right">Delivered</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- More products... -->
                </div>
            </section>

            <!-- Billing -->
            <section aria-labelledby="summary-heading" class="mt-24">
                <h2 id="summary-heading" class="sr-only">Billing Summary</h2>

                <div class="bg-gray-50 rounded-lg py-6 px-6 lg:px-0 lg:py-8 lg:grid lg:grid-cols-12 lg:gap-x-8">
                    <dl class="grid grid-cols-1 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:pl-8 lg:col-span-5">
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
                            <dd class="mt-3 flex">
                                <div>
                                    <svg aria-hidden="true" width="36" height="24" viewBox="0 0 36 24"
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-auto">
                                        <rect width="36" height="24" rx="4" fill="#224DBA" />
                                        <path
                                            d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z"
                                            fill="#fff" />
                                    </svg>
                                    <p class="sr-only">Visa</p>
                                </div>
                                <div class="ml-4">
                                    <p class="text-gray-900">Ending with 4242</p>
                                    <p class="text-gray-600">Expires 02 / 24</p>
                                </div>
                            </dd>
                        </div>
                    </dl>

                    <dl class="mt-8 divide-y divide-gray-200 text-sm lg:mt-0 lg:pr-8 lg:col-span-7">
                        <div class="pb-4 flex items-center justify-between">
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
                        </div>
                        <div class="pt-4 flex items-center justify-between">
                            <dt class="font-medium text-gray-900">Order total</dt>
                            <dd class="font-medium text-indigo-600">$83.16</dd>
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
</body>

</html>
