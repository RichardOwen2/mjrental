<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MJ RENT BIKE</title>

    <!-- Meta SEO -->
    <meta name="title" content="MJ RENT BIKE">
    <meta name="description"
        content="MJ RENT is a company engaged in the field of vehicle rent services, especially motorbikes. We provide the best service for you to enjoy your vacation in Bali.">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
    @include('layouts.guest.header')

    <div class="pt-16 max-w-screen bg-gray-100">
        @yield('content')
    </div>

    @include('layouts.guest.footer')
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

    @yield('scripts')
    @include('components.floating')
    <script>
        AOS.init();
    </script>
</body>

</html>
