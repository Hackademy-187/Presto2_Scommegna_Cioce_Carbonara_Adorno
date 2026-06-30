<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Subirra.it</title>
</head>
<body>
    @if(session('showAnimation'))
    <div id="intro-overlay">
        <video autoplay muted playsinline id="intro-video">
            <source src="{{ asset('videos/login.mp4') }}" type="video/mp4">
        </video>
    </div>
@endif
    <x-navbar />
    <div class="min-vh-100 my-5">
        {{$slot}}
        <x-footer />
    </div>
</body>
</html>