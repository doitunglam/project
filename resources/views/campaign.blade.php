@props([$campaigns=>null])
@php($campaign_array = json_decode($campaigns))
<x-app-layout>
    <x-slot name="nav">
        @include('layouts.navigation')
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Campaign222') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're in campaign!") }}
                </div>
            </div>
        </div>
    </div>

    <x-campaign.render-container>
        @foreach($campaign_array as $campaign)
            @php($campaign = json_encode($campaign))
            <x-publisher.campaign-cell :campaign="$campaign"></x-publisher.campaign-cell>
        @endforeach
    </x-campaign.render-container>



</x-app-layout>
