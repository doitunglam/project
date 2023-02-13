<x-app-layout>
    <x-slot name="nav">
        <x-advetiser-navigation></x-advetiser-navigation>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Advetiser Dashboard') }}
    </x-slot>
    <x-getlink :user=$user>
    </x-getlink>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ $user }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

