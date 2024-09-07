<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords"
        content="CleanApp, CleanApp.id, CleanApp Indonesia, CleanApp Platform, CleanApp Platform Indonesia, CleanApp.id Platform, CleanApp.id Platform Indonesia" />
    <meta name="description"
        content="Platform yang menjembatani setiap individu untuk memberikan kontribusi nyata bagi bumi. CleanApp menyediakan kesempatan berkontribusi melalui awarness CleanUp, CleanFund, dan CleanAct">
    <meta name="robots" content="index,follow" />
    <title>{{ $title ? $title . ' - CleanApp' : 'CleanApp' }}</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,700&display=swap"
        rel="stylesheet">
    <link rel="preload" as="image" href="/images/login-illustration.webp">

    @vite($vite)

    @stack('head')
</head>

<body class="auth-page">
    <main class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            {{ $slot }}

        </div>
    </main>

    <img src="/images/login-illustration.webp" alt="" class="illustration">
    @stack('body')
</body>

</html>