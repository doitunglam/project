<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function get(Request $request)
    {
        //
        $user = Auth::user();

        if ($user->is_advertiser) {
            $id = $user->id;
            $campaigns = Campaign::where('creator_id', $id)->get()->sortByDesc('created_at');
            $campaigns_content = array();
            foreach ($campaigns as $campaign) {
                $campaign_content = collect(['created_at' => $campaign->created_at,
                    'textcontent' => $campaign->textcontent,
                    'modified_at' => $campaign->modified_at]);
                $campaigns_content[] = $campaign_content;
            }
            //TODO: Chunk processing
//            Campaign::chunk(20, function ($campaigns) use ($id) {
//                foreach ($campaigns as $campaign) {
//                    //
//                    if ($campaign->creator_id != $id) return reje
//                }
//            });
            return view('advertiser.campaign', ["user" => $user, "campaigns" =>implode(',',$campaigns_content) ]);

        }
        return view('campaign');
    }

    public function create(Request $request)
    {
        $request->validate([
            'textcontent' => ['string', 'max:255']
        ]);
        $campaign = new Campaign;
        $campaign->textcontent = $request->textcontent;
        $campaign->creator_id = Auth::user()->id;
        $campaign->save();

        return redirect('campaign');
    }
}
