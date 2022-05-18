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

        <div class="grid grid-cols-3 gap-4">
            <a href='/menuBuilder' class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-gray-200">
                        <div class="flex justify-left items-center pb-4 text-justify">
                            <img src="/Icons/menu.svg" class="w-5 mr-2" alt="">
                            <h1 class="text-xl">Menu Builder</h1>
                        </div>
                        <p class="text-xs">Easily create custom navigation lists</p>
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
                        <p class="text-xs">Visual overview of the site elements</p>
                    </div>
                </div>
            </a>

        </div>

    </div>
</x-app-layout>
