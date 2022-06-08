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
    <link rel="stylesheet" href="/css/style.css">
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
                        <form class='inline-flex items-center'
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

                    <a href="http://{{ tenant('domain') }}/shipping">
                        <img src="/Icons/order_list.svg" class='w-5 ml-2' alt="">
                    </a>


                    <div class="py-2 px-5">
                        <x-button onclick="history.back()">
                            {{ __('Back') }}
                        </x-button>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <main class="relative lg:min-h-full w-1/2 mx-auto">


        <div class="bg-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-xl">

                    <p class="mt-2 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">Thanks for ordering
                    </p>
                    <p class="mt-2 text-base text-gray-500">Thank you for being our valued customer. We hope our product
                        will meet your expectations</p>

                    <dl class="mt-12 text-sm font-medium">
                        <dt class="text-gray-900">Tracking number</dt>
                        <dd class="text-indigo-600 mt-2">{{ $order->tracking_number }}</dd>
                    </dl>
                </div>
                <script>
                    var count = 0;
                </script>
                <h2 class="sr-only">Your order</h2>

                <h3 class="sr-only">Items</h3>
                <div class="mt-10 border-t border-gray-200">
                    @foreach ($order_items as $item)
                        <div class="py-10 border-b border-gray-200 flex space-x-6">
                            {{-- <div href=''> --}}

                            <img src="/{{ $item->imageName }}" alt="{{ $item->title }}"
                                class="flex-none object-center object-cover bg-gray-100 rounded-lg w-40 h-40">

                            <div class="flex-auto flex flex-col">
                                <div>
                                    <h4 class="font-medium text-gray-900 capitalize">
                                        <a
                                            href="http://{{ request()->getHttpHost() }}/product/detail/{{ $item->product_id }}">
                                            {{ $item->title }} </a>
                                    </h4>
                                    <p class="mt-2 text-sm comment more text-gray-600">
                                        {{ $item->shortDescription }}
                                    </p>
                                </div>
                                <div class="mt-6 flex-1 flex items-end">
                                    <dl class="flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
                                        <div class="flex">
                                            <dt class="font-medium text-sm text-gray-900">Quantity</dt>
                                            <dd class="ml-2 text-sm text-gray-700">{{ $item->quantity }}</dd>
                                        </div>
                                        <div class="pl-2 flex">
                                            <dt class="font-medium text-sm text-gray-900">Price</dt>
                                            <div class="flex">
                                                <dd class="ml-2 text-sm text-gray-700 globle_currency">
                                                    {{ $theme->globle_currency }}</dd>
                                                <dd class="text-gray-700">{{ $item->price }}</dd>
                                            </div>
                                        </div>
                                        <div class="pl-2">
                                            <div class="flex">
                                                <dt class="font-medium text-sm text-gray-900">Subtotal</dt>
                                                <dd class="ml-2 text-sm text-gray-700 globle_currency">
                                                    {{ $theme->globle_currency }}</dd>
                                                <dd class="text-gray-700">{{ $item->sub_total }}</dd>
                                            </div>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        {{-- </div> --}}
                    @endforeach
                </div>
                <div class="">
                    <h3 class="sr-only">Your information</h3>

                    <h4 class="sr-only">Addresses</h4>
                    <dl class="flex justify-between gap-x-6 text-sm py-10">
                        <div>
                            <dt class="font-medium text-gray-900">Shipping address</dt>
                            <dd class="mt-2 text-gray-700">
                                <address class="not-italic">
                                    <span class="block">{{ $order->address }}</span>
                                    <span class="block">{{ $order->city }},
                                        {{ $order->state }}</span>
                                    <span class="block">{{ $order->postal_code }}</span>
                                </address>
                            </dd>
                        </div>

                        <div>
                            <dt class="font-medium text-gray-900">Payment method</dt>
                            <dd class="mt-2 text-gray-700 text-right">
                                <p>Apple Pay</p>
                                <p>Mastercard</p>
                                <p><span aria-hidden="true">•••• </span><span class="sr-only">Ending in
                                    </span>1545</p>
                            </dd>
                        </div>
                    </dl>

                    <h3 class="sr-only">Summary</h3>

                    <dl class="space-y-6 border-t border-gray-200 text-sm pt-10">
                        <div class="flex justify-between">
                            <dt class="font-medium text-gray-900">Subtotal</dt>
                            <div class="flex">
                                <dd class="ml-2 text-gray-700 globle_currency">{{ $theme->globle_currency }}</dd>
                                <dd class="text-gray-700">{{ $order->total }}</dd>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <dt class="flex font-medium text-gray-900">
                                Discount
                                <span
                                    class="rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 ml-2">STUDENT50</span>
                            </dt>
                            <div class="flex">
                                <dd class="ml-2 text-gray-700 globle_currency">-{{ $theme->globle_currency }}</dd>
                                <dd class="text-gray-700">18.00 (50%)</dd>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <dt class="font-medium text-gray-900">Shipping</dt>
                            <div class="flex">
                                <dd class="ml-2 text-gray-700 globle_currency">{{ $theme->globle_currency }}</dd <dd
                                    class="text-gray-700">5.00
                                </dd>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <dt class="font-medium text-gray-900">Total</dt>
                            <div class="flex">
                                <dd class="ml-2 text-gray-700 globle_currency">{{ $theme->globle_currency }}</dd>
                                <dd class="text-gray-900">{{ $order->total - 18 + 5 }}</dd>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 py-6 text-right">
            <a href="http://{{ request()->getHttpHost() }}/"
                class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Continue
                Shopping<span aria-hidden="true"> &rarr;</span></a>
        </div>
    </main>
</body>
<style>
    .link {
        color: #0254EB
    }

    .link:visited {
        color: #0254EB
    }

    .link.morelink {
        text-decoration: none;
        outline: none;
    }

    .morecontent span {
        display: none;
    }
</style>
<script>
    $(document).ready(function() {
        var showChar = 100;
        var ellipsestext = "...";
        var moretext = "show more";
        var lesstext = "show less";
        $('.more').each(function() {
            var content = $(this).html();

            if (content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar - 1, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext +
                    '&nbsp;</span><span class="morecontent"><span>' + h +
                    '</span>&nbsp;&nbsp;<a href="" class="link morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function() {
            if ($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });

    console.log(count, '==count');
    $('.order_total').text(count);

    $('.order_total_input').val($('.order_total').text());
    var currentColorTheme = {!! json_encode($theme->toArray()) !!};
    let theme = {!! json_encode($theme->toArray()) !!};
    console.log(currentColorTheme['theme_color'], 'currentColorTheme');
    currentColorTheme = currentColorTheme['theme_color'];
    //    change all *-indigo-* with currentColorTheme
    $(".globle_theme_attach").html($(".globle_theme_attach").html().replaceAll('indigo',
        currentColorTheme));
</script>

</html>
