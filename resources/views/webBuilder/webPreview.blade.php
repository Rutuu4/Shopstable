<script src="https://cdn.tailwindcss.com"></script>
<link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">
<header data-gjs-editable="false" data-gjs-removable="false"></header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/grapesjs/0.16.34/css/grapes.min.css">
    {{-- <link rel="stylesheet" href="css/webBuilder.css">
    <link rel="stylesheet" href="css/grapesjs-preset-webpage.min.css"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/grapesjs/0.16.34/grapes.min.js"></script>
</head>
<style>
    body,
    html {
        margin: 0;
        font: caption;
        height: 100%;
    }




    .gjs-blocks-cs {
        border: 1px solid rgba(0, 0, 0, 0.3);
        border-top: none;
    }

    /* Theming */
    .gjs-one-bg {
        background-color: #242A3B;
    }

    .gjs-two-color {
        color: #9ca8bb;
    }

    .gjs-three-bg {
        background-color: #1E8FE1;
        color: white;
    }

    .gjs-four-color,
    .gjs-four-color-h:hover {
        color: #1E8FE1;
    }

</style>
<form action="screenDataSave/{{ $id }}" method="POST">
    @csrf
    <div class="px-10 py-5 flex justify-between bg-slate-100">
        <h1 class="text-2xl">{{ $name['name'] }}</h1>
        {{-- <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
            href="" onclick="savePage()">Save</a> --}}
    </div>
    <div id="editor">
        <p>test</p>
    </div>
    <input type="hidden" name='savePageData' id='pageData' />
    <input type="hidden" name='assets' id='assets' />
    <input type="hidden" name='components' id='components' />
    <input type="hidden" name='html' id='html' />
    <input type="hidden" name='css' id='css' />
    <input type="hidden" name='styles' id='styles' />

</form>


<script src="https://cdn.jsdelivr.net/npm/grapesjs-preset-webpage"></script>
<script>
    function store() {
        document.getElementById('pageData').value = editor.store();
        document.getElementById('assets').value = JSON.stringify(editor.store().assets);
        document.getElementById('components').value = JSON.stringify(editor.store().components);
        document.getElementById('html').value = editor.getHtml();
        document.getElementById('css').value = editor.getCss();
        document.getElementById('styles').value = JSON.stringify(editor.store().styles);
    }
</script>


<script>
    const editor = grapesjs.init({
        container: "#editor",
        fromElement: false,

        // components: LandingPage.components || LandingPage.html,
        // // We might want to make the same check for styles
        // style: LandingPage.style || LandingPage.css,

        width: "auto",

        storageManager: {
            type: 'remote',
            // autosave: true,
            // stepsBeforeSave: 3,
            // urlStore: 'http://jay.master.net/web_builder/screenDataSave/{{ $id }}',
            urlLoad: 'http://jay.master.net/web_builder/screenDataLoad/{{ $id }}',
            // For custom parameters/headers on requests
            // params: {
            //     "_token": {{ csrf_token() }},
            // },
        },
    });

    function savePage() {
        editor.store(res => console.log('Store callback'));
    }

    // editor.on('storage:load', function(obj) {
    //     console.log('Loaded ', obj);
    // })
    // editor.on('asset:upload:response', (response) => {
    //     console.log('upLoaded ', response);
    // });
    // editor.on('storage:store', function(obj) {
    //     console.log('Stored ', obj);
    // })

    // editor.AssetManager.getAll().on('reset change', function(asset) {
    //     console.log('Assets changed', asset);
    // })

    // const amConfig = editor.AssetManager.getConfig();

    editor.on('change:changesCount', e => {
        // window.location.reload();
    });
    editor.on('load', () => {
        editor.setComponents(data[0].html);
        editor.setStyle(data[0].css);
        editor.runCommand("preview");
    });
</script>

<script>
    var data = {!! $data !!};
    console.log(data[0].html);
</script>
