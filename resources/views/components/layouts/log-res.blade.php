<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "Page Tiltle"}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/swiper.js', 'resources/css/swiper.css'])
    @livewireStyles

</head>
<body class="bg-black-theme text-white w-full" >

<main>

    {{ $slot }}
</main>
<!-- Hiển thị footer nếu không phải trang đăng nhập -->
@livewireScripts
</body>
</html>
