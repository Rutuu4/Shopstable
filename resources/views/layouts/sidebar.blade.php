<nav x-data="{ open: false }" class="flex flex-col bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="">
        <div class="flex flex-col justify-between h-16">
            <div class="flex flex-col">
                <!-- Logo -->
                {{-- <div class="shrink-0 flex flex-col items-center">
          <a href="{{ route('dashboard') }}">
        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
        </a>
      </div> --}}

                <!-- component -->
                <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
                <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
                    <div @click.away="open = false"
                        class="flex flex-col w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0"
                        x-data="{ open: false }">
                        <div class="flex-shrink-0 py-4  flex flex-row items-center justify-between">
                            {{-- <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Flowtrail UI</a> --}}
                            <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline"
                                @click="open = !open">
                                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                    <path x-show="!open" fill-rule="evenodd"
                                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                    <path x-show="open" fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <nav :class="{ 'block': open, 'hidden': !open }"
                            class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">

                            <div class="py-1 my-1">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    <img src="/Icons/dashboard.svg" class="w-4 mr-2" alt="">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                            </div>
                            <div class="py-1 my-1">
                                <x-nav-link :href="route('category')" :active="request()->routeIs('category')">
                                    <img src="/Icons/category.svg" class="w-4 mr-2" alt="">
                                    {{ __('Category') }}
                                </x-nav-link>
                            </div>
                            <div class="py-1 my-1">
                                <x-nav-link :href="route('product')" :active="request()->routeIs('product')">
                                    <img src="/Icons/package.svg" class="w-4 mr-2" alt="">
                                    {{ __('Product') }}
                                </x-nav-link>
                            </div>
                            <div class="py-1 my-1">
                                <x-nav-link :href="route('pages')" :active="request()->routeIs('pages')">
                                    <img src="/Icons/page.svg" class="w-4 mr-2" alt="">
                                    {{ __('Pages') }}
                                </x-nav-link>
                            </div>

                            <div class="py-1 my-1">
                                <x-nav-link href="/settings" :active="request()->routeIs('settings')">
                                    <img src="/Icons/setting.svg" class="w-4 mr-2" alt="">
                                    {{ __('Setting') }}
                                </x-nav-link>
                            </div>

                            <div class="py-1 my-1">
                                <x-nav-link href="/menuBuilder" :active="request()->routeIs('menuBuilder')">
                                    <img src="/Icons/menu.svg" class="w-4 mr-2" alt="">
                                    {{ __('Menubuilder') }}
                                </x-nav-link>
                            </div>


                            {{-- <a href={{ route('dashboard') }} :active="request()->routeIs('dashboard')" class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"> {{ __('Dashboard') }}</a> --}}
                            {{-- <div @click.away="open = false" class="relative" x-data="{ open: false }">
              <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <span>Product</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </button>
              <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                  <div class="py-1 my-1">
                    <x-nav-link :href="route('product')" :active="request()->routeIs('product')">
                      {{ __('Home') }}
            </x-nav-link>
        </div>
        <div class="py-1 my-1">
          <x-nav-link :href="route('addProduct')" :active="request()->routeIs('addProduct')">
            {{ __('Add Product') }}
          </x-nav-link>
        </div>



        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #2</a>
        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #3</a>
      </div>
    </div>
  </div> --}}
                        </nav>
                    </div>
                </div>

                <!-- Navigation Links -->
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex-col">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          {{ __('Dashboard') }}
</x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex-col">
  <x-nav-link :href="route('category')" :active="request()->routeIs('category')">
    {{ __('Category') }}
  </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex flex-col">
  <x-nav-link :href="route('product')" :active="request()->routeIs('product')">
    {{ __('Product') }}
  </x-nav-link>
</div> --}}

            </div>

            <!-- Settings Dropdown -->
            {{-- <div class="hidden sm:flex flex-col sm:items-center sm:ml-6">
    <x-dropdown align="right" width="48">
      <x-slot name="trigger">
        <button class="flex flex-col items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
          <div>{{ Auth::user()->name }}</div>

<div class="ml-1">
  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
  </svg>
</div>
</button>
</x-slot>

<x-slot name="content">
  <!-- Authentication -->
  <form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
      {{ __('Log Out') }}
    </x-dropdown-link>
  </form>
</x-slot>
</x-dropdown>
</div> --}}

            <!-- Hamburger -->
            <div class="-mr-2 flex flex-col items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex flex-col items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex flex-col': !open }" class="inline-flex flex-col"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex flex-col': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    {{-- <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
</x-responsive-nav-link>
</div>

<!-- Responsive Settings Options -->
<div class="pt-4 pb-1 border-t border-gray-200">
  <div class="px-4">
    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
  </div>

  <div class="mt-3 space-y-1">
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
</div> --}}
</nav>
