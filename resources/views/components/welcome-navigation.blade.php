<nav x-data="{ open: false }" class="bg-yellow-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center md:hidden">
                    <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                  stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <!-- Logo -->
                <div class="shrink-0 flex items-center pl-2">
                    <a href="{{ route('home') }}">
                        <text>{{__('MCCANNASIA.COM')}}</text>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                    <x-nav-link :href="route('home')">
                        {{ __('Publisher') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                    <x-nav-link :href="route('home')">
                        {{ __('Advertiser') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                    <x-nav-link :href="route('home')">
                        {{ __('About Us') }}
                    </x-nav-link>
                </div>


            </div>
            <div class="top-0 align-self-end self-stretch flex flex-row justify-center align-content-center">
                <form action={{'login'}} METHOD="get">
                    <button class="font-sans bg-transparent h-full rounded-full self-center text-center indent-0">
                        {{__('Login')}}
                    </button>
                </form>
                <form action={{'register'}} METHOD="get">
                    <div class="h-full flex">
                        <button
                            class="font-sans h-9 self-center justify-center rounded-full text-center  pl-4 pr-4 indent-0 bg-yellow-400 ml-2">
                            {{__('Register')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')">
                {{ __('Publisher') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('home')">
                {{ __('Advertiser') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('home')">
                {{ __('About Us') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
