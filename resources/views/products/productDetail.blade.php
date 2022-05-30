<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shopstable') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"
        integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
</head>

<body>
    <style>
        .text-truncate {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            /* truncate to 4 lines */
            -webkit-line-clamp: 4;
        }

        .align-right {
            text-align: right;
        }

        html,
        body {
            font-family: 'Rajdhani', sans-serif;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            position: relative;
        }

        img {
            max-width: 100%;
            height: auto;
            width: 100%;
        }

        .toolbox ul li {
            display: inline-block;
            vertical-align: top;
            width: 80px;
            height: 60px;
            /* border: 1px solid gray; */
            text-align: center;
            font-size: 11px;
            line-height: 60px;
        }


        .canvas {
            /* border: 1px solid gray; */
            margin-top: 20px;
            min-height: 300px;
            padding: 3px;
            position: relative;
        }

        /* .canvas [data-handle] {

        } */

        /* .canvas [data-handle].hover {
            border: 1px solid orange;
        } */

        .img-pos {}

        .img-pos.close {}

        .row {
            position: relative;
            overflow: auto;
        }

        .row .col-md-6 {
            float: left;
            width: 50%;
        }

        .js-tooltip {
            position: absolute;
            top: 0;
            right: 0;
            background: blue;
        }

        .js-tooltip a {
            color: white;
            font-size: 9px;
            display: inline-block;
        }

        /* article table */
        section table {
            width: 100%;
            table-layout: fixed;
        }

        section table .white {
            background-color: white !important;
        }

        section .tbl-content {
            height: 100%;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        section th {
            width: 16.66%;
            padding: 15px 0px;
            white-space: nowrap;
            text-align: center;
            background-color: #ff0054;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
        }

        @media screen and (max-width: 812px) {
            section th {
                font-size: 8px;
            }
        }

        section td {
            width: 16.66%;
            padding: 5px 10px;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            font-weight: bold;
            color: #000;
            border-bottom: solid 1px #bdbdbd;
        }

        @media screen and (max-width: 812px) {
            section td {
                font-size: 12px;
                padding: 5px 5px;
            }
        }

        @media screen and (max-width: 768px) {
            section td.align-right {
                text-align: center;
            }
        }

        section .gray {
            background-color: #ededed;
        }

        @media screen and (max-width: 768px) {
            section .align-right {
                text-align: center;
            }
        }

        section .align-right span {
            position: relative;
            width: 100%;
            height: 100%;
        }

        @media screen and (max-width: 768px) {
            section .align-right span:after {
                background-image: url(../img/hi-res/news/star-1.png);
                width: 15px;
                height: 15px;
                background-repeat: no-repeat;
                background-size: contain;
                display: inline-block;
                content: "";
                transform: translateY(15%);
                margin-left: 30%;
            }
        }

        section .align-right img {
            position: relative;
            display: inline-block;
            transform: translateY(5%);
            height: 11px;
            right: 15px;
            left: -10px;
        }

        @media screen and (max-width: 768px) {
            section .align-right img {
                height: 10px;
                display: none;
            }
        }



        div[data-placeholder]:not([data-placeholder=""]):empty::before {
            content: attr(data-placeholder);
        }

        /* div:empty::before {
            content: 'fallback placeholder';
        } */

        *:empty::before {
            color: grey;
        }

        *[data-placeholder]:not([data-placeholder=""]):empty::before {
            content: attr(data-placeholder);
        }


        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-number-input input:focus {
            outline: none !important;
        }

        .custom-number-input button:focus {
            outline: none !important;
        }

        .flickity-enabled {
            position: relative;
        }

        .flickity-enabled:focus {
            outline: none;
        }

        .flickity-viewport {
            overflow: hidden;
            position: relative;
            height: 100%;
        }

        .flickity-slider {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        /* draggable */

        .flickity-enabled.is-draggable {
            -webkit-tap-highlight-color: transparent;
            tap-highlight-color: transparent;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .flickity-enabled.is-draggable .flickity-viewport {
            cursor: move;
            cursor: -webkit-grab;
            cursor: grab;
        }

        .flickity-enabled.is-draggable .flickity-viewport.is-pointer-down {
            cursor: -webkit-grabbing;
            cursor: grabbing;
        }

        /* ---- previous/next buttons ---- */

        .flickity-prev-next-button {
            position: absolute;
            top: 50%;
            width: 44px;
            height: 44px;
            border: none;
            border-radius: 50%;
            background: white;
            background: hsla(0, 0%, 100%, 0.75);
            cursor: pointer;
            /* vertically center */
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .flickity-prev-next-button:hover {
            background: white;
        }

        .flickity-prev-next-button:focus {
            outline: none;
            box-shadow: 0 0 0 5px #09F;
        }

        .flickity-prev-next-button:active {
            opacity: 0.6;
        }

        .flickity-prev-next-button.previous {
            left: 10px;
        }

        .flickity-prev-next-button.next {
            right: 10px;
        }

        /* right to left */
        */
        /* .flickity-rtl .flickity-prev-next-button.previous { */
        /*   left: auto; */
        /*   right: 10px; */
        /* } */
        /* .flickity-rtl .flickity-prev-next-button.next { */
        /*   right: auto; */
        /*   left: 10px; */
        /* } */

        .flickity-prev-next-button:disabled {
            opacity: 0.3;
            cursor: auto;
        }

        .flickity-prev-next-button svg {
            position: absolute;
            left: 20%;
            top: 20%;
            width: 60%;
            height: 60%;
        }

        .flickity-prev-next-button .arrow {
            fill: #333;
        }

        /* ---- page dots ---- */

        /* .flickity-page-dots { */
        /*   position: absolute; */
        /*   width: 100%; */
        /*   bottom: -25px; */
        /*   padding: 0; */
        /*   margin: 0; */
        /*   list-style: none; */
        /*   text-align: center; */
        /*   line-height: 1; */
        /* } */
        /*  */
        /* .flickity-rtl .flickity-page-dots { direction: rtl; } */
        /*  */
        /* .flickity-page-dots .dot { */
        /*   display: inline-block; */
        /*   width: 10px; */
        /*   height: 10px; */
        /*   margin: 0 8px; */
        /*   background: #333; */
        /*   border-radius: 50%; */
        /*   opacity: 0.25; */
        /*   cursor: pointer; */
        /* } */
        /*  */
        /* .flickity-page-dots .dot.is-selected { */
        /*   opacity: 1; */
        /* } */

        /* end external css: flickity.css */
        /*! Flickity v2.0.4
        https://flickity.metafizzy.co
        ---------------------------------------------- */

        * {
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
        }

        /* .carousel {
            background: #FAFAFA;
        } */

        .carousel-main {
            margin-bottom: 8px;
        }

        .carousel-cell {
            width: 100%;
            height: auto;
            margin-right: 8px;
            border-radius: 5px;
            /* counter-increment: carousel-cell; */
        }

        /* cell number */
        /* .carousel-cell:before { */
        /*   display: block; */
        /*   text-align: center; */
        /*   content: counter(carousel-cell); */
        /*   line-height: 200px; */
        /*   font-size: 80px; */
        /*   color: white; */
        /* } */

        .carousel-main .carousel-cell {
            height: 250px;
        }

        .carousel-nav .carousel-cell {
            height: 90px;
            width: 120px;
        }

        /* .carousel-nav .carousel-cell:before { */
        /*   font-size: 50px; */
        /*   line-height: 80px; */
        /* } */

        /* .carousel-nav .carousel-cell.is-nav-selected { */
        /*   background: #ED2; */
        /* } */

        /* Atelierbram edit */
        .carousel-main img {
            display: block;
            margin: 0 auto;
        }

        .container {
            max-width: 672px;
            margin: 0 auto;
            padding-top: 40px;
        }



        /*
        div:empty::before {
            content: 'fallback placeholder';
        } */

    </style>

    <style>
        .flickity-slider {
            display: flex;
            align-items: center;
        }

    </style>
    {{-- <div class="py-4 px-24 flex justify-between border-b-4 ">
        <a href="http://{{ tenant('domain') }}/pageBuilder/{{ $id }}">
            <x-button id="btn2">Web Builder
            </x-button>
        </a>
    </div> --}}
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
            <div class="flex items-center ">
                <a href="http://{{ tenant('domain') }}/shopping_cart">
                    <img src="/Icons/cart.svg" class='w-5' alt="">
                </a>
                <div
                    class="w-5 h-5 text-xs -mt-5 bg-green-400/90 rounded-full mx-auto text-white p-1 flex items-center justify-center">
                    1</div>
                <div class="py-2 px-5">
                    <x-button onclick="history.back()">
                        {{ __('Back') }}
                    </x-button>
                </div>
            </div>

        </div>
    </header>

    <div class="py-2 px-6 md:py-4 md:px-24 ">

        <div class="">
            <div class="grid grid-cols-2 gap-8 realtive">

                <div class="grid justify-center ">
                    <div class="mx-auto w-1/2 -mt-20">
                        <!-- Flickity HTML init -->
                        <h1 class="invisible">{{ $item }}</h1>

                        <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                            @foreach ($productImage as $productImageItem)
                                <div class="carousel-cell"><img class="w-full h-full object-contain"
                                        src="/{{ $productImageItem->imageName }}" /></div>
                            @endforeach
                        </div>
                        <style>
                            .flickity-slider {
                                display: flex;
                                align-items: center;
                            }

                        </style>
                        <div class="carousel carousel-nav"
                            data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                            @foreach ($productImage as $item)
                                <div class="carousel-cell"><img class="w-full h-full object-contain"
                                        src="/{{ $item->imageName }}" /></div>
                            @endforeach

                        </div>

                    </div><!-- /.container -->
                </div>
                <div class="">
                    <h1 class="text-4xl uppercase border-b pb-4  ">{{ $productDetail->title }}</h1>
                    <input type="hidden" class="product_price">
                    <div class="flex">
                        <h1 class="text-lg font-light font-sans-serif py-4 ">Rs.</h1>
                        <h1 class="product_price_value text-lg font-light font-sans-serif py-4 ">
                            {{ $productDetail->price }}</h1>
                    </div>
                    {{-- <div class="text-md py-2 text-stone-500 font-light">Quantity</div> --}}

                    <div class="custom-number-input h-10 w-32">
                        <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">Quantity
                        </label>
                        <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-2 pb-2">
                            <button data-action="decrement"
                                class="text-gray-600 border-t border-b border-l border-gray-700 hover:text-gray-700 bg-red-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                <span class="m-auto text-2xl text-white font-light w-5">−</span>
                            </button>
                            <input type="number"
                                class="product_quantity border-b border-t  text-center w-full  font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700 "
                                name="custom-input-number" value={{ $productQuantity }} min='1' />
                            <button data-action="increment"
                                class="text-gray-600 border-t border-b border-r border-gray-700 hover:text-gray-700 bg-green-400 h-full w-20 rounded-r cursor-pointer">
                                <span class="m-auto text-2xl text-white font-light w-5">+</span>
                            </button>
                        </div>
                    </div>


                    {{-- <div class="px-6 py-4 w-1/2 border border-black flex justify-between">
                                <img class="w-5" src="/Icons/minus.svg" alt="">
                                <p class="">1</p>
                                <img class="w-5" src="/Icons/plus.svg" alt="">
                            </div> --}}
                    <button onclick="AddToCart({{ $productDetail->id }}, 0)"
                        class="pb-3 w-full mt-9 px-6 py-4 border border-black font-bold font-xl">Add to
                        Cart</button>
                    <a href="#">
                        <button onclick="AddToCart({{ $productDetail->id }}, 1)"
                            class="w-full mt-4 px-6 py-4 border border-black font-bold font-xl bg-black text-white">Buy
                            it Now</button>
                    </a>
                    <p class="comment more tracking-wider py-4 text-gray-800">{{ $item->shortDescription }}
                    </p>
                    {{-- <button class="absolute p-5 -bottom-40 bg-gray-600 text-white">ADD TO CART</button> --}}
                </div>

            </div>
        </div>
        <p class="text-justify longDescription  tracking-wider py-4 text-gray-800">
        </p>


        {{-- <div class="mt-10 mx-auto w-1/2 h-[20rem]">
            <!-- Flickity HTML init -->
            <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                @foreach ($productImage as $item)
                    <div class="carousel-cell"><img src="/{{ $item->imageName }}" /></div>
                @endforeach
            </div>
            <style>
                .flickity-slider {
                    display: flex;
                    align-items: center;
                }

            </style>
            <div class="carousel carousel-nav"
                data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                @foreach ($productImage as $item)
                    <div class="carousel-cell"><img class="w-full h-full object-contain"
                            src="/{{ $item->imageName }}" /></div>
                @endforeach

            </div>

        </div><!-- /.container --> --}}
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

            let productDetail = {!! json_encode($productDetail) !!};

            $('.longDescription').html(productDetail['longDescription']);
        </script>
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
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
        <script src="https://npmcdn.com/flickity@2/dist/flickity.pkgd.js"></script>
        <script>
            function decrement(e) {
                const btn = e.target.parentNode.parentElement.querySelector(
                    'button[data-action="decrement"]'
                );
                const target = btn.nextElementSibling;
                let value = Number(target.value);
                if (value > 1) {
                    value--;
                    target.value = value;
                }
            }

            function increment(e) {
                const btn = e.target.parentNode.parentElement.querySelector(
                    'button[data-action="decrement"]'
                );
                const target = btn.nextElementSibling;
                let value = Number(target.value);
                value++;
                target.value = value;
            }

            const decrementButtons = document.querySelectorAll(
                `button[data-action="decrement"]`
            );

            const incrementButtons = document.querySelectorAll(
                `button[data-action="increment"]`
            );

            decrementButtons.forEach(btn => {
                btn.addEventListener("click", decrement);
            });

            incrementButtons.forEach(btn => {
                btn.addEventListener("click", increment);
            });

            $(document).ready(function() {
                $(".product_price").val($(".product_price_value").text());
            })

            function AddToCart(id, flag) {
                var quantity = $(".custom-number-input input").val();
                var price = $(".product_price").val();
                var total = quantity * price;
                var product_id = id;
                $.ajax({
                    url: "http://{{ tenant('domain') }}/purchase_item",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: product_id,
                        price: $(".product_price").val(),
                        quantity: $(".product_quantity").val(),
                        sub_total: $(".product_price").val() * $(".product_quantity").val()
                    },
                    success: function(data) {
                        console.log(data);
                        if (flag) {
                            window.location.replace('http://{{ tenant('domain') }}/shopping_cart');
                        }
                        // if (data.status == "success") {
                        //     alert("Item added to cart");
                        // } else {
                        //     alert("Item not added to cart");
                        // }
                    }
                });
            }
        </script>

</body>

</html>
