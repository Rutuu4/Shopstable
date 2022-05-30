<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">


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

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product') }}
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ tenant('email') }}
            </h2>
        </div>
    </x-slot>
    <div class="h-screen overflow-y-scroll no-scrollbar py-12">

        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          Add New Product
        </div>
      </div>
    </div> --}}

        <div class="mx-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="font-semibold">
                        Add Page
                    </div>

                    {{-- Upload Image --}}
                    <div class="mt-2 w-full">
                        <div class="row">
                            <form method="POST" action="/addPages">
                                @csrf
                                <div class="my-5 col-md-12">
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-2" type="text" name="name"
                                        placeholder="Page Name" required autofocus />
                                </div>

                                <div class="flex justify-center mb-5">
                                    <x-button>Save</x-button>
                                </div>
                        </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>


</x-app-layout>
