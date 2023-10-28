<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="stylesheet" href="../css/app.css">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <title>GestoVoyage @yield('title')</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    @php
        $routeName = request()
            ->route()
            ->getName();
    @endphp

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid container border-bottom py-3">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}" class="fw-semibold">GestoVoyage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('logement.index') }}" @class([
                            'nav-link fw-medium',
                            'active text-primary' => str_starts_with($routeName, 'logement.'),
                        ])>Logement</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sejour.index') }}" @class([
                            'nav-link fw-medium',
                            'active text-primary' => str_starts_with($routeName, 'sejour.'),
                        ])>Sejour</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('voyageur.index') }}" class="btn btn-primary">Client</a>
        </div>
    </nav>

    <main class="container my-5">
        @yield('content')
    </main>

    {{-- @dump(request()->route()->getName()) --}}
</body>

</html>
