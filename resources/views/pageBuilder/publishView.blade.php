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
    <script src="/js/webBuilder.js" defer></script>
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


    <div class="mt-5 mx-10 flex justify-between ">
        <a href="http://{{ tenant('domain') }}/pageBuilder/{{ $id }}">
            <x-button id="btn2">Web Builder</x-button>
        </a>
        <h1 class="text-xl font-semibold underline text-center">{{ $name }}</h1>
    </div>
    <div id="canvas" class="canvas mx-10" data-handle></div>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "http://{{ tenant('domain') }}/publish_page/{{ $id }}",
                // context: document.body,
                success: function() {
                    let pagedata = $.parseHTML(`{{ $pageData }}`);
                    // pagedata = pagedata[0];
                    console.log(pagedata);
                    document.getElementById("canvas").innerHTML += pagedata[0]['data'];
                    // document.getElementById("canvas").innerHTML += '<P>sdsasf</P>';
                }
            });
        });
    </script>
</body>

</html>
