<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        @if($social_type)
            Bạn đã đăng nhập từ {{$social_type}}. Để tiếp tục, vui lòng cập nhật thông tin
        @endif

        <x-text-input id="social_id" class="block mt-1 w-full hidden" readonly type="text" name="social_id"
                      value="{{$social_id}}" required
                      autofocus/>

        @if($name)
            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$name}}" required
                              autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            @php($name=null)
        @else
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                              autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
        @endif

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')"/>
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required
                          autofocus autocomplete="phone"/>
            <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
        </div>

        <!-- Email -->
        @if($email)
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{$email}}"
                              autofocus autocomplete="email"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
            @php($email=null)
        @else
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                              required
                              autofocus autocomplete="email"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
        @endif


        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')"/>
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                          required autocomplete="username"/>
            <x-input-error :messages="$errors->get('username')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Password confirmation')"/>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>


        <!-- Referal Code -->
        @if($refcodesource != null)
            <div class="mt-4">
                <x-input-label for='refcode' :value="__('Referral Code')"/>
                <x-text-input id="refcode" class="block mt-1 w-full" type="text" name="refcode"
                              value="{{$refcodesource}}"
                              required autofocus autocomplete="refcode"/>
                <x-input-error :messages="$errors->get('refcode')" class="mt-2"/>
            </div>
            @php($refcodesource = null)
        @else
            <div class="mt-4">
                <x-input-label for="refcode" :value="__('Referral Code')"/>
                <x-text-input id="refcode" class="block mt-1 w-full" type="text" name="refcode" :value="old('refcode')"
                              required autofocus autocomplete="refcode"/>
                <x-input-error :messages="$errors->get('refcode')" class="mt-2"/>
            </div>
        @endif


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Have an account already?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
