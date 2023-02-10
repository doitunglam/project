<?php
$addr = '127.0.0.1/'
?><!doctype html>
<html lang="vi">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1a0aa40797.js" crossorigin="anonymous"></script>
</head>


<body>

<div class="m-0 w-screen h-screen relative"
style="background: radial-gradient(circle at 10% 20%, rgb(255, 200, 124) 0%, rgb(252, 251, 121) 90%);">
    <div class="absolute h-2/3 aspect-[17/10] right-0 top-[18vh] bg-contain bg-no-repeat hidden sm:block" style="background-image: url('{{ asset('/images/bg-image.png')}}')"></div>

    <div class="w-screen text-xl flex relative h-fit font-welcome sm:flex-row sm:justify-between flex-col basis-1/12">
        <div class="flex top-0 left-4 items-center">
            <x-header-linker href="https://www.w3schools.com">LCH</x-header-linker>
            <x-header-linker href="https://www.w3schools.com">Publisher</x-header-linker>
            <x-header-linker href="https://www.w3schools.com">Advertiser</x-header-linker>
            <x-header-linker href="https://www.w3schools.com">About Us</x-header-linker>
        </div>
        <div class="top-0 flex items-start sm:right-4 m-4 ">
            <form action={{'login'}} METHOD="get">
                <button class="bg-transparent h-9 rounded-full self-start text-center text-xl indent-0">Đăng nhập</button>
            </form>
            <form action={{'register'}} METHOD="get">
                <button class="h-9 rounded-full self-start text-center text-xl pl-4 pr-4 indent-0 bg-yellow-400 ml-2">Đăng ký</button>
            </form>
        </div>
    </div>

    <div class="absolute flex text-xl flex-col px-2 w-full sm:left-32 sm:top-1/4 sm:w-2/5 gap-1">
        <p class="m-0 font-bold text-3xl font-welcome">Đăng nhập vào</p>
        <p class="m-0 text-3xl font-extrabold font-welcome text-orange-700">localhost.com</p>
        <p class="text-2xl font-welcome">Chào mừng đến với trang web, mời bạn nhập thông tin để sử dụng hệ thống</p>
        <form class="focus:outline-none">
            <input type="text" class="h-12 rounded-full bg-yellow-400 w-full border-solid border-2 border-orange-600 mb-2">
            <input type="password" class="h-12 rounded-full bg-yellow-400 w-full border-solid border-2 border-orange-600">
        </form>
        <a href="https://www.w3schools.com" class="text-base no-underline font-welcome align-self-end">Quên mật khẩu</a>
        <button class="h-12 rounded-full text-3xl bg-yellow-400">Đăng nhập</button>
        <p class="text-base no-underline self-center m-0">Hoặc</p>
        <div class="flex justify-between">
            <button class="indent-0 h-12 rounded-full w-56 text-2xl bg-yellow-400 text-amber-50 mx-1 font-welcome"><i class="fa-brands fa-facebook"></i> Facebook</button>
            <button class="indent-0 h-12 rounded-full w-56 text-2xl bg-yellow-400 text-amber-50 mx-1 font-welcome"><i class="fa-brands fa-google"></i> Google</button>
        </div>
        <label for="Ghi nhớ đăng nhập" class="self-center"> <input type="checkbox"> Ghi nhớ đăng nhập </label>
    </div>
</div>
</body>
</html>
