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
        <h1 class="text-xl font-semibold underline text-center">{{ $name }}</h1>
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


    <div id="canvas" class="canvas mx-10" data-handle></div>

    @if (!empty($pageData))
        <script>
            $(document).ready(function() {
                // $('.changeColorClass').addClass("ring-4 outline-none ring-" + currentColorTheme + "-300");
                console.log(($(".pageBody").html()));
                $.ajax({
                    type: "GET",
                    url: "http://{{ tenant('domain') }}/pageBuilder/{{ $id }}",
                    // context: document.body,
                    success: function() {
                        let pagedata = $.parseHTML(`{{ $pageData }}`);
                        console.log('pagedata', pagedata[0]['data']);
                        // pagedata = pagedata[0];
                        if (pagedata[0] !== undefined) {
                            document.getElementById("canvas").innerHTML = pagedata[0]['data'];

                            if ({!! !empty($category_data) !!}) {


                                $(".category_grid_1")[0].innerHTML = '';
                                if ({!! json_encode($category_data->toArray()) !!}.length < 2) {
                                    $(".category_grid_1").addClass('grid grid-cols-2 px-6');
                                } else {
                                    $(".category_grid_1").addClass('grid grid-cols-3 gap-4 px-6');
                                }

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
                        <div class="flex justify-center">
                          <div class="border border-gray-300 rounded-lg hover:shadow-lg bg-white max-w-sm">
                            <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                <img class='h-40 object-fill w-full' src="/` + category_datas[index][
                                                'category_image'
                                            ] + `" alt="" class='rounded-lg'/>
                            </a>
                            <div class="p-6">
                              <h5 class="text-gray-900 text-xl font-medium mb-2"> ` + category_datas[index]
                                            ['title'] + `</h5>
                              <p class="text-gray-700 text-base">
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                              </p>

                            </div>
                          </div>
                        </div>
            `;
                                    }
                                    // $("#simpleList")[0].childNodes[1].childNodes[1].querySelector('.menuItemName').innerHTML +=
                                    // order ? order : [];;
                                });;

                            }

                            if ({!! !empty($product_data) !!}) {

                                $(".product_grid_1")[0].innerHTML = '';
                                if ({!! json_encode($product_data->toArray()) !!}.length < 2) {
                                    $(".product_grid_1").addClass('grid grid-cols-2 px-6');
                                } else {
                                    $(".product_grid_1").addClass('grid grid-cols-3 gap-4 px-6');
                                }

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
                                            <div class="flex justify-center">
                                                <div class="border border-gray-300 rounded-lg hover:shadow-lg bg-white max-w-sm">
                                                    <a href="http://{{ tenant('domain') }}/productDetail/` +
                                            product_datas[
                                                index]['id'] + `" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                                        <img class='h-40 object-fill w-full' src="/` + product_image[
                                                index]['imageName'] + `" alt="" class='rounded-lg' />
                                                        <div class="p-6">
                                                            <h5 class="text-gray-900 text-xl font-medium mb-2"> ` +
                                            product_datas[index]['title'] + `</h5>
                                                            <p class="text-gray-700 text-base">
                                                                Some quick example text to build on the card title and make up the bulk of the card'scontent.
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
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
            });
        </script>
    @endif
</body>

</html>
