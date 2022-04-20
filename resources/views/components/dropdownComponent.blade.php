<div class="">
    <button class="dropdown-btn flex items-center">
        <h1 class='my-2 font-medium tracking-wide'>Navbar</h1>
        <i class="fa fa-caret-down ml-5 "></i>
    </button>
    <div class="flex flex-col">
        <p draggable="true"
            class='rounded px-4 py-2 hover:bg-sky-400 hover:text-white  ml-4 my-2 text-xs font-medium tracking-wide'
            data-template="navbar">Navbar 1</p>
    </div>
</div>
@props(['placeholder' => 'Search', 'name' => 'search'])

<x-input :placeholder="$placeholder" :name="$name" autocomplete="off" />
