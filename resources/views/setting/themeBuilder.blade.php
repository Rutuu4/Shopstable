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
                                    class="header_size w-[13rem] pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="status">
                                    {{-- @foreach ($category_data as $item) --}}
                                    <option class="py-2 px-4 " value='1.25rem'>Text xl</option>
                                    <option class="py-2 px-4 " value='1.5rem'>Text 2xl</option>
                                    <option class="py-2 px-4 " value='1.875rem'>Text 3xl</option>
                                    <option class="py-2 px-4 " value='2.25rem'>Text 4xl</option>
                                    <option class="py-2 px-4 " value='3rem'>Text 5xl</option>
                                    <option class="py-2 px-4 " value='3.75rem'>Text 6xl</option>
                                    <option class="py-2 px-4 " value='4.5rem'>Text 7xl</option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                            <div class="mt-4">
                                <x-label :value="__('Lable size')" class="mb-1" />
                                <select name="lable_size"
                                    class="lable_size w-[13rem] pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="status">
                                    {{-- @foreach ($category_data as $item) --}}
                                    <option class="py-2 px-4 " value='0.75rem'>Text xs</option>
                                    <option class="py-2 px-4 " value='0.875rem'>Text sm</option>
                                    <option class="py-2 px-4 " value='1rem'>Text base</option>
                                    <option class="py-2 px-4 " value='1.25rem'>Text xl</option>
                                    <option class="py-2 px-4 " value='1.5rem'>Text 2xl</option>
                                    <option class="py-2 px-4 " value='sdasdasd'>Text lg</option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                            <div class="mt-4">
                                <x-label :value="__('Paragraph size')" class="mb-1" />
                                <select name="paragraph_size"
                                    class="paragraph_size w-[13rem] pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="status">
                                    {{-- @foreach ($category_data as $item) --}}
                                    <option class="py-2 px-4 " value='0.75rem'>Text xs</option>
                                    <option class="py-2 px-4 " value='0.875rem'>Text sm</option>
                                    <option class="py-2 px-4 " value='1rem'>Text base</option>
                                    <option class="py-2 px-4 " value='1.25rem'>Text xl</option>
                                    <option class="py-2 px-4 " value='1.5rem'>Text 2xl</option>
                                    <option class="py-2 px-4 " value='sdasdasd'>Text lg</option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <iframe src="http://jay.master.net/demo" class="w-full h-full overflow-hidden" frameborder="0">
                        </iframe>
                        <script>
                            var currentGlobleColorTheme = "indigo";

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
                                        flag: 'Globle',
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
        $('.header_size').change(function() {
            console.log($('.header_size').val());
            console.log($('.lable_size').val());
            console.log($('.paragraph_size').val());
            var header_size = $('.header_size').val();
            var lable_size = $('.lable_size').val();
            var paragraph_size = $('.paragraph_size').val();

            $.ajax({
                type: "PUT",
                url: "http://{{ tenant('domain') }}/themeBuilder/Globle",
                data: {
                    _token: "{{ csrf_token() }}",
                    page_id: 'Globle',
                    header_size: header_size,
                    lable_size: lable_size,
                    paragraph_size: paragraph_size,
                    flag: 'Globle',
                },
                success: function(data) {
                    console.log(data);
                }
            });

            // var value = $(this).val();
            // $.ajax({
            //     type: "PUT",
            //     url: "http://{{ tenant('domain') }}/themeBuilder/Globle",
            //     data: {
            //         _token: "{{ csrf_token() }}",
            //         page_id: 'Globle',
            //         theme_color: value,
            //         flag: 'Header',
            //     },
            //     success: function(data) {
            //         console.log(data);
            //     }
            // });
        });
    </script>
</x-app-layout>
