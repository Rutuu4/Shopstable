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

                    <div class="grid grid-cols-4 gap-4">
                        <div class="flex-row gap-4 ml-2 mr-6 mt-5 justify-end">
                            <div onClick='changeGlobleColor("indigo", this)'
                                class="changeGlobleColorClass my-3 rounded-full bg-indigo-500 w-5 h-5" autoFocus></div>
                            <div onClick='changeGlobleColor("orange", this)'
                                class="changeGlobleColorClass my-3 rounded-full bg-orange-500 w-5 h-5" autoFocus></div>
                            <div onClick='changeGlobleColor("red", this)'
                                class="changeGlobleColorClass my-3 rounded-full bg-red-500 w-5 h-5" autoFocus></div>
                            <div onClick='changeGlobleColor("blue", this)'
                                class="changeGlobleColorClass my-3 rounded-full bg-blue-500 w-5 h-5" autoFocus></div>
                            <div onClick='changeGlobleColor("pink", this)'
                                class="changeGlobleColorClass my-3 rounded-full bg-pink-500 w-5 h-5" autoFocus></div>
                            <div onClick='changeGlobleColor("green", this)'
                                class="changeGlobleColorClass my-3 rounded-full bg-green-500 w-5 h-5" autoFocus></div>
                        </div>
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

                        <div class="">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
