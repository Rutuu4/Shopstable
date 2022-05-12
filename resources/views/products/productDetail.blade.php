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
    <style>
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

        .splide__slide img {
            width: 50%;
            height: auto;
            z-index: 9;
            /* display: flex;
            justify-content: center;
            margin-right: auto;
            margin-left: auto; */
        }

        .splide__slide {
            opacity: 0.6;
            object-fit: cover;
        }

        .splide__slide.is-active {
            opacity: 1;
        }

        .thumbnails {
            display: flex;
            margin: 1rem auto 0;
            padding: 0;
            justify-content: center;
        }

        .thumbnail {
            width: 70px;
            height: 70px;
            overflow: hidden;
            list-style: none;
            margin: 0 0.2rem;
            cursor: pointer;
            opacity: 0.3;

        }

        .thumbnail img {
            width: 100%;
            height: auto;

        }

        .thumbnail.is-active {
            opacity: 1;


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

        .home .splide__arrow svg,
        .site .splide__arrow svg {
            fill: none;
            stroke: currentColor;
            stroke-linecap: square;
            stroke-width: 8px;
            height: 2.2rem;
            vertical-align: middle;
            width: 2.2rem;
        }

        .splide__arrow.splide__arrow--next {
            position: absolute;
            right: 0;
            top: 50%;
            margin-top: 100px;
            z-index: 10;
            fill: #fff;
            background-color: #000;

        }



        .splide__arrow.splide__arrow--prev {
            position: absolute;
            left: 0;
            z-index: 10;
            margin-top: 100px;
            transform: rotate(180deg);
            -webkit-transform: rotate(180deg);
            fill: #fff;
            background-color: #000;


        }

        #main-carousel {
            position: relative;
        }

        /*
        div:empty::before {
            content: 'fallback placeholder';
        } */

    </style>
    <div class="py-4 px-24 flex justify-between border-b-4 ">
        <a href="http://{{ tenant('domain') }}/pageBuilder/{{ $id }}">
            <x-button id="btn2">Web Builder
            </x-button>
        </a>
    </div>

    <header class="text-gray-600 body-font">
        <div class="flex justify-between">


            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2"
                        class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <a href="">
                        <span class="ml-3 text-xl">Shopstable</span>
                    </a>
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

        </div>
    </header>


    <div class="py-2 px-6 md:py-4 md:px-24 ">
        @foreach ($productDetail as $item)
            <div class="">
                <div class="grid grid-cols-3 gap-8 realtive">
                    <div class="grid col-span-2 justify-center items-center">
                        <img class='w-fit block relative overflow-y-auto mx-auto' src="/{{ $item->imageName }}"
                            alt="">

                    </div>
                    <div class="">
                        <h1 class="text-4xl uppercase border-b pb-4 ">{{ $item->title }}</h1>
                        <h1 class="text-lg font-thin font-sans-serif py-4 ">Rs. {{ $item->price }}</h1>
                        {{-- <div class="text-md py-2 text-stone-500 font-light">Quantity</div> --}}

                        <div class="custom-number-input h-10 w-32">
                            <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">Quantity
                            </label>
                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-2 pb-2">
                                <button data-action="decrement"
                                    class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                    <span class="m-auto text-2xl font-thin w-5">−</span>
                                </button>
                                <input type="number"
                                    class="outline-none  text-center w-full  font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700 "
                                    name="custom-input-number" value="0" />
                                <button data-action="increment"
                                    class="text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin w-5">+</span>
                                </button>
                            </div>
                        </div>


                        {{-- <div class="px-6 py-4 w-1/2 border border-black flex justify-between">
                                <img class="w-5" src="/Icons/minus.svg" alt="">
                                <p class="">1</p>
                                <img class="w-5" src="/Icons/plus.svg" alt="">
                            </div> --}}
                        <button class="pb-3 w-full mt-9 px-6 py-4 border border-black font-bold font-xl">Add to
                            Cart</button>
                        <button
                            class="w-full mt-4 px-6 py-4 border border-black font-bold font-xl bg-black text-white">Buy
                            it Now</button>
                        <p class="text-xl tracking-wider py-4 text-gray-800">{{ $item->shortDescription }}
                        </p>
                        {{-- <button class="absolute p-5 -bottom-40 bg-gray-600 text-white">ADD TO CART</button> --}}
                    </div>
                </div>
            </div>
        @endforeach

        <section id="main-carousel" class="splide  mt-6" aria-label="My Awesome Gallery">
            <div class="splide__track">
                <ul class="splide__list static">
                    @foreach ($productImage as $item)
                        <li class="splide__slide">
                            <img class="absolute w-1/2 left-1/4" src="/{{ $item->imageName }}" alt="">
                        </li>
                    @endforeach

                    <div class="absolute bottom-0">
                        <ul id="thumbnails" class="thumbnails ">
                            @foreach ($productImage as $item)
                                <li class="thumbnail">
                                    <img src="/{{ $item->imageName }}" alt="">
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </ul>
            </div>
        </section>



        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
        <script>
            var splide = new Splide('#main-carousel', {
                pagination: false,
            });


            var thumbnails = document.getElementsByClassName('thumbnail');
            var current;

            for (var i = 0; i < thumbnails.length; i++) {
                initThumbnail(thumbnails[i], i);
            }

            function initThumbnail(thumbnail, index) {
                thumbnail.addEventListener('click', function() {
                    splide.go(index);
                });
            }

            splide.on('mounted move', function() {
                var thumbnail = thumbnails[splide.index];

                if (thumbnail) {
                    if (current) {
                        current.classList.remove('is-active');
                    }

                    thumbnail.classList.add('is-active');
                    current = thumbnail;
                }
            });

            splide.mount();

            function decrement(e) {
                const btn = e.target.parentNode.parentElement.querySelector(
                    'button[data-action="decrement"]'
                );
                const target = btn.nextElementSibling;
                let value = Number(target.value);
                value--;
                target.value = value;
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
        </script>

</body>

</html>
