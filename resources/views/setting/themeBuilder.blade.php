<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ tenant('email') }}
                </h2>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

            </div>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="mx-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="font-semibold">
                        Theme builder
                    </div>

                    <div class="grid grid-cols-2 gap-4 h-[30rem]">
                        <div class="">
                            <div class="flex gap-4 ml-2 mt-5 justify-start">
                                <div onClick='changeGlobleColor("indigo", this)' class="changeGlobleColorClass my-3 rounded-full bg-indigo-500 w-5 h-5" autoFocus>
                                </div>
                                <div onClick='changeGlobleColor("orange", this)' class="changeGlobleColorClass my-3 rounded-full bg-orange-500 w-5 h-5" autoFocus>
                                </div>
                                <div onClick='changeGlobleColor("red", this)' class="changeGlobleColorClass my-3 rounded-full bg-red-500 w-5 h-5" autoFocus></div>
                                <div onClick='changeGlobleColor("blue", this)' class="changeGlobleColorClass my-3 rounded-full bg-blue-500 w-5 h-5" autoFocus>
                                </div>
                                <div onClick='changeGlobleColor("pink", this)' class="changeGlobleColorClass my-3 rounded-full bg-pink-500 w-5 h-5" autoFocus>
                                </div>
                                <div onClick='changeGlobleColor("green", this)' class="changeGlobleColorClass my-3 rounded-full bg-green-500 w-5 h-5" autoFocus>
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-label :value="__('header_size')" class="mb-1" />
                                <select name="header_size" class="header_size  w-[13rem] pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="status">
                                    {{-- @foreach ($category_data as $item) --}}
                                    <option class="py-2 px-4 " value='text-xl'>Text xl</option>
                                    <option class="py-2 px-4 " value='text-2xl'>Text 2xl</option>
                                    <option class="py-2 px-4 " value='text-3xl'>Text 3xl</option>
                                    <option class="py-2 px-4 " value='text-4xl'>Text 4xl</option>
                                    <option class="py-2 px-4 " value='text-5xl'>Text 5xl</option>
                                    <option class="py-2 px-4 " value='text-6xl'>Text 6xl</option>
                                    <option class="py-2 px-4 " value='text-7xl'>Text 7xl</option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                            <div class="mt-4">
                                <x-label :value="__('Lable size')" class="mb-1" />
                                <select name="lable_size" class="lable_size w-[13rem] pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="status">
                                    {{-- @foreach ($category_data as $item) --}}
                                    <option class="py-2 px-4 " value='text-xs'>Text xs</option>
                                    <option class="py-2 px-4 " value='text-sm'>Text sm</option>
                                    <option class="py-2 px-4 " value='text-base'>Text base</option>
                                    <option class="py-2 px-4 " value='text-xl'>Text xl</option>
                                    <option class="py-2 px-4 " value='text-2xl'>Text 2xl</option>
                                    <option class="py-2 px-4 " value='text-lg'>Text lg</option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                            <div class="mt-4">
                                <x-label :value="__('Paragraph size')" class="mb-1" />
                                <select name="paragraph_size" class="paragraph_size w-[13rem] pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="status">
                                    {{-- @foreach ($category_data as $item) --}}
                                    <option class="py-2 px-4 " value='text-xs'>Text xs</option>
                                    <option class="py-2 px-4 " value='text-sm'>Text sm</option>
                                    <option class="py-2 px-4 " value='text-base'>Text base</option>
                                    <option class="py-2 px-4 " value='text-xl'>Text xl</option>
                                    <option class="py-2 px-4 " value='text-2xl'>Text 2xl</option>
                                    <option class="py-2 px-4 " value='text-lg'>Text lg</option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                        </div>

                        <div class="">
                            <div class="demo relative bg-gray-50 overflow-hidden">
                                <div class="w-full h-full overflow-hidden">
                                    <div class="relative">
                                        <main class="mx-auto max-w-7xl px-4">
                                            <div class="text-center">
                                                <h1 class=" tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                                    <span class="content_header [text-size]  block">Demo Page</span>
                                                    <span class="content_header [text-size] block text-indigo-600">For
                                                        globle theme</span>
                                                </h1>
                                                <br>
                                                <p class="content_paragraph mt-3 max-w-md mx-auto text-gray-500 md:max-w-3xl">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla unde
                                                    asperiores maxime molestiae
                                                    praesentium officiis suscipit tenetur, perspiciatis non ut.</p>
                                                <div onclick="changeColor()" class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                                                    <div class="rounded-md shadow">
                                                        <button href="" class="toster_button content_lable w-full flex items-center justify-center px-8 py-3 border border-transparent font-medium rounded-md text-white bg-indigo-600  content_theme_color">
                                                            Get started </button>
                                                    </div>
                                                    {{-- <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                                                        <a href="#"
                                                            class="content_lable w-full flex items-center justify-center px-8 py-3 border border-transparent font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:px-10">
                                                            Live demo </a>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </main>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            let theme = {!! json_encode($theme->toArray()) !!};
                            var currentGlobleColorTheme = theme[0]['theme_color'];
                            console.log(theme, 'theme_color');

                            // $('.changeGlobleColorClass').attr('class', $('.changeGlobleColorClass').attr('class').replace('indigo',
                            //     currentGlobleColorTheme));

                            $('.content_theme_color').attr('class', $('.content_theme_color').attr('class').replace('indigo',
                                currentGlobleColorTheme));


                            $('.lable_size').val(theme[0]['lable_size']).change();
                            $('.header_size').val(theme[0]['header_size']).change();
                            $('.paragraph_size').val(theme[0]['paragraph_size']).change();

                            function changeGlobleColor(color, el) {

                                // toastr display
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                                toastr.success('Theme color changed successfully');

                                console.log('color,', color);
                                console.log('changeGlobleColorClass', currentGlobleColorTheme);

                                $(".changeGlobleColorClass").removeClass("ring-4 outline-none ring-" + currentGlobleColorTheme + "-300");
                                $(el).addClass("ring-4 outline-none ring-" + color + "-300");

                                console.log('class -------', $('.content_theme_color').attr('class'));
                                console.log('currentGlobleColorTheme -------', currentGlobleColorTheme);
                                console.log('color -------', color);

                                $('.content_theme_color').attr('class', $('.content_theme_color').attr('class').replace(currentGlobleColorTheme,
                                    color));

                                currentGlobleColorTheme = color;
                                $.ajax({
                                    type: "PUT",
                                    url: "http://{{ tenant('domain') }}/themeBuilder/Globle",
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        page_id: 'Globle',
                                        theme_color: color,
                                        flag: 'theme_color',
                                        theme_flag: 'globle'
                                    },
                                    success: function(data) {
                                        console.log(data);
                                    }
                                });

                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var header_size;
        var lable_size;
        var paragraph_size;



        // -------------------------start Header set-----------------------------//
        let content_header_str = $('.content_header').attr("class");
        content_header_str = content_header_str.split(/(\s+)/);

        $('.content_header').attr('class', $('.content_header').attr('class').replace(content_header_str[2], theme[0][
            'header_size'
        ]));

        var temp_content_header_str = theme[0]['header_size'];

        // -------------------------End Header set-----------------------------//


        // --------------------Start change of header set----------------------//
        $('.header_size').change(function() {
            header_size = $('.header_size').val();
            $.ajax({
                type: "PUT",
                url: "http://{{ tenant('domain') }}/themeBuilder/Globle",
                data: {
                    _token: "{{ csrf_token() }}",
                    page_id: 'Globle',
                    header_size: header_size,
                    flag: 'header_size',
                    theme_flag: 'globle'
                },

                success: function(data) {
                    toastr.success("Header Size Changed Successfully");

                    console.log(theme[0]['header_size']);
                    new_content_header_str = header_size

                    let content_header_str = $('.content_header').attr("class");
                    let flag = $('.content_header').hasClass('text-size')
                    // content_header_str = content_header_str.split(/(\s+)/);
                    console.log('class -------', $('.content_header').attr('class'));
                    console.log('temp -------', temp_content_header_str);
                    $('.content_header').attr('class', $('.content_header').attr('class').replace(
                        temp_content_header_str, header_size));
                    temp_content_header_str = new_content_header_str
                    console.log(header_size, 'end here');

                }
            });
        });
        // -------------------------End change Header set-----------------------------//

        // -------------------------Start lable set----------------------------//
        let content_lable_str = $('.content_lable').attr("class");
        content_lable_str = content_lable_str.split(/(\s+)/);

        $('.content_lable').attr('class', $('.content_lable').attr('class').replace(content_lable_str[2], theme[0][
            'lable_size'
        ]));

        var temp_content_lable_str = theme[0]['lable_size'];

        // -------------------------End lable set------------------------------//

        // -------------------------Start change of lable set------------------------------//

        $('.lable_size').change(function() {
            lable_size = $('.lable_size').val();
            $.ajax({
                type: "PUT",
                url: "http://{{ tenant('domain') }}/themeBuilder/Globle",
                data: {
                    _token: "{{ csrf_token() }}",
                    page_id: 'Globle',
                    lable_size: lable_size,
                    flag: 'lable_size',
                    theme_flag: 'globle'
                },

                success: function(data) {
                    toastr.success("Lable Size Changed Successfully");
                    console.log(theme[0]['lable_size']);
                    new_content_lable_str = lable_size

                    let content_lable_str = $('.content_lable').attr("class");
                    let flag = $('.content_lable').hasClass('text-size')
                    // content_lable_str = content_lable_str.split(/(\s+)/);
                    console.log('lable class -------', $('.content_lable').attr('class'));
                    console.log('lable temp -------', temp_content_lable_str);
                    $('.content_lable').attr('class', $('.content_lable').attr('class').replace(
                        temp_content_lable_str, lable_size));
                    temp_content_lable_str = new_content_lable_str
                    console.log(lable_size, 'end here');

                }
            });
        });

        // -------------------------end change of lable set------------------------------//

        // -------------------------start pharagraph set-----------------------------//
        let content_paragraph_str = $('.content_paragraph').attr("class");
        content_paragraph_str = content_paragraph_str.split(/(\s+)/);

        $('.content_paragraph').attr('class', $('.content_paragraph').attr('class').replace(content_paragraph_str[2], theme[
            0]['paragraph_size']));

        var temp_content_paragraph_str = theme[0]['paragraph_size'];
        // -------------------------end pharagraph set-----------------------------//

        // -------------------------Start change of pharagraph set------------------------------//

        $('.paragraph_size').change(function(e) {
            paragraph_size = $('.paragraph_size').val();
            $.ajax({
                type: "PUT",
                url: "http://{{ tenant('domain') }}/themeBuilder/Globle",
                data: {
                    _token: "{{ csrf_token() }}",
                    page_id: 'Globle',
                    paragraph_size: paragraph_size,
                    flag: 'paragraph_size',
                    theme_flag: 'globle'
                },
                success: function(data) {
                    console.log(data);
                    toastr.success("Paragraph Size Changed Successfully");
                    let str = $('.content_paragraph').attr("class");
                    console.log(theme[0]['paragraph_size']);
                    new_content_paragraph_str = paragraph_size

                    let content_paragraph_str = $('.content_paragraph').attr("class");
                    let flag = $('.content_paragraph').hasClass('text-size')
                    // content_paragraph_str = content_paragraph_str.split(/(\s+)/);
                    console.log('paragraph class -------', $('.content_paragraph').attr('class'));
                    console.log('paragraph temp -------', temp_content_paragraph_str);
                    $('.content_paragraph').attr('class', $('.content_paragraph').attr('class').replace(
                        temp_content_paragraph_str, paragraph_size));
                    temp_content_paragraph_str = new_content_paragraph_str
                    console.log(paragraph_size, 'end here');
                }
            });
        });

        // -------------------------end change of pharagraph set------------------------------//


        // -------------------------start currency set-----------------------------//
        // let content_currency_str = $('.content_currency').attr("class");
        // content_currency_str = content_currency_str.split(/(\s+)/);
        // console.log(theme[0]['globle_currency'], '------------currency');
        // $('.content_currency').attr('class', $('.content_currency').attr('class').replace(content_currency_str[2], theme[0][
        //     'globle_currency'
        // ]));

        // var temp_content_currency_str = theme[0]['globle_currency'];
        // -------------------------end currency set-----------------------------//
    </script>
</x-app-layout>

<x-toster />
