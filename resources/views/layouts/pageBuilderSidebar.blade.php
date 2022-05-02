<script src="https://cdn.tailwindcss.com"></script>
<pnk rel="stylesheet" href="css/style.css">
    <!-- component -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <h1 class="my-4 mx-3 p-3 bg-sky-100 rounded-md text-xl text-center">Layouts</h1>
    <div id='toolbox' class="h-screen overflow-y-auto toolbox px-6 border-r divide-y">
        {{-- <ul class="divide-y"> --}}
        {{-- Navbar --}}

        <div class="">
            <button class="dropdown-btn flex items-center">
                <h1 class='my-2 font-medium tracking-wide'>Components</h1>
                <i class="fa fa-caret-down ml-5 "></i>
            </button>
            <div class="flex flex-col">
                {{-- Hero  Page --}}
                <div class="">
                    <h1 class='my-2 font-medium tracking-wide'>Hero Page</h1>
                    <p draggable="true"
                        class='rounded px-4 py-2 hover:bg-sky-400 hover:text-white  ml-4 my-2 text-xs font-medium tracking-wide'
                        data-template="hero_page_1">Hero Page 1</p>
                    <p draggable="true"
                        class='rounded px-4 py-2 hover:bg-sky-400 hover:text-white  ml-4 my-2 text-xs font-medium tracking-wide'
                        data-template="hero_page_2">Hero Page 2</p>
                </div>

                {{-- Typograpgy --}}
                <div class="">
                    <p class='my-2 font-medium tracking-wide'>Typograpy</p>
                    <p draggable="true"
                        class='rounded px-4 py-2 hover:bg-sky-400 hover:text-white ml-4 my-2 text-xs font-medium tracking-wide'
                        data-template="title">H1</p>
                </div>

                {{-- Images --}}
                <div class="">
                    <p class='my-2 font-medium tracking-wide'>Image Assets</p>
                    <p draggable="true"
                        class='rounded px-4 py-2 text-xs hover:bg-sky-400 hover:text-white ml-4 my-2 tracking-wide'
                        data-template="image_1">Image 1</p>
                    <p draggable="true"
                        class='rounded px-4 py-2 text-xs hover:bg-sky-400 hover:text-white ml-4 my-2 tracking-wide'
                        data-template="image_2">Image 2</p>
                </div>

                {{-- category --}}
                <div class="">
                    <h1 class='my-2 font-medium tracking-wide'>Category Grid</h1>
                    <p draggable="true"
                        class='rounded px-4 py-2 hover:bg-sky-400 hover:text-white  ml-4 my-2 text-xs font-medium tracking-wide'
                        data-template="category_grid">category_grid_1
                    </p>
                </div>
                {{-- product --}}
                <div class="">
                    <h1 class='my-2 font-medium tracking-wide'>product Grid</h1>
                    <p draggable="true"
                        class='rounded px-4 py-2 hover:bg-sky-400 hover:text-white  ml-4 my-2 text-xs font-medium tracking-wide'
                        data-template="product_grid">product_grid_1
                    </p>
                </div>
                {{-- Grid --}}
                <div class="">
                    <h1 class='my-2 font-medium tracking-wide'>Grid</h1>
                    <p draggable="true"
                        class='rounded px-4 py-2 hover:bg-sky-400 hover:text-white  ml-4 my-2 text-xs font-medium tracking-wide'
                        data-template="column-2">2 column
                    </p>
                </div>

                {{-- Pricing --}}
                <div class="">
                    <h1 class='my-2 font-medium tracking-wide'>Pricing</h1>
                    <p draggable="true"
                        class='rounded px-4 py-2 hover:bg-sky-400 hover:text-white  ml-4 my-2 text-xs font-medium tracking-wide'
                        data-template="pricing_1">Pricing 1
                    </p>
                </div>

                {{-- Gallary --}}
                <div class="">
                    <h1 class='my-2 font-medium tracking-wide'>Gallary</h1>
                    <p draggable="true"
                        class='rounded px-4 py-2 hover:bg-sky-400 hover:text-white  ml-4 my-2 text-xs font-medium tracking-wide'
                        data-template="gallery_1">Gallery 1
                    </p>
                </div>

                {{-- Feature --}}
                <div class="">
                    <h1 class='my-2 font-medium tracking-wide'>Features</h1>
                    <p draggable="true"
                        class='rounded px-4 py-2 hover:bg-sky-400 hover:text-white  ml-4 my-2 text-xs font-medium tracking-wide'
                        data-template="feature_1">Feature 1
                    </p>
                </div>

                {{-- Footer --}}
                <div class="">
                    <h1 class='my-2 font-medium tracking-wide'>Footer</h1>
                    <p draggable="true"
                        class='rounded px-4 py-2 hover:bg-sky-400 hover:text-white  ml-4 my-2 text-xs font-medium tracking-wide'
                        data-template="footer_1">Footer 1
                    </p>
                </div>
            </div>
        </div>



        {{-- </ul> --}}
    </div>
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var dropdownContent = this.nextElementSibling;
                    if (dropdownContent.style.display === "flex") {
                        dropdownContent.style.display = "none";
                    } else {
                        dropdownContent.style.display = "flex";
                    }
                }

            );
        }
    </script>
