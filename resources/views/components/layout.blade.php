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
</head>

<body class="dark:bg-onyx dark:text-silver bg-silver text-onyx ">
    <nav>
        <div>logo</div>
        <div>links</div>
        <div>login</div>
    </nav>
    <main>
        {{ $slot}}
    </main>
</body>

</html>