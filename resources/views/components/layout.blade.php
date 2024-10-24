<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <title>DynamicWeb</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <!-- Filepond stylesheet -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
</head>

<body class="min-h-screen flex flex-col bg-white text-onyx font-display font-bold justify-center ">



        <nav class='flex items-center justify-center w-full text-pearl py-2 px-4 border border-b-2 border-b-silver'>
            <div class="flex items-center justify-between w-full max-w-7xl ">

                <a href="/" class="flex space-x-6 items-center">
                    
                    <image src="{{Vite::asset('resources/images/dynamicweb_logo_lg.svg')}}" alt="logo"
                        class="bg-onyx bg-clip-content rounded-md" />
                    <h2 class="text-xl text-slate ">
                        DynamicWeb
                    </h2>
                </a>
                <div class="flex space-x-4 items-center">
                    @guest
                    <x-button-primary href='/login'>Login</x-button-primary>
                    @endguest
                    @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <x-form-button-primary type="submit" theme="light">Logout</x-form-button-primary>
                    </form>
                    @endauth
                </div>
            </div>
        </nav>

    <main class="flex flex-1 items-center  justify-between">
        {{ $slot}}
    </main>
    <!-- Load FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <!-- Turn all file input elements into ponds -->
    <script>
        FilePond.parse(document.body);
    </script>
    @vite('resources/js/app.js')
</body>

</html>