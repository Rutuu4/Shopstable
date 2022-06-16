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
    {{-- <script src="/js/webBuilder.js" defer></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"
        integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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

        /*
        div:empty::before {
            content: 'fallback placeholder';
        } */
    </style>
    {{-- <div class="py-4 px-24 flex justify-between border-b-4 ">
        <a href="http://{{ tenant('domain') }}/pageBuilder/{{ $id }}">
            <x-button id="btn2">Web Builder
            </x-button>
        </a>
        <h1 class="text-xl font-semibold underline text-center">{{ $name }}</h1>
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
                        <x-button onclick="history.back()">
                            {{ __('Back') }}
                        </x-button>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <div id="canvas" class="canvas mx-10" data-handle></div>

    @if (!empty($pageData))
        <script>
            // replace contenteditable="true" with contenteditable="false" i $('.pageBody')
            // $(".pageBody").html($(".pageBody").html().replaceAll(contenteditable = "true", ).)
            // $(any).attr('contenteditable', 'flase');
            $(document).ready(function() {
                console.log('ready');
                $('[contenteditable]').attr('contenteditable', false);

                var header_size;
                var lable_size;
                var paragraph_size;
                let theme = {!! json_encode($theme->toArray()) !!};

                // -------------------------start Header set-----------------------------//
                // let content_header_str = $('.content_header').attr("class");
                // content_header_str = content_header_str.split(/(\s+)/);
                // console.log(theme, 'theme');
                // console.log(theme['header_size'], 'header_size');
                // console.log(content_header_str[2], 'header_size');

                // $('.content_header').attr('class', $('.content_header').attr('class').replace(content_header_str[2],
                //     theme['header_size']));

                // -------------------------End Header set-----------------------------//

                // -------------------------Start lable set----------------------------//
                // let content_lable_str = $('.content_lable').attr("class");
                // content_lable_str = content_lable_str.split(/(\s+)/);
                // $('.content_lable').attr('class', $('.content_lable').attr('class').replace(content_lable_str[2], theme[
                //     'lable_size']));
                // var temp_content_lable_str = theme['lable_size'];
                // -------------------------End lable set------------------------------//

                // -------------------------start pharagraph set-----------------------------//
                // let content_paragraph_str = $('.content_paragraph').attr("class");
                // content_paragraph_str = content_paragraph_str.split(/(\s+)/);

                // $('.content_paragraph').attr('class', $('.content_paragraph').attr('class').replace(
                //     content_paragraph_str[2], theme['paragraph_size']));

                // var temp_content_paragraph_str = theme['paragraph_size'];
                // -------------------------end pharagraph set-----------------------------//

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
                            flag: 'local',
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
                        // console.log('pagedata', pagedata[0]['data']);

                        var currentColorTheme = {!! json_encode($theme->toArray()) !!};
                        let theme = {!! json_encode($theme->toArray()) !!};
                        console.log(currentColorTheme['theme_color'], 'currentColorTheme');
                        currentColorTheme = currentColorTheme['theme_color'];

                        // console.log('header_size',theme['header_size']);

                        // pagedata = pagedata[0];
                        if (pagedata[0] !== undefined) {
                            document.getElementById("canvas").innerHTML = pagedata[0]['data'];
                            console.log('ssssaaa', currentColorTheme);
                            // console.log('relpace html', $(".pageBody").html().replaceAll('indigo',
                            //     currentColorTheme));
                            console.log('0-------------------0');
                            $('[contenteditable]').attr('contenteditable', false);
                            $(".pageBody").html($(".pageBody").html().replaceAll('indigo',
                                currentColorTheme));

                            if ({!! !empty($category_data) !!}) {


                                $(".category_grid_1")[0].innerHTML = '';
                                // if ({!! json_encode($category_data->toArray()) !!}.length < 2) {
                                $(".category_grid_1").addClass(
                                    'px-6 mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8'
                                );


                                $.ajax({
                                    type: "GET",
                                    url: "http://{{ tenant('domain') }}/menuBuilder",
                                    context: document.body,
                                }).done((data) => {
                                    //
                                    var category_datas = {!! json_encode($category_data->toArray()) !!};


                                    for (let index = 0; index < category_datas
                                        .length; index++) {
                                        // const element = array[index];
                                        // console.log(category_datas.length);
                                        console.log('asdadaf', $(".category_grid_1")[0]);
                                        $(".category_grid_1")[0].innerHTML += `
                                    <div>
                                        <a href="http://{{ tenant('domain') }}/category/detail/` +
                                            category_datas[index]['id'] + `">
                                            <div class="relative">
                                                <div class="relative w-full h-40 rounded-lg overflow-hidden">
                                                    <img class="bg-fixed" src="/` + category_datas[index][
                                                'category_image'
                                            ] + `"
                                                        alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                                        class="w-full h-full object-center object-cover">
                                                </div>
                                                <div class="relative mt-4">
                                                    <h3 class="text-sm font-medium text-gray-900"> ` +
                                            category_datas[index]['title'] + `</h3>` +
                                            `<p class="text-truncate mt-1 text-sm text-gray-500">` +
                                            $(category_datas[index]['description']).html() +
                                            `</p>` +
                                            `</div>
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
                                    'px-6 mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8'
                                );

                                $.ajax({
                                    type: "GET",
                                    url: "http://{{ tenant('domain') }}/menuBuilder",
                                    context: document.body,
                                }).done((data) => {

                                    let product_datas = {!! json_encode($product_data->toArray()) !!};
                                    let product_image = {!! json_encode($product_image->toArray()) !!};
                                    console.log('asAS', [product_datas[0]['imageName']]);

                                    for (let index = 0; index < product_datas
                                        .length; index++) {
                                        // const element = array[index];
                                        // console.log(product_datas.length);
                                        console.log('asdadaf', $(".product_grid_1")[0]);
                                        $(".product_grid_1")[0].innerHTML +=
                                            `
                                    <div>
                                    <a href="http://{{ tenant('domain') }}/product/detail/` +
                                            product_datas[index]['id'] + `">
                                        <div class="relative">
                                            <div class="relative w-full h-40 rounded-lg overflow-hidden">
                                            <img class="" src="/` + product_datas[index]['imageName'] + `"
                                                alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                                                class="w-full h-full object-center object-cover">
                                        </div>

                                            <div class="relative mt-4">
                                                <h3 class="font-medium text-gray-900"> ` +
                                            product_datas[index]['title'] + `</h3>
                                                <p class="text-truncate mt-1 text-sm text-gray-500">` +
                                            product_datas[index][
                                                'shortDescription'
                                            ] + `</p>
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

                // console.log(($(".pageBody").html()));
                console.log('color,', color);
                if (currentColorTheme) {
                    console.log('currentColorTheme', currentColorTheme);
                    $(".changeColorClass").removeClass("ring-4 outline-none ring-" + currentColorTheme + "-300");
                    $(".pageBody").html($(".pageBody").html().replaceAll(currentColorTheme, color));
                    $(el).addClass("ring-4 outline-none ring-" + color + "-300");
                    currentColorTheme = color;
                }
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
            var shopping_item_count = {!! json_encode($purchase_product_count) !!};
        </script>
    @endif
    <script>
        document.querySelectorAll('[contentEditable]').forEach(function(element) {
            element.setAttribute('contenteditable', 'false');
        });
    </script>
</body>
<script></script>

</html>
