
<x-app-layout>
    <x-slot name="nav">
        <x-advetiser-navigation></x-advetiser-navigation>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Advetiser Campaign') }}
    </x-slot>
    <x-getlink :user=$user>
    </x-getlink>

    <form method="post" action="{{ route('campaign.create') }}">
        @csrf
        <div class="mt-4">
            <x-input-label for="Nội dung" :value="__('Nội dung')"/>
            <x-text-input id="textcontent" class="block mt-1 w-full" type="text" name="textcontent" :value="old('textcontent')" required
                          autofocus autocomplete="textcontent"/>
            <x-input-error :messages="$errors->get('textcontent')" class="mt-2"/>
        </div>
        <x-primary-button class="ml-4">
            {{ __('Gửi') }}
        </x-primary-button>
    </form>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ $user }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ $campaigns }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
