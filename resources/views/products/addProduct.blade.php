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

        .dropzone {
            background: white;
            border-radius: 5px;
            border: 1px dashed hsl(0, 0%, 50%, .5);
            border-image: none;
            margin-left: auto;
            margin-right: auto;
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
                        Media
                    </div>

                    {{-- Upload Image --}}
                    <div class="mt-2 w-full">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('uploadProductImage') }}" method='post'
                                    enctype='multipart/form-data' id='imageUpload' class='dropzone'>
                                    @csrf
                                    <div>
                                        <div class="text-center text-2xl">Drag and drop images!</div>
                                        <div class="dz-message  text-center">
                                            Accepts max 2 images only.
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="my-5 mx-10">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="font-semibold">
                        Product Data
                    </div>

                    <div class="my-5">
                        <form method="POST" action="/addProduct">
                            @csrf
                            <input type="hidden" name='imageUploadName' id='uploadedImages' />
                            <div class="my-5  mx-auto">
                                <div class="flex gap-6">
                                    <div>
                                        <x-label for="productTargetKeyword" :value="__('Target Keyword')" />
                                        <x-input id="productTargetKeyword" class="block mt-1 " type="text"
                                            name="productTargetKeyword" required autofocus />
                                    </div>
                                    <div>
                                        <x-label for="productTitle" :value="__('Title')" />
                                        <x-input id="productTitle" class="block mt-1 w-[35rem]" type="text"
                                            name="productTitle" required autofocus />

                                    </div>

                                </div>

                                <div class="my-5 flex justify-between">
                                    <div class="">
                                        <x-label for="Price" :value="__('Price')" />
                                        <x-input id="Price" class="block mt-1" type="number" name="price" value='0'
                                            required autofocus />
                                    </div>

                                    <div class="">
                                        <x-label :value="__('Category')" class="mb-1" />

                                        <select name="categorySelected"
                                            class="w-[13rem] pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            id="status">
                                            @foreach ($category_data as $item)
                                                <option class="py-2 px-4 " value={{ $item->id }}>
                                                    {{ $item->title ? $item->title : 'hello' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- status --}}
                                    <div class="">
                                        <x-label :value="__('Status')" class="mb-1" />
                                        <select name="productStatus"
                                            class="pr-8 pl-4 py-2 text-left rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            id="status">
                                            <option class="py-2 px-4 " value="Active">Active</option>
                                            <option class="py-2 px-4 " value="Deactive">Deactive</option>
                                        </select>
                                    </div>


                                </div>



                                <div class="flex gap-4 my-5">


                                    {{-- Is Featured --}}
                                    <div>
                                        <div>
                                            <x-label for="status" :value="__('Is Featured?')" class="text-center mb-1" />
                                            <div class="flex form-check justify-center gap-2">
                                                <div class="flex mt-2">
                                                    <input
                                                        class="form-check-input appearance-none rounded-full h-3 w-3 border border-gray-300 bg-white checked:bg-indigo-300 checked:border-indigo-200 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                        type="radio" name="productIsFeatured" id="flexRadioDefault10"
                                                        value="1">
                                                    <x-label for="status" :value="__('Yes')" class="mb-1" />
                                                </div>

                                                <div class=" flex mt-2">
                                                    <input
                                                        class="form-check-input appearance-none rounded-full h-3 w-3 border border-gray-300 bg-white checked:bg-indigo-300 checked:border-indigo-200 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                        type="radio" name="productIsFeatured" id="flexRadioDefault20"
                                                        value="0">
                                                    <x-label for="status" :value="__('No')" class="mb-1" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div>
                                    <x-label for="productShortDescription" :value="__('Short Description')" />
                                    <textarea id="productShortDescription" class="w-1/2 h-40 block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        type="text" name="productShortDescription" required autofocus></textarea>

                                </div>

                                <!-- Create the editor container -->
                                <div class="mx-auto mt-10 ">
                                    <x-label for="status" :value="__('Short Description')" class="mb-1" />
                                    <div id="editor" name="productShortDescription"></div>
                                </div>

                                <input type="hidden" name='productLongDescription' id='quillData' />
                                <!-- Include the Quill library -->
                                <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

                                <!-- Initialize Quill editor -->
                                <script>
                                    var quill = new Quill('#editor', {
                                        theme: 'snow'
                                    });

                                    quill.on('text-change', function(delta, oldDelta, source) {
                                        if (source == 'api') {
                                            console.log("An API call triggered this change.");
                                        } else if (source == 'user') {
                                            console.log("A user action triggered this change.");
                                        }
                                        //   $('#quillData').value(JSON.stringify(delta));
                                        document.getElementById('quillData').value = JSON.stringify(delta);
                                    });
                                </script>

                                <script>
                                    var imageName = [];
                                    Dropzone.options.imageUpload = {
                                        maxFilesize: 2,
                                        maxFiles: 2,
                                        acceptedFiles: " .jpeg,.jpg,.png,.gif",
                                        init: function() {
                                            this.on("success", function(file, responseText) {
                                                console.log('responseText');
                                            });
                                        },
                                        success: (file, response) => {
                                            console.log(JSON.parse(file.xhr.response).imageName);
                                            imageName.push(JSON.parse(file.xhr.response).imageName);
                                            console.log(imageName);
                                            document.getElementById('uploadedImages').value = JSON.stringify(imageName);
                                            console.log('value', document.getElementById('uploadedImages').value);
                                        }
                                    };
                                </script>
                            </div>
                            <div class="flex justify-center mb-5">
                                <x-button>Save</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
