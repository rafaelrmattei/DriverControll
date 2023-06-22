<!DOCTYPE html>
<html lang="pt_BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('img') }}/incorporation.png">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <meta property="og:url" content="https://app.terraciclo.com.br/">
    <meta property="og:title" content="Terra Ciclo">
    <meta name="keywords" content="app, terra, ciclo">
    <meta name="description" content="App de controle interno">
    <meta property="og:description" content="App de controle interno">
    <title>{{ $pageTitle ?? 'Terra Ciclo' }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicon') }}/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicon') }}/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon') }}/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicon') }}/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon') }}/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon') }}/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicon') }}/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicon') }}/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon') }}/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('img/favicon') }}/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon') }}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon') }}/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon') }}/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('img/favicon') }}/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicon') }}/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="prefetch" href="https://fonts.gstatic.com" as="style">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    {{-- @vite('resources/css/app.css') --}}
  </head>
  <body class="font-baloo relative">
    <x-alerts.error></x-alerts.error>
    <div class="block lg:flex relative w-screen">
      <x-nav navBar="{{ $navBar ?? '' }}" navBarActive="{{ $navBarActive ?? '' }}"></x-nav>
      <x-main pageLabel="{{ $pageLabel ?? '' }}" inputs="{{ $inputs ?? null }}" btns="{{ $btns ?? null }}">{{ $slot }}</x-main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>