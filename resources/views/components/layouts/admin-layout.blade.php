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
    <meta name="robots" content="noindex,nofollow" />
    <title>{{ $title ? $title . ' - Admin CleanApp' : 'Admin CleanApp' }}</title>
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

<body class="admin-page">
    <x-elements.header.admin-header />

    <!-- Main Content -->
    <main class="konten container">
        <div class="row d-flex justify-content-between mb-3 gx-lg-5">
            <x-elements.nav.admin-nav />

            <!-- Dashboard Content -->
            <div class="col-lg-9 summary-chart">
                <div class="row">
                    <!-- Header Pager -->
                    <section class="col-12">
                        <h2 class="text-primary fw-bold mb-4">{{ $title }}</h2>
                    </section>
                    <!-- End of Header Pager -->
                </div>

                {{ $slot }}
                <!-- End of Peringkat Pegawai -->
            </div>
            <!-- End of Dashboard Content -->
        </div>
    </main>
    <!-- End of Main Content -->

    <x-elements.footer.admin-footer />
    @stack('body')
</body>

</html>