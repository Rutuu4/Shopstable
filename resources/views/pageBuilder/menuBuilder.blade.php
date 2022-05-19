<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="/js/app.js" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"
        integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="font-sans antialiased">

    <!-- Page Heading -->
    <header class="bg-white border-b border-indigo-200 shadow">

        <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{-- {{ $header }} --}}
            @include('layouts.header')
        </div>
    </header>


    <div class="grid grid-cols-10 min-h-screen ">

        <div class="col-span-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-span-8 py-4 bg-gray-100 ">

            <main>
                <div class="mx-10">

                    {{-- <x-button id="savePage">save</x-button> --}}
                    <div class="my-5">
                        <div class="text-2xl">
                            Main menu
                        </div>

                        <div class="my-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">

                                <div class="my-5">
                                    <x-label for="productTargetKeyword" :value="__('Menu Title')" />

                                    <x-input id="productTitle" class="block mt-1 w-full " value="Main Menu" type="text"
                                        name="productTitle" required autofocus />
                                </div>
                            </div>
                        </div>

                        <div class="my-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="px-6 pt-6 font-semibold">
                                Menu items
                            </div>
                            <div class="bg-white border-gray-200">
                                <div class="pt-5">
                                    <div id='simpleList' class="list-none">

                                        {{-- <div id="home_default"
                                            class="flex justify-between	border-t pl-4 rounded py-2 px-4">
                                            <div class="flex items-center">
                                                <img class='w-5 mr-2' src="/Icons/dragholder.svg" alt="">
                                                <div class="menuItemName">Home</div>
                                            </div>
                                            <div class="flex">
                                                <button
                                                    class="menu_item_edit px-4 py-2 border hover:bg-green-400 hover:text-white hover:bg-opacity-70">
                                                    edit</button>
                                                <button
                                                    class="menu_item_delete px-4 py-2 border hover:bg-red-400 hover:text-white hover:bg-opacity-70">
                                                    delete</button>
                                            </div>
                                        </div>


                                        <div id="contact_default"
                                            class="flex justify-between	 border-t pl-4 rounded py-2 px-4">
                                            <div class="flex items-center">
                                                <img class='w-5 mr-2' src="/Icons/dragholder.svg" alt="">
                                                <div class="menuItemName">contact</div>
                                            </div>
                                            <div class="flex">
                                                <button
                                                    class="menu_item_edit px-4 py-2 border hover:bg-green-400 hover:text-white hover:bg-opacity-70">
                                                    edit</button>
                                                <button
                                                    class="menu_item_delete px-4 py-2 border hover:bg-red-400 hover:text-white hover:bg-opacity-70">
                                                    delete</button>
                                            </div>
                                        </div> --}}

                                    </div>
                                    <div class="py-4 border-t hover:bg-blue-100 hover:bg-opacity-70">
                                        <button class='add_menu_item'>
                                            <div class="add_menu_item flex text-[#2C6ECB] pl-4 rounded py-2"><img
                                                    class='w-5 mr-2' src="/Icons/add.svg" alt="">
                                                add menu item
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <button type="button" id="saveCurrOrder">Current order!</button>
                    <x-button id="resetOrder">Reset</x-button> --}}

                    {{-- Model for add link --}}
                    <div class="add_menu_item_model hidden">
                        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                            aria-modal="">
                            <div
                                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                    aria-hidden="true">
                                </div>

                                <!-- This element is to trick the browser into centering the modal contents. -->
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                    aria-hidden="true">&#8203;</span>

                                <div
                                    class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <h1 class='ml-4 my-2 ml-54 text-xl'>Add Menu Item</h1>
                                        <div class="sm:flex sm:items-start">
                                            {{-- <div
                                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                <!-- Heroicon name: outline/exclamation -->
                                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                            </div> --}}
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <x-label for="menu_name" :value="__('Name')" />
                                                <x-input id="menu_name" class="block mt-1 w-full " type="text"
                                                    name="menu_name" required autofocus />


                                                <x-label for="menu_link" :value="__('Link')" class="mt-4" />
                                                <x-input id="menu_link" class="block mt-1 w-full " type="text"
                                                    name="menu_link" required autofocus />
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit, amet
                                                        consectetur adipisicing elit. Inventore, provident?.</p>
                                                </div>
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

                    {{-- Model for edit link --}}
                    <div class="edit_menu_item_model hidden">
                        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                            aria-modal="">
                            <div
                                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                    aria-hidden="true">
                                </div>

                                <!-- This element is to trick the browser into centering the modal contents. -->
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                    aria-hidden="true">&#8203;</span>

                                <div
                                    class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <h1 class='ml-4 my-2 ml-54 text-xl'>Edit Menu Item</h1>
                                        <div class="sm:flex sm:items-start">
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <x-label for="menu_name_edit" :value="__('Name')" />
                                                <x-input id="menu_name_edit" class="block mt-1 w-full " type="text"
                                                    name="menu_name_edit" required autofocus />


                                                <x-label for="menu_link_edit" :value="__('Link')"
                                                    class="mt-4" />
                                                <x-input id="menu_link_edit" class="block mt-1 w-full " type="text"
                                                    name="menu_link_edit" required autofocus />
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit, amet
                                                        consectetur adipisicing elit. Inventore, provident?.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button id='edit_menu_item_save' type="button"
                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">Edit</button>
                                        <button type="button"
                                            class="cancel_model_edit mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </main>
        </div>
        @if (!empty($nav_item))
            <script>
                console.log('sadsad');
                $.ajax({
                    type: "GET",
                    url: "http://{{ tenant('domain') }}/menuBuilder",
                    context: document.body,
                    success: function() {
                        var order = `{{ $nav_item }}`;
                        if (order[0] !== undefined) {
                            console.log('sadasdaddsafds', );
                        }
                    }
                }).done((data) => {

                    var nav_items = {!! json_encode($nav_item->toArray()) !!};
                    console.log('asAS', nav_items);
                    console.log($("#simpleList")[0].childNodes[2]);

                    for (let index = 0; index < nav_items.length; index++) {
                        // const element = array[index];
                        // console.log(nav_items.length);
                        $("#simpleList")[0].innerHTML += `<div id= ` + nav_items[index]['nav_item_id'] + `
                                            class="flex justify-between	 border-t pl-4 rounded py-2 px-4">
                                            <div class="flex items-center">
                                                <img class='w-5 mr-2' src="/Icons/dragholder.svg" alt="">
                                                <div class="menuItemName">` + nav_items[index]['nav_item_name'] + `</div>
                                            </div>
                                            <div class="flex gap-4">
                                                <button class="menu_item_edit border p-1.5 rounded-lg hover:bg-indigo-400">
                                                    <img src="/Icons/edit.svg" alt=""></button>
                                                <button class="w-10 menu_item_delete border p-1.5 rounded-lg hover:bg-red-400">
                                                    <img src=" Icons/delete.png" alt="" /></button>
                                            </div>
                                        </div>`;

                    }
                    console.log($("#simpleList")[0]);
                    // $("#simpleList")[0].childNodes[1].childNodes[1].querySelector('.menuItemName').innerHTML +=
                    // order ? order : [];;
                });;
            </script>
        @endif


    </div>

    <script>
        // console.clear();
        var nav_item_data;
        var demo;
        var simpleList = document.getElementById('simpleList');
        var sortable = new Sortable(simpleList, {
            animation: 150,
            group: "menuBuilderGroup",

            // onStart: function(evt) {
            //     originalList = [...document.querySelectorAll("#items > div")].map(el => el.id);
            // },

            axis: 'y',
            onSort: function(e, ui) {
                var items = e.to.children;
                var result = [];
                // var data = sortable('serialize');
                // console.log(sortable.toArray());
                for (var i = 0; i < items.length; i++) {
                    // result.push($(items[i]).data('id'));
                    // console.log(e.target.childNodes[2].id, sortable.toArray()[i]);
                    // e.target.childNodes[2].id = sortable.toArray()[i]
                    // e. = sortable.toArray()[i];
                    // console.log(sortable.toArray());
                    console.log($(items[i]));
                    // console.log($('#' + e.target.childNodes[2].id));
                    $.ajax({
                        type: "PUT",
                        url: "http://{{ tenant('domain') }}/menubuilder_link",
                        data: {
                            // nav_item_name: $('#' + e.target.childNodes[2].id).childNodes[1],
                            // nav_item_link: $('#' + e.target.childNodes[2].id).childNodes[1],
                            nav_item_id: $(items[i]).attr('id'),
                            nav_item_order: i,
                        },
                        success: 'success',
                    });
                    console.log(i);
                }
            },
        });
$(document).ready(function() {

})
        $(".add_menu_item").click(function() {
            console.log('hidden');
            $('.add_menu_item_model').removeClass('hidden');
            $('#menu_name').val('');
            $('#menu_link').val('');
        })

        // edit name and link
        $(document).on('click', '.menu_item_edit', function(e) {

            console.log('sdasdda', e.target.parentNode.parentNode.parentNode.childNodes[1]);

            $.ajax({
                type: "GET",
                url: "http://{{ tenant('domain') }}/menuBuilder",
                success: function(data) {
                    console.log(data);
                } // data sent to server, success: function(data){}

            }).done(() => {

                nav_item_data = {!! json_encode($nav_item) !!}
                demo = nav_item_data.filter(
                    function(data) {
                        return data.nav_item_id == e.target.parentNode.parentNode.parentNode.id
                    }
                );
                $("#menu_name_edit").val(demo[0].nav_item_name);
                $('#menu_link_edit').val(demo[0].nav_item_link);
                console.log(demo[0]['nav_item_link']);
            });

            $('#menu_link_edit').val($(e.target.parentNode.parentNode.parentNode.childNodes[1].childNodes[5])
                .text());
            $('#menu_name_edit').val();
            $('#menu_link_edit').val();
            $('.edit_menu_item_model').removeClass(
                'hidden');
            var menu_item_edit_id = e.target.parentNode.parentNode.parentNode.id;
            console.log(
                menu_item_edit_id);
            $('#edit_menu_item_save').click(function() {
                // let id = ;
                let menu_name_edit = $('#menu_name_edit').val();
                let menu_link_edit = $('#menu_link_edit').val();
                // console.log('sdasd', menu_item_edit_id);
                $.ajax({
                    type: "PUT",
                    url: "http://{{ tenant('domain') }}/menuBuilder/" + menu_item_edit_id,
                    data: {
                        nav_item_name: menu_name_edit,
                        nav_item_link: menu_link_edit,
                    }
                }).done((data) => {
                    console.log("edit menu updated");
                    $('.edit_menu_item_model').addClass('hidden');
                });
            });
        });


        $('#add_menu_item_save').click(function() {
            var menu_item_name = $('#menu_name').val();
            var menu_item_link = $('#menu_link').val();
            var menu_item_id = (performance.now().toString(36) + Math.random().toString(36)).replace(/\./g, "");
            console.log(menu_item_name);
            $('#simpleList').append(
                `<div id=` + menu_item_id + `
                                class="flex justify-between	 border-t pl-4 rounded py-2 px-4">
                                <div class="flex items-center">
                                    <img class='w-5 mr-2' src="/Icons/dragholder.svg" alt="">
                                    <div class="menuItemName">` + menu_item_name + `</div>
                                </div>
                                <div class="flex gap-4">
                                    <button
                                        class="menu_item_edit border p-1.5 rounded-lg hover:bg-indigo-400"><img
                                                src="/Icons/edit.svg" alt=""></button>
                                    <button
                                        class="w-10 menu_item_delete border p-1.5 rounded-lg hover:bg-red-400">
                                        <img src=" Icons/delete.png" alt="" /></button>
                                </div>
                            </div>`);
            console.log('sdasd', menu_item_id);

            $.ajax({
                type: "POST",
                url: "http://{{ tenant('domain') }}/menuBuilder",
                data: {
                    nav_item_name: menu_item_name,
                    nav_item_link: menu_item_link,
                    nav_item_id: menu_item_id,
                    nav_item_order: sortable.toArray().length
                },
                success: 'success',
            });
            $('.add_menu_item_model').addClass('hidden');
            // setTimeout(window.location.reload());
        });

        $(document).on('click', '.menu_item_delete', function(e) {
            console.log(e.target.parentNode.parentNode.parentNode.id);
            let delete_id = e.target.parentNode.parentNode.parentNode.id;

            var result = confirm("Are you sure to delete?");
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: "http://{{ tenant('domain') }}/menuBuilder/" + delete_id,
                    data: {}
                }).done((data) => {
                    console.log('item deleted')
                });
                $('#' + e.target.parentNode.parentNode.parentNode.id).remove();
            }

        });

        $(".cancel_model").click(function() {
            console.log('hidden');
            $('.add_menu_item_model').addClass('hidden');
        })

        $(".cancel_model_edit").click(function() {
            console.log('hidden');
            $('.edit_menu_item_model').addClass('hidden');
        })

        $.app = $.app || {};

        $.app.uiDraggable = {
            init: function() {
                var _self = this;
                _self.dragElements = [];

                $(".toolbox [draggable=true]").each(function() {

                    $(this).on("dragstart", function() {
                        _self.currentDragItem = $("#js-templates")
                            .find('[data-label="' + $(this).data("template") + '"]')
                            // .clone()
                            .html();

                        let count = Math.floor(Math.random() * 9999999);

                        $(".deleteElement").attr('id', Date.now().toString(36) + Math
                            .random()
                            .toString(36).substr(2));

                        // console.log(" <div id= '" + count + "'>" +
                        //     _self.currentDragItem + "< /div>");

                        _self.currentDragItem = " <div id= '" + count + "'" +
                            "class='border my-10' onclick='toggleBorder(event)'>" +
                            _self.currentDragItem + "</div>"
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

        // save edits
        // editables.forEach(el => {
        //     el.addEventListener("blur", () => {
        //         localStorage.setItem("dataStorage-" + el.id, el.innerHTML);
        //     })
        // });

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
    <script src="/js/webBuilder.js"></script>
</body>
<style>
    .hidden {
        display: hidden;
    }

    .align - right {
        text - align: right;
    }

    * {
        box - sizing: border - box;
    }

    html,
    body {
        font - family: 'Rajdhani', sans - serif;
    }

    ul {
        list - style: none;
        padding: 0;
        margin: 0;
        position: relative;
    }

    img {
        max - width: 100 %;
        height: auto;
    }

    /* .border {
            border: 1px dotted gray;
            padding: 3px;
        } */

    .canvas {
        border: 1 px solid gray;
        margin - top: 20 px;
        min - height: 300 px;
        padding: 3 px;
        position: relative;
    }

    /* .canvas [data-handle] {

        } */

    .img - pos {}

    .img - pos.close {}

    .row {
        position: relative;
        overflow: auto;
    }

    .row.col - md - 6 {
        float: left;
        width: 50 %;
    }

    .js - tooltip {
        position: absolute;
        top: 0;
        right: 0;
        background: blue;
    }

    .js - tooltip a {
        color: white;
        font - size: 9 px;
        display: inline - block;
    }

    /* article table */
    section table {
        width: 100 %;
        table - layout: fixed;
    }

    section table.white {
        background - color: white !important;
    }

    section.tbl - content {
        height: 100 %;
        overflow - x: auto;
        margin - top: 0 px;
        border: 1 px solid rgba(255, 255, 255, 0.3);
    }

    section th {
        width: 16.66 %;
        padding: 15 px 0 px;
        white - space: nowrap;
        text - align: center;
        background - color: #ff0054;
        font - weight: bold;
        color: #fff;
        text - transform: uppercase;
    }

    @media screen and(max - width: 812 px) {
        section th {
            font - size: 8 px;
        }
    }

    section td {
        width: 16.66 %;
        padding: 5 px 10 px;
        text - align: center;
        white - space: nowrap;
        vertical - align: middle;
        font - weight: bold;
        color: #000;
        border-bottom: solid 1px # bdbdbd;
    }

    @media screen and(max - width: 812 px) {
        section td {
            font - size: 12 px;
            padding: 5 px 5 px;
        }
    }

    @media screen and(max - width: 768 px) {
        section td.align - right {
            text - align: center;
        }
    }

    section.gray {
        background - color: #ededed;
    }

    @media screen and(max - width: 768 px) {
        section.align - right {
            text - align: center;
        }
    }

    section.align - right span {
        position: relative;
        width: 100 %;
        height: 100 %;
    }

    @media screen and(max - width: 768 px) {
        section.align - right span: after {
            background - image: url(.. / img / hi - res / news / star - 1. png);
            width: 15 px;
            height: 15 px;
            background - repeat: no - repeat;
            background - size: contain;
            display: inline - block;
            content: "";
            transform: translateY(15 %);
            margin - left: 30 %;
        }
    }

    section.align - right img {
        position: relative;
        display: inline - block;
        transform: translateY(5 %);
        height: 11 px;
        right: 15 px;
        left: -10 px;
    }

    @media screen and(max - width: 768 px) {
        section.align - right img {
            height: 10 px;
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

</html>
