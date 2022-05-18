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
                                <div onClick='changeGlobleColor("indigo", this)'
                                    class="changeGlobleColorClass my-3 rounded-full bg-indigo-500 w-5 h-5" autoFocus>
                                </div>
                                <div onClick='changeGlobleColor("orange", this)'
                                    class="changeGlobleColorClass my-3 rounded-full bg-orange-500 w-5 h-5" autoFocus>
                                </div>
                                <div onClick='changeGlobleColor("red", this)'
                                    class="changeGlobleColorClass my-3 rounded-full bg-red-500 w-5 h-5" autoFocus></div>
                                <div onClick='changeGlobleColor("blue", this)'
                                    class="changeGlobleColorClass my-3 rounded-full bg-blue-500 w-5 h-5" autoFocus>
                                </div>
                                <div onClick='changeGlobleColor("pink", this)'
                                    class="changeGlobleColorClass my-3 rounded-full bg-pink-500 w-5 h-5" autoFocus>
                                </div>
                                <div onClick='changeGlobleColor("green", this)'
                                    class="changeGlobleColorClass my-3 rounded-full bg-green-500 w-5 h-5" autoFocus>
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-label :value="__('header_size')" class="mb-1" />
                                <select name="header_size"
                                    class="header_size  w-[13rem] pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="status">
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
                                <select name="lable_size"
                                    class="lable_size w-[13rem] pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="status">
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
                                <select name="paragraph_size"
                                    class="paragraph_size w-[13rem] pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="status">
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
                                                <h1
                                                    class=" tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                                    <span class="content_header [text-size]   block">Demo Page</span>
                                                    <span class="content_header [text-size] block text-indigo-600">For
                                                        globle theme</span>
                                                </h1>
                                                <p
                                                    class="content_paragraph mt-3 max-w-md mx-auto text-gray-500 md:max-w-3xl">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla unde
                                                    asperiores maxime molestiae
                                                    praesentium officiis suscipit tenetur, perspiciatis non ut.</p>
                                                <div onclick="changeColor()"
                                                    class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                                                    <div class="rounded-md shadow">
                                                        <a href="#"
                                                            class="content_lable w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                                            Get started </a>
                                                    </div>
                                                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                                                        <a href="#"
                                                            class="content_lable w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                                                            Live demo </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </main>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            var currentGlobleColorTheme = "indigo";
                            let theme = {!! json_encode($theme->toArray()) !!};
                            console.log(theme[0]['lable_size']);
                            $('.lable_size').val(theme[0]['lable_size']).change();
                            $('.header_size').val(theme[0]['header_size']).change();
                            $('.header_text').addClass(theme[0]['header_size'])
                            $('.content_paragraph').addClass(theme[0]['lable_size'])

                            function changeGlobleColor(color, el) {
                                console.log('color,', color);
                                console.log('changeGlobleColorClass', currentGlobleColorTheme);
                                $(".changeGlobleColorClass").removeClass("ring-4 outline-none ring-" + currentGlobleColorTheme + "-300");
                                $(el).addClass("ring-4 outline-none ring-" + color + "-300");
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
        var pID = $('.content_header').attr('class');
        pID = pID.split(/(\s+)/);

        function searchStringInArray(str, strArray) {
            for (var j = 0; j < strArray.length; j++) {
                if (strArray[j].match(str)) return j;
            }
            return -1;
        }

        // -------------------------start Header set-----------------------------//
        let content_header_str = $('.content_header').attr("class");

        content_header_str = content_header_str.split(/(\s+)/);

        $('.theClassThatsThereNow').addClass(theme[0]['header_size']).removeClass(content_header_str[2]);
        console.log('pID', theme[0]['header_size']);
        console.log('pID', $('.content_header').attr("class"));
        // let variables = [{
        //     name: "text-size",
        //     value: theme[0]['header_size']
        // }, {
        //     name: "color",
        //     value: theme[0]['theme_color']
        // }, {
        //     name: "paragraph_size",
        //     value: theme[0]['paragraph_size']
        // }];
        // let equation = $('.content_header').attr("class");

        // const getfinalEquation = (array, equationWithVars) => {
        //     let finalEquation = equationWithVars;

        //     array.forEach(item => {
        //         finalEquation = finalEquation.replaceAll(`[${item.name}]`, item.value);
        //     })

        //     return finalEquation;
        // }

        // console.log(getfinalEquation(variables, equation));

        $('.content_header').removeAttr();
        // $('.content_header').attr("class", getfinalEquation(variables, equation));
        // -------------------------End Header set-----------------------------//

        // -------------------------Start lable set----------------------------//
        // let content_lable_str = $('.content_lable').attr("class");
        // content_lable_str = content_lable_str.split(' ');

        // // let text = 'text';

        // let find = searchStringInArray('text', content_lable_str);
        // console.log(find, 'find');

        // for (i = 0; i < content_lable_str.length; i++) {
        //     if (i == find) {
        //         content_lable_str[i] = theme[0]['lable_size']
        //     }
        // }
        // content_lable_str = content_lable_str.join(' ');
        // console.log();

        // $('.content_lable').removeAttr();
        $('.content_lable').attr("class", content_lable_str);

        // -------------------------End lable set------------------------------//



        // -------------------------Start change of header set------------------------------//
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
                    let content_header_str = $('.content_header').attr("class");

                    content_header_str = content_header_str.split(' ');

                    $('.content_header').attr('class');
                    pID = pID.split(/(\s+)/);
                    let variables = [{
                        name: "text-size",
                        value: theme[0]['header_size']
                    }, {
                        name: "color",
                        value: theme[0]['theme_color']
                    }, {
                        name: "paragraph_size",
                        value: theme[0]['paragraph_size']
                    }];

                    let equation = $('.content_header').attr("class");

                    const getfinalEquation = (array, equationWithVars) => {
                        let finalEquation = equationWithVars;

                        array.forEach(item => {
                            finalEquation = finalEquation.replaceAll(`[${item.name}]`, item
                                .value);
                        })

                        return finalEquation;
                    }

                    console.log(getfinalEquation(variables, equation));

                    $('.content_header').removeAttr();
                    $('.content_header').attr("class", getfinalEquation(variables, equation));
                }
            });
        });


        $('.lable_size').change(function() {
            lable_size = $('.lable_size').val();
            console.log(lable_size);
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
                    console.log(data);
                    let str = $('.content_lable').attr("class");
                    str = str.split(' ');

                    // let text = 'text';

                    let find = searchStringInArray('text', str);
                    console.log(find);

                    for (i = 0; i < str.length; i++) {
                        if (i == find) {
                            str[i] = theme[0]['lable_size']
                        }
                    }

                    str = str.join(' ');
                    $('.content_lable').removeAttr('class').attr('class', str);

                    $('.content_lable').load(location.href)
                }
            });
        });

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

                    let str = $('.content_paragraph').attr("class");
                    str = str.split(' ');

                    // let text = 'text';

                    let find = searchStringInArray('text', str);
                    console.log(find);

                    for (i = 0; i < str.length; i++) {
                        if (i == find) {
                            str[i] = theme[0]['paragraph_size']
                        }
                    }

                    console.log('paragraph_size', theme[0]['paragraph_size']);
                    str = str.join(' ');
                    $('.content_paragraph').removeAttr('class').attr('class', str);
                }
            });
        });
    </script>
</x-app-layout>
