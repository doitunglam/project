<x-app-layout>
    <x-slot name="nav">
        <x-advetiser-navigation></x-advetiser-navigation>
    </x-slot>

    @php($campaign_array = json_decode($campaigns))

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Advetiser Campaign') }}
    </x-slot>

    <x-campaign.input-form>
    </x-campaign.input-form>

    <x-campaign.render-container>
        @foreach($campaign_array as $campaign)
            <div>{{$campaign->created_at}}</div>
        @endforeach
    </x-campaign.render-container>

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
