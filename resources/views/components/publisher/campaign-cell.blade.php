@php
    /*  @var App\Models\Campaign $campaign */
@endphp
@php($campaign = json_decode($campaign))

<div class="h-full w-full flex flex-col items-center p-5 shadow-xl hover:shadow-2xl
transition transform hover:-translate-y-1 hover:-translate-x-1 gap-1
">
    <img class="block aspect-square w-fit" src="{{url('/images/'.$campaign->image)}}">
        <p class="text-xl text-bold self-start ">
            {{$campaign->title}}
        </p>
    <p>
        {{__("Commission").":".$campaign->commission}}
    </p>
    <p>
        {{__("EPC").":"."__"}}
    </p>
    <p>
        {{__("CPR").":"."__"}}
    </p>
</div>
