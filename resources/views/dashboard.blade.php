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


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="">
                        <div x-data="{ show: false }" @click.away="show = false"> <button @click="show = ! show"
                                class="mt-4 border-0 block bg-blue-600 bg-blue-600 text-gray-200 rounded-lg px-6 text-sm py-3 overflow-hidden focus:outline-none focus:border-white">
                                <div class="flex justify-between"> <span>Dashboard</span> <svg
                                        class="fill-current text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                        height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M7 10l5 5 5-5z" />
                                        <path d="M0 0h24v24H0z" fill="none" />
                                    </svg> </div>
                            </button>
                            <div x-show="show" class="mt-2 py-2 bg-white rounded-lg shadow-xl">

                                @if (empty($page))
                                    <a href=""
                                        class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">no
                                        data available</a>
                                @endif
                                @if (!empty($page))
                                    @foreach ($page as $item)
                                        @if ($item->is_publish == 1)
                                            <a href="http://jay.master.net/pageBuilder/{{ $item->id }}"
                                                class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">{{ $item->name }}</a>
                                        @endif
                                    @endforeach
                                    {{ $page->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-full bg-gray-100">

                <div class="mx-auto py-12">
                    <div class="bg-white shadow-sm rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                            <h1 class="text-xl font-semibold">Publish Pages</h1>
                            {{-- <x-button class="ml-3">
                        <a href="addPages">
                            {{ __('Add page') }}
                        </a>
                    </x-button> --}}

                        </div>

                        <?php 
                        if(!empty($page)){
                          ?>
                        <div class="p-6">
                            <table class="table-fixed w-full">
                                <thead>
                                    <tr>
                                        <th class="pb-5">ID</th>
                                        <th class="pb-5">Name</th>
                                        <th class="pb-5">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                    @foreach ($page as $item)
                                        @if ($item->is_publish == 1)
                                            <tr>
                                                <td class="py-2">{{ $item->id }}</td>
                                                <td class="py-2">{{ $item->name }}</td>
                                                <td class="py-2 flex justify-center gap-2">
                                                    <a href="pageBuilder/{{ $item->id }}"
                                                        class="border p-1.5 rounded-lg hover:bg-indigo-200"><img
                                                            src="Icons/edit.svg" alt=""></a>

                                                    <button class="border p-1.5 rounded-lg hover:bg-red-400"
                                                        onclick="{document.getElementById('deleteform').submit();} ">

                                                        <img src=" Icons/delete.svg" alt="" /></button>
                                                    <form id="deleteform" action="deletePage/{{ $item->id }}"
                                                        method="POST">
                                                        @csrf</form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $page->links() }}
                        </div>
                        <?php
                        
                      }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
