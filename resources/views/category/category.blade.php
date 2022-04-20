<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <script>
        var dropzone = new Dropzone('#file-upload', {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 3,
            thumbnailHeight: 150,
            thumbnailWidth: 150,
            maxFilesize: 5,
            filesizeBase: 1500,
            thumbnail: function(file, dataUrl) {
                if (file.previewElement) {
                    file.previewElement.classList.remove("dz-file-preview");
                    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                    for (var i = 0; i < images.length; i++) {
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                    }
                    setTimeout(function() {
                        file.previewElement.classList.add("dz-image-preview");
                    }, 1);
                }
            }
        });

        var minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;
        dropzone.uploadFiles = function(files) {
            var self = this;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
                for (var step = 0; step < totalSteps; step++) {
                    var duration = timeBetweenSteps * (step + 1);
                    setTimeout(function(file, totalSteps, step) {
                        return function() {
                            file.upload = {
                                progress: 100 * (step + 1) / totalSteps,
                                total: file.size,
                                bytesSent: (step + 1) * file.size / totalSteps
                            };
                            self.emit('uploadprogress', file, file.upload.progress, file.upload
                                .bytesSent);
                            if (file.upload.progress == 100) {
                                file.status = Dropzone.SUCCESS;
                                self.emit("success", file, 'success', null);
                                self.emit("complete", file);
                                self.processQueue();
                            }
                        };
                    }(file, totalSteps, step), duration);
                }
            }
        }
    </script>
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
            background: #e3e6ff;
            border-radius: 13px;
            max-width: 550px;
            margin-left: auto;
            margin-right: auto;
            border: 2px dotted #1833FF;
            margin-top: 50px;
        }

    </style>

    <x-slot name="header">
        <div class="flex justify-between">

            <div class="flex ">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Category') }}
                </h2>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ tenant('email') }} </h2>
        </div>
    </x-slot>

    <div class="h-screen overflow-y-scroll no-scrollbar py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">

                    <h1 class="text-xl font-semibold">Category</h1>

                    <x-button class="ml-3">
                        <a href="addCategory">
                            {{ __('Add Category') }}
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
                                <th class="pb-5">Status</th>
                                <th class="pb-5">Is Featured</th>
                                <th class="pb-5">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            @foreach ($category as $item)
                                <tr>
                                    <td class="py-2">{{ $item->id }}</td>
                                    @if ($item->category_image == null)
                                        <td class="py-2"><img class="flex mx-auto w-20"
                                                src="images/1648554011.jpg" alt=""></td>
                                    @endif
                                    @if ($item->category_image !== null)
                                        <td class="py-2"><img class="flex mx-auto w-20"
                                                src={{ $item->category_image }} alt=""></td>
                                    @endif
                                    <td class="py-2">{{ $item->title }}</td>
                                    <td class="py-2">{{ $item->status }}</td>
                                    <td class="py-2">{{ $item->is_feature }}</td>
                                    <td class="py-2 flex justify-center gap-2">
                                        <button class="border p-1.5 rounded-lg hover:bg-indigo-200"><img
                                                src="Icons/edit.svg" alt=""></button>
                                        <form id="deleteform" action="deleteCategory/{{ $item->id }}" method="POST">
                                            @csrf</form>
                                        <button class="border p-1.5 rounded-lg hover:bg-red-400"
                                            onclick="if (confirm('Delete Category?') == true) {document.getElementById('deleteform').submit();} "><img
                                                src="Icons/delete.svg" alt="" /></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $category->links() }}

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
