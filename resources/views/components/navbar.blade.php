<div>
    <header class="text-gray-600 body-font">
        <div class="flex justify-between items-center ">

            <div class="flex flex-wrap p-5 flex-col md:flex-row items-center">
                <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2"
                        class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="ml-3 text-xl">Shopstable</span>
                </a>
                <script>
                    var count = 0;
                </script>
                {{-- {{$nav_item }} --}}
                @if (!empty($nav_item))
                    <div
                        class="md:mr-auto md:ml-4 md:py-1 md:pl-4  md:border-gray-400 flex flex-wrap text-base justify-center">
                        @foreach ($nav_item as $item)
                            <a target="_blank" href={{ $item->nav_item_link }} class="mx-2">
                                {{ $item->nav_item_name }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex items-center">
                {{-- @if ($user_id == null) --}}
                @if (1 == 1)
                    <a class="inline-flex items-center border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0"
                        href="http://{{ request()->getHttpHost() }}/customer/login">
                        Login
                    </a>
                    <a class="inline-flex items-center border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0"
                        href="http://{{ request()->getHttpHost() }}/customer/register">
                        Register
                    </a>
                @endif

                <a class='ml-5' href="http://{{ request()->getHttpHost() }}/shopping_cart">
                    <img src="/Icons/cart.svg" class='w-5' alt="">
                </a>
                <div
                    class="w-5 h-5 text-xs -mt-5 bg-green-400/90 rounded-full mx-auto text-white p-1 flex items-center justify-center">
                    1</div>
                <div class="py-2 px-5">
                    <x-button onclick="history.back()">
                        {{ __('Back') }}
                    </x-button>
                </div>
            </div>
        </div>
    </header>
</div>

@yield('content');
