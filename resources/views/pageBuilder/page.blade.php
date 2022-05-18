<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

<body class="font-sans antialiased">
    <style>
        .hidden {
            display: hidden;
        }

        .align-right {
            text-align: right;
        }

        * {
            box-sizing: border-box;
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

        /* .border {
            border: 1px dotted gray;
            padding: 3px;
        } */

        .canvas {
            border: 1px solid gray;
            margin-top: 20px;
            min-height: 300px;
            padding: 3px;
            position: relative;
        }

        /* .canvas [data-handle] {

        } */

        .canvas [data-handle].hover {
            border: 1px solid orange;
        }

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
            /* border: 1px solid rgba(255, 255, 255, 0.3); */
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

        /*
        div:empty::before {
            content: 'fallback placeholder';
        } */

    </style>
    <!-- Page Heading -->
    <header class="bg-white border-b border-indigo-200 shadow">

        <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{-- {{ $header }} --}}
            @include('layouts.header')
        </div>
    </header>



    <div class="grid grid-cols-10 min-h-screen ">

        <div class="col-span-2">
            @include('layouts.pageBuilderSidebar')
        </div>
        <div class="col-span-8 py-4">

            <div class="flex justify-between ml-2 mr-6">
                <div class="">
                    <a href="http://{{ tenant('domain') }}/pageBuilderPreview/{{ $id }}">
                        <x-button id="Preview">Preview
                        </x-button>
                    </a>
                    <a href="http://{{ tenant('domain') }}/pages">
                        <x-button id="Preview">back
                        </x-button>
                    </a>
                    {{-- <a href="http://"+{{ tenant('domain') }}+"/publish_page/{{ $id }}">
                        <x-button id="preview_publish">Preview Publish
                        </x-button>
                    </a> --}}
                </div>
                <h1 class="text-xl font-semibold  text-center">Title: {{ $name }}</h1>
                <div>
                    <x-button id="savePage">save</x-button>
                    <x-button id="publish">Publish</x-button>
                </div>
            </div>
            <main>

                <div class="flex gap-4 ml-2 mr-6 mt-5 justify-end">
                    <div onClick='changeColor("indigo", this)'
                        class="changeColorClass rounded-full bg-indigo-500 w-5 h-5" autoFocus></div>
                    <div onClick='changeColor("orange", this)'
                        class="changeColorClass rounded-full bg-orange-500 w-5 h-5" autoFocus></div>
                    <div onClick='changeColor("red", this)' class="changeColorClass rounded-full bg-red-500 w-5 h-5"
                        autoFocus></div>
                    <div onClick='changeColor("blue", this)' class="changeColorClass rounded-full bg-blue-500 w-5 h-5"
                        autoFocus></div>
                    <div onClick='changeColor("pink", this)' class="changeColorClass rounded-full bg-pink-500 w-5 h-5"
                        autoFocus></div>
                    <div onClick='changeColor("green", this)' class="changeColorClass rounded-full bg-green-500 w-5 h-5"
                        autoFocus></div>
                </div>

                <script>
                    currentColorTheme = "indigo";

                    function changeColor(color, el) {
                        // console.log(($(".pageBody").html()));
                        console.log('color,', color);

                        console.log('currentColorTheme', currentColorTheme);
                        $(".changeColorClass").removeClass("ring-4 outline-none ring-" + currentColorTheme + "-300");
                        $(".pageBody").html($(".pageBody").html().replaceAll(currentColorTheme, color));
                        $(el).addClass("ring-4 outline-none ring-" + color + "-300");
                        currentColorTheme = color;
                        console.log(($(".pageBody").html()));
                        $.ajax({
                            type: "PUT",
                            url: "http://{{ tenant('domain') }}/themeBuilder/{{ $id }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                page_id: {{ $id }},
                                theme_color: color,
                                flag: 'Globle',
                            },
                            success: function(data) {
                                console.log(data);
                            }
                        });
                    }
                </script>
                <div class=" uiDraggable ml-2 mr-6">
                    <div id="canvas" class="pageBody h-screen overflow-y-auto canvas active rounded-lg" data-handle>
                    </div>
                </div>

                <library style="display: none">

                    <div id="js-tooltip">
                        <div class="js-tooltip">
                            <a href="javascript:">Edit</a>
                            <a href="javascript:">Remove</a>
                        </div>
                    </div>
                    <ul id="js-templates">

                        <li data-label="hero_page_1">
                            <x-delete-element />

                            <div class="hero_page_1" data-handle data-placeholder='hero_page_1'>
                                <section class="text-gray-600 body-font">
                                    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                                        <div class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded"
                                            data-handle data-placeholder='Place your Image Here'></div>
                                        <div class="text-center lg:w-2/3 w-full">
                                            <h1 class="header_text title-font  mb-4 font-medium text-gray-900"
                                                contenteditable="true">
                                                Hero Title</h1>
                                            <p contenteditable="true" class="paragraph_text mb-8 leading-relaxed">Lorem
                                                ipsum dolor sit
                                                amet consectetur,
                                                adipisicing elit. Alias cupiditate impedit inventore doloribus totam
                                                excepturi perferendis accusantium! Odit, quis optio.</p>
                                            <div class="flex justify-center">
                                                <div class="">
                                                    <button onmouseover="toggleAddLink(this)" contenteditable=" true"
                                                        class="lable_text h-10 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                                                </div>
                                                <x-linkelement />
                                                <x-link-data-model />
                                                <button contenteditable="true"
                                                    class="lable_text h-10 ml-4  inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded">Button</button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </li>

                        <li data-label="hero_page_2">
                            <x-delete-element />
                            <div class="hero_page_2" data-handle data-placeholder='hero_page_2'>
                                <section class="text-gray-600 body-font">
                                    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                                        <div
                                            class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                                            <h1 contenteditable="true"
                                                class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                                Hero Page
                                            </h1>
                                            <p contenteditable="true" class="mb-8 leading-relaxed">Lorem ipsum dolor sit
                                                amet consectetur adipisicing elit. Ad debitis quaerat ut sapiente
                                                pariatur et magnam facilis soluta maxime tempora.</p>
                                            <div class="flex justify-center">
                                                <button contenteditable="true"
                                                    class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600">Button</button>
                                                <button contenteditable="true"
                                                    class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
                                            </div>
                                        </div>
                                        <div class="lg:w-1/3 md:w-1/ w-5/6">
                                            <div class="object-cover object-center rounded" data-handle
                                                data-placeholder='Place your Image Here'></div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </li>

                        <li data-label="navbar">
                            <x-delete-element />
                            <div class="navabar" data-handle data-placeholder='Navabar'>
                                <header class="text-gray-600 body-font">
                                    <div class="container mx-auto flex flex-wrap flex-col md:flex-row items-center">
                                        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                                            {{-- <div class="w-10" data-handle data-placeholder='Icon'></div> --}}
                                            <img src="https://cdn.iconscout.com/icon/free/png-256/point-37-443143.png"
                                                class="w-10" alt="">
                                            <span class="ml-3 md:text-xl lg:text-2xl" contenteditable="true">Your
                                                shop</span>
                                        </a>
                                        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                                            <a class="mr-5 hover:text-gray-900" contenteditable="true">First Link</a>
                                            <a class="mr-5 hover:text-gray-900" contenteditable="true">Second Link</a>
                                            <a class="mr-5 hover:text-gray-900" contenteditable="true">Third Link</a>
                                            <a class="mr-5 hover:text-gray-900" contenteditable="true">Fourth Link</a>
                                        </nav>
                                        <button contenteditable="true"
                                            class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Button
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1"
                                                viewBox="0 0 24 24">
                                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </header>
                            </div>
                        </li>

                        <li data-label="title">
                            <x-delete-element />
                            <h2 contenteditable="true" data-handle class="text-4xl" data-placeholder='Title'></h2>

                        </li>
                        <li data-label="footer_1">
                            <x-delete-element />
                            <div data-handle>
                                <footer class="text-gray-600 body-font">
                                    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
                                        <a
                                            class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                                                viewBox="0 0 24 24">
                                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5">
                                                </path>
                                            </svg>
                                            <span contenteditable="true" class="ml-3 text-xl">Your footer</span>
                                        </a>
                                        <p contenteditable="true"
                                            class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
                                            © 2020 Your footer —
                                            <a contenteditable="true" href="#" class="text-gray-600 ml-1"
                                                rel="noopener noreferrer" target="_blank">@links</a>
                                        </p>
                                        <span
                                            class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                                            <a class="text-gray-500">
                                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                    <path
                                                        d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a class="ml-3 text-gray-500">
                                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                    <path
                                                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a class="ml-3 text-gray-500">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                    viewBox="0 0 24 24">
                                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a class="ml-3 text-gray-500">
                                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="0" class="w-5 h-5"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="none"
                                                        d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                                    </path>
                                                    <circle cx="4" cy="4" r="2" stroke="none"></circle>
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                </footer>
                            </div>
                        </li>
                        <li data-label="category_grid">
                            <x-delete-element />
                            <div data-handle>
                                <div class="">
                                    <div class="">
                                        <div class="text-center mx-auto mb-[60px] max-w-[510px]">
                                            <h2
                                                class="changebg font-bold text-3xl sm:text-4xl md:text-[40px] text-dark mb-4
                                            ">
                                                category
                                            </h2>
                                            <p class="text-base text-body-color">

                                            </p>
                                        </div>
                                        <div class="max-w-2xl mx-auto py-5 px-4 sm:py-5 sm:px-6 lg:max-w-7xl lg:px-8">
                                            <div class="category_grid_1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div data-handle> --}}
                                {{-- <section class="text-gray-600 body-font">
                                    <div class="container px-5 py-24 mx-auto"> --}}
                                {{-- {{ $category_data }} --}}
                                {{-- <section class="">
                                            <div class="flex flex-wrap justify-center -mx-4">
                                                <div class="w-full px-4">
                                                    <div class="text-center mx-auto mb-[60px] lg:mb-20 max-w-[510px]">
                                                        <h2
                                                            class="font-bold text-3xl sm:text-4xl md:text-[40px] text-dark mb-4">
                                                            Category
                                                        </h2>
                                                        <p class="text-base text-body-color">
                                                            There are many variations of passages of Lorem Ipsum
                                                            available
                                                            but the majority have suffered alteration in some form.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap -mx-4">

                                                @foreach ($category_data as $item)
                                                    <x-delete-element />
                                                    <div data-handle class="w-full md:w-1/2 lg:w-1/3 px-4">
                                                        <div class="">
                                                            <div class="max-w-[370px] mx-auto mb-10">
                                                                <div class="rounded overflow-hidden mb-8">
                                                                    <img src="/{{ $item->category_image }}"
                                                                        alt="image" class="w-full" />
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class=" bg-primary rounded inline-block text-center py-1 px-4 text-xs leading-loose font-semibold text-white mb-5">
                                                                        Dec 22, 2023
                                                                    </span>
                                                                    <h3>
                                                                        <a href="javascript:void(0)"
                                                                            class=" font-semibold text-xl sm:text-2xl lg:text-xl xl:text-2xl mb-4 inline-block text-dark hover:text-primary ">
                                                                            {{ $item->title }}
                                                                        </a>
                                                                    </h3>
                                                                    <p class="text-base text-body-color">
                                                                        {{ $item->description }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </section>

                                    </div>
                                </section> --}}
                                {{-- </div> --}}
                        </li>
                        <li data-label="product_grid">
                            <x-delete-element />
                            <div data-handle>
                                <div class="">
                                    <div class="">

                                        <div class="text-center mx-auto mb-[60px] max-w-[510px]">
                                            <h2
                                                class="font-bold text-3xl sm:text-4xl md:text-[40px] text-dark mb-4
                                            ">
                                                product
                                            </h2>
                                            <p class="text-base text-body-color">
                                            </p>
                                        </div>
                                        <div class="max-w-2xl mx-auto py-5 px-4 sm:py-5 sm:px-6 lg:max-w-7xl lg:px-8">
                                            <div class="product_grid_1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div data-handle> --}}
                            {{-- <section class="text-gray-600 body-font">
                                    <div class="container px-5 py-24 mx-auto"> --}}
                            {{-- {{ $product_data }} --}}
                            {{-- <section class="">
                                            <div class="flex flex-wrap justify-center -mx-4">
                                                <div class="w-full px-4">
                                                    <div class="text-center mx-auto mb-[60px] lg:mb-20 max-w-[510px]">
                                                        <h2
                                                            class="font-bold text-3xl sm:text-4xl md:text-[40px] text-dark mb-4">
                                                            product
                                                        </h2>
                                                        <p class="text-base text-body-color">
                                                            There are many variations of passages of Lorem Ipsum
                                                            available
                                                            but the majority have suffered alteration in some form.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap -mx-4">

                                                @foreach ($product_data as $item)
                                                    <x-delete-element />
                                                    <div data-handle class="w-full md:w-1/2 lg:w-1/3 px-4">
                                                        <div class="">
                                                            <div class="max-w-[370px] mx-auto mb-10">
                                                                <div class="rounded overflow-hidden mb-8">
                                                                    <img src="/{{ $item->product_image }}"
                                                                        alt="image" class="w-full" />
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class=" bg-primary rounded inline-block text-center py-1 px-4 text-xs leading-loose font-semibold text-white mb-5">
                                                                        Dec 22, 2023
                                                                    </span>
                                                                    <h3>
                                                                        <a href="javascript:void(0)"
                                                                            class=" font-semibold text-xl sm:text-2xl lg:text-xl xl:text-2xl mb-4 inline-block text-dark hover:text-primary ">
                                                                            {{ $item->title }}
                                                                        </a>
                                                                    </h3>
                                                                    <p class="text-base text-body-color">
                                                                        {{ $item->description }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </section>

                                    </div>
                                </section> --}}
                            {{-- </div> --}}
                        </li>
                        <li data-label="pricing_1">
                            <x-delete-element />
                            <div data-handle>
                                <section class="text-gray-600 body-font overflow-hidden">
                                    <div class="container px-5 py-24 mx-auto">
                                        <div class="flex flex-col text-center w-full mb-20">
                                            <h1 contenteditable="true"
                                                class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">
                                                Pricing</h1>
                                            <p contenteditable="true"
                                                class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-500">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, alias.
                                            </p>
                                            <div
                                                class="flex mx-auto border-2 border-indigo-500 rounded overflow-hidden mt-6">
                                                <button contenteditable="true"
                                                    class="py-1 px-4 bg-indigo-500 text-white focus:outline-none">Monthly</button>
                                                <button contenteditable="true"
                                                    class="py-1 px-4 focus:outline-none">Annually</button>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap -m-4">
                                            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                                                <div
                                                    class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">
                                                    <h2 contenteditable="true"
                                                        class="text-sm tracking-widest title-font mb-1 font-medium">
                                                        START</h2>
                                                    <h1 contenteditable="true"
                                                        class="text-5xl text-gray-900 pb-4 mb-4 border-b border-gray-200 leading-none">
                                                        Free
                                                    </h1>
                                                    <p contenteditable="true"
                                                        class="flex items-center text-gray-600 mb-2">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span contenteditable="true">Vexillologist pitchfork
                                                    </p>
                                                    <p contenteditable="true"
                                                        class="flex items-center text-gray-600 mb-2">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Tumeric plaid portland
                                                    </p>
                                                    <p contenteditable="true"
                                                        class="flex items-center text-gray-600 mb-6">
                                                        <span contenteditable="true"
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span contenteditable="true">Mixtape chillwave tumeric
                                                    </p>
                                                    <button contenteditable="true"
                                                        class="flex items-center mt-auto text-white bg-gray-400 border-0 py-2 px-4 w-full focus:outline-none hover:bg-gray-500 rounded">Button
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                        </svg>
                                                    </button>
                                                    <p contenteditable="true" class="text-xs text-gray-500 mt-3">
                                                        Literally you probably haven't
                                                        heard of them jean
                                                        shorts.</p>
                                                </div>
                                            </div>
                                            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                                                <div
                                                    class="h-full p-6 rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden">
                                                    <span contenteditable="true"
                                                        class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">POPULAR</span>
                                                    <h2 class="text-sm tracking-widest title-font mb-1 font-medium">PRO
                                                    </h2>
                                                    <h1 contenteditable="true"
                                                        class="text-5xl text-gray-900 leading-none flex items-center pb-4 mb-4 border-b border-gray-200">
                                                        <span contenteditable="true">$38</span>
                                                        <span contenteditable="true"
                                                            class="text-lg ml-1 font-normal text-gray-500">/mo</span>
                                                    </h1>
                                                    <p class="flex items-center text-gray-600 mb-2">
                                                        <span contenteditable="true"
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span contenteditable="true">Vexillologist pitchfork
                                                    </p>
                                                    <p contenteditable="true"
                                                        class="flex items-center text-gray-600 mb-2">
                                                        <span contenteditable="true"
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Tumeric plaid portland
                                                    </p>
                                                    <p contenteditable="true"
                                                        class="flex items-center text-gray-600 mb-2">
                                                        <span contenteditable="true"
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Hexagon neutra unicorn
                                                    </p>
                                                    <p contenteditable="true"
                                                        class="flex items-center text-gray-600 mb-6">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Mixtape chillwave tumeric
                                                    </p>
                                                    <button contenteditable="true"
                                                        class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Button
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                        </svg>
                                                    </button>
                                                    <p class="text-xs text-gray-500 mt-3">Literally you probably
                                                        haven't
                                                        heard of them jean
                                                        shorts.</p>
                                                </div>
                                            </div>
                                            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                                                <div
                                                    class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">
                                                    <h2 contenteditable="true"
                                                        class="text-sm tracking-widest title-font mb-1 font-medium">
                                                        BUSINESS</h2>
                                                    <h1 contenteditable="true"
                                                        class="text-5xl text-gray-900 leading-none flex items-center pb-4 mb-4 border-b border-gray-200">
                                                        <span contenteditable="true">$56</span>
                                                        <span contenteditable="true"
                                                            class="text-lg ml-1 font-normal text-gray-500">/mo</span>
                                                    </h1>
                                                    <p contenteditable="true"
                                                        class="flex items-center text-gray-600 mb-2">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Vexillologist pitchfork
                                                    </p>
                                                    <p class="flex items-center text-gray-600 mb-2">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Tumeric plaid portland
                                                    </p>
                                                    <p class="flex items-center text-gray-600 mb-2">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Hexagon neutra unicorn
                                                    </p>
                                                    <p class="flex items-center text-gray-600 mb-2">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Vexillologist pitchfork
                                                    </p>
                                                    <p class="flex items-center text-gray-600 mb-6">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Mixtape chillwave tumeric
                                                    </p>
                                                    <button
                                                        class="flex items-center mt-auto text-white bg-gray-400 border-0 py-2 px-4 w-full focus:outline-none hover:bg-gray-500 rounded">Button
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                        </svg>
                                                    </button>
                                                    <p class="text-xs text-gray-500 mt-3">Literally you probably
                                                        haven't heard of them jean
                                                        shorts.</p>
                                                </div>
                                            </div>
                                            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                                                <div
                                                    class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">
                                                    <h2 class="text-sm tracking-widest title-font mb-1 font-medium">
                                                        SPECIAL</h2>
                                                    <h1
                                                        class="text-5xl text-gray-900 leading-none flex items-center pb-4 mb-4 border-b border-gray-200">
                                                        <span>$72</span>
                                                        <span class="text-lg ml-1 font-normal text-gray-500">/mo</span>
                                                    </h1>
                                                    <p class="flex items-center text-gray-600 mb-2">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Vexillologist pitchfork
                                                    </p>
                                                    <p class="flex items-center text-gray-600 mb-2">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Tumeric plaid portland
                                                    </p>
                                                    <p class="flex items-center text-gray-600 mb-2">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Hexagon neutra unicorn
                                                    </p>
                                                    <p class="flex items-center text-gray-600 mb-2">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Vexillologist pitchfork
                                                    </p>
                                                    <p class="flex items-center text-gray-600 mb-6">
                                                        <span
                                                            class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                            <svg fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2.5" class="w-3 h-3"
                                                                viewBox="0 0 24 24">
                                                                <path d="M20 6L9 17l-5-5"></path>
                                                            </svg>
                                                        </span>Mixtape chillwave tumeric
                                                    </p>
                                                    <button
                                                        class="flex items-center mt-auto text-white bg-gray-400 border-0 py-2 px-4 w-full focus:outline-none hover:bg-gray-500 rounded">Button
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                        </svg>
                                                    </button>
                                                    <p class="text-xs text-gray-500 mt-3">Literally you probably
                                                        haven't heard of them jean
                                                        shorts.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </li>
                        <li data-label="gallery_1">
                            <x-delete-element />
                            <div data-handle>
                                <section class="text-gray-600 body-font">
                                    <div class="container px-5 py-24 mx-auto flex flex-wrap">
                                        <div class="flex w-full mb-20 flex-wrap">
                                            <h1 contenteditable="true"
                                                class="sm:text-3xl text-2xl font-medium title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-4">
                                                Lorem ipsum dolor sit amet.</h1>
                                            <p contenteditable="true"
                                                class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-base">Lorem ipsum
                                                dolor sit amet consectetur, adipisicing elit. Nisi, odio maxime. Iusto
                                                repellat maxime nostrum aliquam nesciunt vel quidem soluta dignissimos,
                                                voluptate molestiae nulla illum consequuntur officia laborum porro illo
                                                aut commodi blanditiis in possimus ab? Dignissimos excepturi modi
                                                consequuntur.</p>
                                        </div>
                                        <div class="flex flex-wrap md:-m-2 -m-1">
                                            <div class="flex flex-wrap w-1/2">
                                                <div class="md:p-2 p-1 w-1/2">
                                                    <div class="w-full object-cover h-full object-center block"
                                                        data-handle data-placeholder='Place Image 1 Here'></div>
                                                </div>
                                                <div class="md:p-2 p-1 w-1/2">
                                                    <div class="w-full object-cover h-full object-center block"
                                                        data-handle data-placeholder='Place your Image 1 Here'></div>
                                                </div>
                                                <div class="md:p-2 p-1 w-full">
                                                    <div class="w-full h-full object-cover object-center block"
                                                        data-handle data-placeholder='Place your Image 1 Here'></div>
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap w-1/2">
                                                <div class="md:p-2 p-1 w-full">
                                                    <div class="w-full object-cover h-full object-center block"
                                                        data-handle data-placeholder='Place your Image 1 Here'></div>
                                                </div>
                                                <div class="md:p-2 p-1 w-1/2">
                                                    <div class="w-full object-cover h-full object-center block"
                                                        data-handle data-placeholder='Place your Image 1 Here'></div>
                                                </div>
                                                <div class="md:p-2 p-1 w-1/2">
                                                    <div class="w-full object-cover h-full object-center block"
                                                        data-handle data-placeholder='Place your Image 1 Here'></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </li>
                        <li data-label="feature_1">
                            <x-delete-element />
                            <div data-handle>
                                <section class="text-gray-600 body-font">
                                    <div class="container px-5 py-24 mx-auto">
                                        <div class="text-center mb-20">
                                            <h1 contenteditable="true"
                                                class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">
                                                Lorem ipsum dolor sit amet.</h1>
                                            <p contenteditable="true"
                                                class="paragraph_text leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi
                                                assumenda quod, maxime quam aliquam voluptas.</p>
                                            <div class="flex mt-6 justify-center">
                                                <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
                                            <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                                                <div
                                                    class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" class="w-10 h-10"
                                                        viewBox="0 0 24 24">
                                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow">
                                                    <h2 contenteditable="true"
                                                        class="text-gray-900 text-lg title-font font-medium mb-3">
                                                        Lorem, ipsum dolor.</h2>
                                                    <p contenteditable="true" class="leading-relaxed text-base">Lorem,
                                                        ipsum dolor sit amet consectetur adipisicing elit. Illum
                                                        consectetur recusandae voluptatum necessitatibus voluptatibus
                                                        quis veritatis nobis tempora cum pariatur!</p>
                                                    <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                                                <div
                                                    class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" class="w-10 h-10"
                                                        viewBox="0 0 24 24">
                                                        <circle cx="6" cy="6" r="3"></circle>
                                                        <circle cx="6" cy="18" r="3"></circle>
                                                        <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow">
                                                    <h2 contenteditable="true"
                                                        class="text-gray-900 text-lg title-font font-medium mb-3">Lorem
                                                        ipsum dolor sit.</h2>
                                                    <p contenteditable="true" class="leading-relaxed text-base">Lorem
                                                        ipsum dolor sit amet consectetur adipisicing elit. Modi cumque
                                                        rerum optio perferendis distinctio mollitia pariatur totam
                                                        voluptatem omnis voluptates?</p>
                                                    <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                                                <div
                                                    class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" class="w-10 h-10"
                                                        viewBox="0 0 24 24">
                                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow">
                                                    <h2 contenteditable="true"
                                                        class="text-gray-900 text-lg title-font font-medium mb-3">
                                                        Lorem, ipsum dolor.</h2>
                                                    <p contenteditable="true" class="leading-relaxed text-base">Lorem
                                                        ipsum, dolor sit amet consectetur adipisicing elit. Distinctio,
                                                        explicabo ipsa sunt reprehenderit iste recusandae ad animi optio
                                                        quisquam tenetur!</p>
                                                    <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <button
                                            class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                                    </div>
                                </section>
                            </div>
                        </li>
                        <li data-label="image_1">
                            <x-delete-element />
                            <div data-handle>
                                <section class="text-gray-600 body-font">
                                    <img src="/images/1649314192.jpg" alt="">
                                </section>
                            </div>
                        </li>
                        <li data-label="image_2">
                            <x-delete-element />
                            <div data-handle>
                                <img src="/images/3400_3_02.jpg" alt="">
                            </div>
                        </li>
                        <li data-label="column-2">
                            <x-delete-element />
                            <div class="row" data-handle>
                                <div class="col-md-6" data-handle data-placeholder='Column - 1'></div>
                                <div class="col-md-6" data-handle data-placeholder='Column - 2'></div>
                            </div>
                        </li>
                        <li data-label="table">
                            <x-delete-element />
                            <section data-handle>
                                <!-- wrap-->
                                <div class="tbl-header">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <thead>
                                            <tr>
                                                <th class="white"></th>
                                                <th>rank</th>
                                                <th>top speed</th>
                                                <th>acceleration</th>
                                                <th>handling</th>
                                                <th>nitro</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="tbl-content">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td class="align-right"><img
                                                        src="https://media01.gameloft.com/web_mkt/minisites/asphalt-9/assets/os/img/hi-res/news/star-1.png"><span>1</span>
                                                </td>
                                                <td>2119</td>
                                                <td>310</td>
                                                <td>77.45</td>
                                                <td>49.6</td>
                                                <td>40.8</td>
                                            </tr>
                                            <tr>
                                                <td class="align-right"><img
                                                        src="https://media01.gameloft.com/web_mkt/minisites/asphalt-9/assets/os/img/hi-res/news/star-2.png"><span>2</span>
                                                </td>
                                                <td>2504</td>
                                                <td>315</td>
                                                <td>79.81 </td>
                                                <td>51.55</td>
                                                <td>45.92</td>
                                            </tr>
                                            <tr>
                                                <td class="align-right"><img
                                                        src="https://media01.gameloft.com/web_mkt/minisites/asphalt-9/assets/os/img/hi-res/news/star-3.png"><span>3</span>
                                                </td>
                                                <td>2886</td>
                                                <td>319.6 </td>
                                                <td>82.34</td>
                                                <td>53.64 </td>
                                                <td>50.57</td>
                                            </tr>
                                            <tr>
                                                <td class="align-right"><img
                                                        src="https://media01.gameloft.com/web_mkt/minisites/asphalt-9/assets/os/img/hi-res/news/star-4.png"><span>4</span>
                                                </td>
                                                <td>3199</td>
                                                <td>323.5</td>
                                                <td>84.32</td>
                                                <td>55.26</td>
                                                <td>54.66</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </li>

                    </ul>
                </library>

                {{-- Add Link Model --}}

                {{-- add_style_model --}}
                <div class="add_style_model transition duration-500 ease-in-out hidden">
                    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                        aria-modal="">
                        <div
                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
                            </div>

                            <!-- This element is to trick the browser into centering the modal contents. -->
                            <span
                                class="hidden transition duration-500 ease-in-out sm:inline-block sm:align-middle sm:h-screen"
                                aria-hidden="true">&#8203;</span>
                            <div
                                class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">

                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <x-label for="margin" :value="__('margin')" />
                                            <x-input id="margin" class="block mt-1 w-full " type="text" name="margin"
                                                required autofocus />


                                            <x-label for="padding" :value="__('padding')" class="mt-4" />
                                            <x-input id="padding" class="block mt-1 w-full " type="text" name="padding"
                                                required autofocus />
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button id='add_menu_item_save' type="button"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                                    <button type="button"
                                        class="cancel_model mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>

    <script>
        console.clear();
        // var el = document.getElementById('canvas');
        // var sortable = Sortable.create(el, {
        //     animation: 150,
        // });
        // $(document).on('click', '.menu_item_delete', function(e) {
        //     console.log('menu_item_delete',
        //         this.parentNode.id);
        //     $("#" + this.parentNode.parentNode.id).remove();
        // })
        // $(".deleteElement").click(function() {});



        $.app = $.app || {};

        $.app.uiDraggable = {
            init: function() {
                var _self = this;
                _self.dragElements = [];

                $(".toolbox [draggable=true]").each(function() {
                    // document.getElementsByClassName('deleteElement').addEventListener('click', function(e) {
                    //     // print current order
                    //     console.log(this.parentNode.id);
                    //     $("#" + this.parentNode.parentNode.id).remove();
                    //     this.stopPropagation();
                    // });

                    $(this).on("dragstart", function() {
                        var deleteButtonElement = $("#js-templates").find('[data-label="' + $(this)
                            .data("template") + '"]')[0].childNodes[1].childNodes[1];

                        deleteButtonElement.setAttribute("id", Math.floor(Math.random() * 9999999));

                        deleteButtonElement.parentNode.classList.add('z-10');
                        _self.currentDragItem = $("#js-templates")
                            .find('[data-label="' + $(this).data("template") + '"]')
                            // .clone()
                            .html();

                        let count = Math.floor(Math.random() * 9999999);

                        // $("#js-templates")
                        //     .find('[data-label="' + $(this).data("template") + '"]')[0].childNodes[1].childNodes[1].;


                        console.log(deleteButtonElement);
                        // $(".deleteElement").attr('id', Date.now().toString(36) + Math.random()
                        //     .toString(36).substr(2));

                        // console.log  (" <div id= '" + count + "'>" +
                        //     _self.currentDragItem + "< /div>");

                        _self.currentDragItem = " <div id= '" + count + "'" +
                            "class='my-10 transition duration-500 ease-in-out' onmouseover='toggleBorder(event)' onmouseout='toggleBorder(event)'>" +
                            _self.currentDragItem + "</div>"
                        console.log(_self.currentDragItem);
                        // $(this).data("template").attr("id", 'testId');
                    });
                });

                this.resetHandleEvents();
            },
            resetHandleEvents: function() {
                var _self = this;

                $("[data-handle]").each(function(e) {
                    var _this = this;
                    $(this)
                        .unbind("drop dragdrop dragover dragover dragleave")
                        .on("drop dragdrop", function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            $(this).append(_self.currentDragItem);

                            setTimeout(function() {
                                _self.resetHandleEvents();
                            }, 0);
                        })
                        .on("dragover dragenter", function(e) {
                            e.preventDefault();
                        })
                        .on("dragover", function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            $(this).addClass("hover");

                        })
                        .on("dragleave drop dragdrop", function() {
                            $("[data-handle]").removeClass("hover");
                        });
                });
            },
            // addTooltip: function(container) {
            //     $('.canvas').append($('#js-tooltip').clone().html());
            // }
        };

        $(function() {
            $.app.uiDraggable.init();
        });

        $("#savePage").click(function() {
            let canvasData = $("#canvas").html();
            console.log(canvasData);
            $.ajax({
                type: "PUT",
                url: "http://{{ tenant('domain') }}/pageBuilder/{{ $id }}",
                data: {
                    pageData: canvasData
                },
                success: 'success',
            });
        });

        $("#publish").click(function() {
            let canvasData = $("#canvas").html();
            $.ajax({
                type: "PUT",
                url: "http://{{ tenant('domain') }}/dashboard/update/{{ $id }}",
                data: {
                    pageData: canvasData
                },
                success: 'success',
            });
        });
        const editables = document.querySelectorAll("[contenteditable]");


        function saveLinkData(e) {
            var link_name = $('#link_name').val();
            var link_data = $('#link_data').val();
            var link_id = (performance.now().toString(36) + Math.random().toString(36)).replace(/\./g, "");



            $.ajax({
                type: "POST",
                url: "http://{{ tenant('domain') }}/linkData",
                data: {
                    page_id: link_id,
                    component_className: link_name,
                    link_name: link_name,
                    link_data: link_data,
                },
                success: function(data) {
                    console.log(data);
                }
            });
        }
        // save edits
        editables.forEach(el => {
            el.addEventListener("blur", () => {
                localStorage.setItem("dataStorage-" + el.id, el.innerHTML);
            })
        });

        // once on load
        if (localStorage.getItem(key) !== null) {
            for (var key in localStorage) {
                if (key.includes("dataStorage-")) {
                    const id = key.replace("dataStorage-", "");
                    document.querySelector("#" + id).innerHTML = localStorage.getItem(key);
                }
            }
        }


        var selector = '.classname';
        $(selector).on('click', function() {
            $(selector).removeClass('classname');
            $(this).addClass('classname');
        });
    </script>

    @if (!empty($pageData))
        <script>
            $(document).ready(function() {

                function changeColor(color, el) {
                    // console.log(($(".pageBody").html()));
                    console.log('color,', color);

                    console.log('currentColorTheme', currentColorTheme);
                    $(".changeColorClass").removeClass("ring-4 outline-none ring-" + currentColorTheme + "-300");
                    $(".pageBody").html($(".pageBody").html().replaceAll(currentColorTheme, color));
                    $(el).addClass("ring-4 outline-none ring-" + color + "-300");
                    currentColorTheme = color;
                    console.log(($(".pageBody").html()));
                    $.ajax({
                        type: "PUT",
                        url: "http://{{ tenant('domain') }}/themeBuilder/{{ $id }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            page_id: {{ $id }},
                            theme_color: color,
                            flag: 'Globle',
                        },
                        success: function(data) {
                            console.log(data);
                        }
                    });
                }
                // $('.changeColorClass').addClass("ring-4 outline-none ring-" + currentColorTheme + "-300");
                console.log(($(".pageBody").html()));
                $.ajax({
                    type: "GET",
                    url: "http://{{ tenant('domain') }}/pageBuilder/{{ $id }}",
                    // context: document.body,
                    success: function() {
                        let pagedata = $.parseHTML(`{{ $pageData }}`);
                        console.log('pagedata', pagedata[0]['data']);

                        let currentColorTheme = {!! json_encode($theme->toArray()) !!};
                        let theme = {!! json_encode($theme->toArray()) !!};
                        console.log(currentColorTheme['theme_color'], 'currentColorTheme');
                        currentColorTheme = currentColorTheme['theme_color'];

                        // console.log('header_size',theme['header_size']);

                        // pagedata = pagedata[0];
                        if (pagedata[0] !== undefined) {
                            document.getElementById("canvas").innerHTML = pagedata[0]['data'];
                            console.log('ssssaaa', currentColorTheme);
                            console.log('relpace html', $(".pageBody").html().replaceAll('indigo',
                                currentColorTheme));

                            $(".pageBody").html($(".pageBody").html().replaceAll('indigo',
                                currentColorTheme));
                            $('.header_text').find('text-')
                            console.log('header_size', $('.header_text').find('text-6xl'));
                            $('.header_text').addClass(theme['header_size']);
                            $('.lable_text').addClass(theme['lable_size']);
                            $('.paragraph_text').addClass(theme['paragraph_size']);


                            if ({!! !empty($category_data) !!}) {


                                $(".category_grid_1")[0].innerHTML = '';
                                // if ({!! json_encode($category_data->toArray()) !!}.length < 2) {
                                $(".category_grid_1").addClass(
                                    'px-6 mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8'
                                );


                                $.ajax({
                                    type: "GET",
                                    url: "http://{{ tenant('domain') }}/menuBuilder",
                                    context: document.body,
                                }).done((data) => {
                                    //

                                    var category_datas = {!! json_encode($category_data->toArray()) !!};
                                    console.log('asAS', category_datas);

                                    for (let index = 0; index < category_datas
                                        .length; index++) {
                                        // const element = array[index];
                                        // console.log(category_datas.length);
                                        console.log('asdadaf', $(".category_grid_1")[0]);
                                        $(".category_grid_1")[0].innerHTML += `
                                        <div>
                                            <a href="http://{{ tenant('domain') }}/categoryDetail/` +
                                            category_datas[index]['id'] + `">
                                                <div class="relative">
                                                    <div class="relative w-full h-72 rounded-lg overflow-hidden">
                                                        <img class="bg-fixed" src="/` + category_datas[index][
                                                'category_image'
                                            ] + `"
                                                            alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                                            class="w-full h-full object-center object-cover">
                                                    </div>
                                                    <div class="relative mt-4">
                                                        <h3 class="text-sm font-medium text-gray-900"> ` +
                                            category_datas[index]['title'] + `</h3>
                                                        <p class="mt-1 text-sm text-gray-500">  ` + category_datas[
                                                index]['description'] + `</p>
                                                    </div>
                                                    <div
                                                        class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                                                        <div aria-hidden="true"
                                                            class="absolute inset-x-0 bottom-0 h-36  ">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-6">

                                        </div>

                                        `;
                                    }
                                    // $("#simpleList")[0].childNodes[1].childNodes[1].querySelector('.menuItemName').innerHTML +=
                                    // order ? order : [];;
                                });;

                            }

                            if ({!! !empty($product_data) !!}) {

                                $(".product_grid_1")[0].innerHTML = '';

                                $(".product_grid_1").addClass(
                                    'px-6 mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8'
                                );

                                $.ajax({
                                    type: "GET",
                                    url: "http://{{ tenant('domain') }}/menuBuilder",
                                    context: document.body,
                                }).done((data) => {
                                    //

                                    var product_datas = {!! json_encode($product_data->toArray()) !!};
                                    var product_image = {!! json_encode($product_image->toArray()) !!};
                                    console.log('asAS', product_datas);

                                    for (let index = 0; index < product_datas
                                        .length; index++) {
                                        // const element = array[index];
                                        // console.log(product_datas.length);
                                        console.log('asdadaf', $(".product_grid_1")[0]);
                                        $(".product_grid_1")[0].innerHTML +=
                                            `
                                            <div>
                                            <a href="http://{{ tenant('domain') }}/productDetail/` +
                                            product_datas[index]['id'] + `">
                                                <div class="relative">
                                                    <div class="relative w-full h-72 rounded-lg overflow-hidden">
                                                        <img class="bg-fixed" src="/` + product_image[index][
                                                'imageName'
                                            ] + `"
                                                            alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                                            class="w-full h-full object-center object-cover">
                                                    </div>
                                                    <div class="relative mt-4">
                                                        <h3 class="text-sm font-medium text-gray-900"> ` +
                                            product_datas[index]['title'] + `</h3>
                                                        <p class="mt-1 text-sm text-gray-500">` + product_datas[index][
                                                'shortDescription'
                                            ] + `</p>
                                                    </div>
                                                    <div
                                                        class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                                                        <div aria-hidden="true"
                                                            class="absolute inset-x-0 bottom-0 h-36   ">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-6">
                                            </div>
                                        `
                                    }
                                    // $("#simpleList")[0].childNodes[1].childNodes[1].querySelector('.menuItemName').innerHTML +=
                                    // order ? order : [];;
                                });;
                            }
                        }
                        // document.getElementById("canvas").innerHTML += '<P>sdsasf</P>';
                    }
                });

                currentColorTheme = "indigo";

                // console.log(($(".pageBody").html()));
                console.log('color,', color);

                console.log('currentColorTheme', currentColorTheme);
                $(".changeColorClass").removeClass("ring-4 outline-none ring-" + currentColorTheme + "-300");
                $(".pageBody").html($(".pageBody").html().replaceAll(currentColorTheme, color));
                $(el).addClass("ring-4 outline-none ring-" + color + "-300");
                currentColorTheme = color;
                console.log(($(".pageBody").html()));

                $.ajax({
                    type: "GET",
                    url: "http://{{ tenant('domain') }}/themeBuilder",
                    success: function(data) {
                        globleTheme = data;
                        console.log('globleTheme', globleTheme);

                        let theme = {!! json_encode($theme->toArray()) !!};
                    }
                })
                $.ajax({
                    type: "PUT",
                    url: "http://{{ tenant('domain') }}/themeBuilder",
                    data: {
                        _token: "{{ csrf_token() }}",
                        page_id: {{ $id }},
                        theme_color: color,
                        flag: 'Globle',
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });

            });
        </script>
    @endif
    <script src="/js/webBuilder.js"></script>
</body>

</html>
