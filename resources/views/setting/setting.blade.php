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

        <div class="grid grid-cols-3 ">
            <a href='/menuBuilder' class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-gray-200">
                        <div class="flex justify-left items-center pb-4 text-justify">
                            <img src="/Icons/menu.svg" class="w-5 mr-2" alt="">
                            <h1 class="text-xl">Menu Builder</h1>
                        </div>
                        <p class="">Easily create custom navigation lists</p>
                    </div>
                </div>
            </a>

            <a href="/themeBuilder" class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white  border-gray-200">
                        <div class="flex justify-left items-center  pb-4 text-justify">
                            <img src="/Icons/theme.svg" class="w-5 mr-2" alt="">
                            <h1 class="text-xl">Theme Builder</h1>
                        </div>
                        <p class="">Visual overview of the site elements</p>
                    </div>
                </div>
            </a>
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white  border-gray-200">
                        <div class="flex justify-left items-center  pb-4 text-justify">
                            <img src="/Icons/coin.svg" class="w-5 mr-2" alt="">
                            <h1 class="text-xl">Globle Currency</h1>
                            {{-- <x-label :value="__('')" class="mb-1" /> --}}
                        </div>
                        <div class="">

                            <select name="text-sm content_currency"
                                class="content_currency w-[13rem] pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="status">
                                {{-- @foreach ($category_data as $item) --}}
                                @if (1 === 1)
                                    <option class="py-2 px-4 " value='$' selected>Dollar</option>
                                @else
                                    <option class="py-2 px-4 " value='$'>Dollar</option>
                                @endif
                                <option class="py-2 px-4 " value='€'>Euro</option>
                                <option class="py-2 px-4 " value='₹'>Rupees</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                    </div>
                </div>
                </d>
            </div>
        </div>
        <script>
            let theme = {!! json_encode($theme->toArray()) !!};
            $('.content_currency').val(theme[0]['globle_currency']).change();
            $('.content_currency').change(function(e) {
                globle_currency = $('.content_currency').val();
                $.ajax({
                    type: "PUT",
                    url: "http://{{ tenant('domain') }}/themeBuilder/Globle",
                    data: {
                        _token: "{{ csrf_token() }}",
                        page_id: 'Globle',
                        globle_currency: globle_currency,
                        flag: 'content_currency',
                        theme_flag: 'globle'
                    },
                    success: function(data) {
                        console.log(data);

                        let str = $('.content_currency').attr("class");
                        console.log(theme[0]['globle_currency']);
                        new_content_currency_str = globle_currency

                        let content_currency_str = $('.content_currency').attr("class");
                        let flag = $('.content_currency').hasClass('text-size')
                        // content_currency_str = content_currency_str.split(/(\s+)/);
                        console.log('currency class -------', $('.content_currency').attr('class'));
                        console.log('currency temp -------', temp_content_currency_str);
                        $('.content_currency').attr('class', $('.content_currency').attr('class').replace(
                            temp_content_currency_str, globle_currency));
                        temp_content_currency_str = new_content_currency_str
                        console.log(globle_currency, 'end here');
                    }
                });
            });
        </script>
</x-app-layout>
