<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">

            <div class="flex ">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Product') }}
                </h2>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ tenant('email') }}
            </h2>
        </div>
    </x-slot>
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
    <div class="h-screen overflow-y-scroll no-scrollbar py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                    <h1 class="text-xl font-semibold">Product</h1>
                    <x-button class="ml-3">
                        <a href="addProduct">
                            {{ __('Add Product') }}
                        </a>
                    </x-button>
                </div>

                <div class="p-6">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="pb-5">ID</th>
                                <th class="pb-5">Images</th>
                                <th class="pb-5">Title</th>
                                <th class="pb-5">Price</th>
                                <th class="pb-5">Status</th>
                                <th class="pb-5">Is Featured</th>
                                <th class="pb-5">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            @foreach ($products as $item)
                                <tr class="">
                                    <td class="py-2">{{ $item->id }}</td>
                                    @if ($item->imageName == null)
                                        <td class="py-2"><img class="flex mx-auto w-20"
                                                src="images/1648554011.jpg" alt=""></td>
                                    @endif
                                    @if ($item->imageName !== null)
                                        <td class="py-2"><img class="flex mx-auto w-20"
                                                src={{ $item->imageName }} alt=""></td>
                                    @endif

                                    <td class="py-2">{{ $item->title }}</td>
                                    <td class="py-2">{{ $item->price }}</td>
                                    <td class="py-2">{{ $item->status }}</td>
                                    <td class="py-2">{{ $item->isFeatured }}</td>
                                    <td class="py-2 flex justify-center  gap-2">
                                        <button class="border p-1.5 rounded-lg hover:bg-indigo-200"><img
                                                src="Icons/edit.svg" alt=""></button>
                                        <form id="deleteform" action="deleteProduct/{{ $item->id }}" method="POST">
                                            @csrf</form>
                                        <button class="border p-1.5 rounded-lg hover:bg-red-400"
                                            onclick="if (confirm('Delete product?') == true) {document.getElementById('deleteform').submit();} "><img
                                                src="Icons/delete.svg" alt="" /></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
