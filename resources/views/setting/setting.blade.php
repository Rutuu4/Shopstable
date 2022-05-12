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
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-center items-center border-b pb-4 text-justify">
                            <img src="/Icons/menu.svg" class="w-4 mr-2" alt="">
                            <h1 class="">Menu Builder</h1>
                        </div>
                        <p class="pt-4">Menu Builder allows you to easily create custom menus/navigation lists
                            in the Panel using drag
                            and drop.</p>
                    </div>
                </div>
            </a>

            <a href="/themeBuilder" class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-center items-center border-b pb-4 text-justify">
                            <img src="/Icons/theme.svg" class="w-4 mr-2" alt="">
                            <h1 class="">Theme Builder</h1>
                        </div>
                        <p class="pt-4">The Theme Builder provides a visual overview of the site elements of
                            site, helping to guide through each of the site parts.</p>
                    </div>
                </div>
            </a>

        </div>

    </div>
</x-app-layout>
