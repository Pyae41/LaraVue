<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div id="app"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgJNK9I5_QrfW45rFNkOE1SEzA8cjMs3w&libraries=places" async="" defer=""></script> --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initMap" async defer></script> --}}
</body>

</html>
