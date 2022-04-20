<script src="https://cdn.tailwindcss.com"></script>

<div class="my-10 flex justify-between mx-10 text-center">
    <h1 class="text-xl">Hello {{ tenant('name') }}</h1>
    <h1 class="text-xl">Id {{ tenant('id') }}</h1>
    <a href="/login" class="font-bold hover:text-blue-800">Login</a>
</div>
