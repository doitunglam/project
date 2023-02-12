<!doctype html>
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

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>


<body>

<div class="m-0 w-screen h-screen relative"
style="background: radial-gradient(circle at 10% 20%, rgb(255, 200, 124) 0%, rgb(252, 251, 121) 90%);">
    <div class="absolute h-2/3 aspect-[17/10] right-0 top-[18vh] bg-contain bg-no-repeat hidden lg:block" style="background-image: url('{{ asset('/images/bg-image.png')}}')"></div>

    <x-welcome-navigation></x-welcome-navigation>
    <div class="absolute flex text-xl flex-col px-2 w-full lg:left-8 sm:top-1/4 lg:w-1/3 gap-1 mt-6 md:mt-8">
        <p class="m-0 font-bold text-3xl font-welcome">Đăng nhập vào</p>
        <p class="m-0 text-3xl font-extrabold font-welcome text-orange-700">mccannasia.com</p>
        <p class="text-2xl font-welcome">Chào mừng đến với trang web, mời bạn nhập thông tin để sử dụng hệ thống</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="phone" :value="__('Số điện thoại')" />
                <x-text-input id="phone" class="h-12 rounded-full bg-yellow-400 w-full border-solid border-2 border-orange-600 mb-2" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="h-12 rounded-full bg-yellow-400 w-full border-solid border-2 border-orange-600 mb-2"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ghi nhớ đăng nhập') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Quên mật khẩu?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Đăng nhập') }}
                </x-primary-button>
            </div>
        </form>
        <!--Social Network Login-->
        <p class="m-0 w-full text-center">Hoặc</p>

        <div class="flex justify-between items-center">
            <a href="{{ route('auth.facebook') }}" class="btn btn-facebook btn-user btn-block bg-yellow-400 items-center rounded-full py-2 px-5">
                <i class="fab fa-facebook-f fa-fw"></i>
                Facebook
            </a>
            <a href="{{ route('auth.google') }}" class="btn btn-google btn-user btn-block bg-yellow-400 items-center rounded-full py-2 px-5">
                <i class="fab fa-google fa-fw"></i>
                Google
            </a>
        </div>

    </div>
</div>
</body>
</html>
