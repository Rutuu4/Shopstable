<x-app-layout>
    <link rel="stylesheet" href="//unpkg.com/grapesjs/dist/css/grapes.min.css">
    <script src="//unpkg.com/grapesjs"></script>

    <script src="/js/webBuilder.js" defer></script>
    <link rel="stylesheet" href="/CSS/style.css">
    <style>
        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

    </style>

    <div class="h-screen overflow-y-scroll no-scrollbar py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                    <h1 class="text-xl font-semibold">Pages</h1>
                    <x-button class="ml-3">
                        <a href="addPages">
                            {{ __('Add page') }}
                        </a>
                    </x-button>

                </div>

                <div class="p-6">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="pb-5">ID</th>
                                <th class="pb-5">Name</th>
                                <th class="pb-5">Action</th>
                                <th class="pb-5">Published Link</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            @foreach ($pages as $item)
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
                                        <form id="deleteform" action="deletePage/{{ $item->id }}" method="POST">
                                            @csrf</form>

                                    </td>

                                    <td class="py-2">
                                        @if ($item->is_publish == 1)
                                            <div class="flex items-center justify-center">
                                                <div x-data="{ tooltip: false }" class="relative z-30 inline-flex">
                                                    <div x-on:mouseover="tooltip = true"
                                                        x-on:mouseleave="tooltip = false"
                                                        class="rounded-md px-3 py-2  text-white cursor-pointer">
                                                        <a title="Hello from speech bubble!"
                                                            class="tooltip hover:text-blue-300"
                                                            href="http://{{ tenant('domain') }}/pageBuilderPreview/{{ $item->id }}"><img
                                                                class="mx-auto w-5" src="/Icons/eye.png" alt=""></a>

                                                    </div>
                                                    <div class="relative" x-cloak
                                                        x-show.transition.origin.top="tooltip">
                                                        <div
                                                            class="absolute top-0 z-10 w-44 p-2 -mt-1 text-sm leading-tight text-white transform -translate-x-1/2 -translate-y-full bg-orange-500 rounded-lg shadow-lg">
                                                            view publish page
                                                        </div>
                                                        <svg class="absolute z-10 w-6 h-6 text-orange-500 transform -translate-x-12 -translate-y-3 fill-current stroke-current"
                                                            width="8" height="8">
                                                            <rect x="12" y="-10" width="8" height="8"
                                                                transform="rotate(45)" />
                                                        </svg>
                                                    </div>
                                                </div>

                                            </div>
                                        @else
                                            <a title="Hello from speech bubble!" class="tooltip hover:text-blue-300"
                                                href="http://{{ tenant('domain') }}/pageBuilderPreview/{{ $item->id }}"><img
                                                    class="mx-auto w-5" src="/Icons/hidden_eye.png" alt=""></a>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                    {{ $pages->links() }}


                </div>

            </div>
        </div>
    </div>

</x-app-layout>
