<!DOCTYPE html>
<html lang="en">

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
    <meta name="googlebot" content="index,follow" />
    <meta name="bingbot" content="index,follow" />
    @if($titleMeta)
    <title>{{ $titleMeta . ' - CleanApp' }}</title>

    @else
    <title>{{ $title ? $title . ' - CleanApp' : 'CleanApp' }}</title>
    @endif
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        rel="stylesheet">
    @vite($vite)


    @stack('head')
</head>

<body class="user-page">
    <x-elements.header.user-header :title="$title ? $title : null" :description="$description" />

    <!-- Main Content -->
    <main class="content container">
        <div class="row d-flex justify-content-between mb-3 gx-lg-5">
            <x-elements.nav.user-nav />

            <!-- Dashboard Content -->
            <div class="col-lg-9">
                <div class="row d-flex justify-content-center">
                    {{ $slot }}
                </div>

                <!-- End of Peringkat Pegawai -->
            </div>
            <!-- End of Dashboard Content -->
        </div>
    </main>
    <!-- End of Main Content -->

    <x-elements.footer.admin-footer />
    @include('sweetalert::alert')

</body>

</html>