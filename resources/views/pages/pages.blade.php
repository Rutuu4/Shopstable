<x-app-layout>
    <link rel="stylesheet" href="//unpkg.com/grapesjs/dist/css/grapes.min.css">
    <script src="//unpkg.com/grapesjs"></script>

    <script src="/js/webBuilder.js" defer></script>

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
                                            <a class="hover:text-blue-300"
                                                href="http://{{ tenant('domain') }}/pageBuilderPreview/{{ $item->id }}"><img
                                                    class="mx-auto w-5" src="/Icons/eye.png" alt=""></a>
                                        @else
                                            <a class="hover:text-blue-300"
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
