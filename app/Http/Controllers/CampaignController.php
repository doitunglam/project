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
            return view('advertiser.campaign', ["user" => $user, "campaigns" =>json_encode($campaigns_content) ]);

        }
        return view('campaign');
    }

    public function create(Request $request)
    {
        $request->commission = floatval($request->commisson);
        $request->validate([
            'title'=>['string','max:255'],
            'info'=>['string','max:255'],
            'image' => 'required|image|mimes:png,jpg,jpeg,gif|max:8096',
            'url'=>['url'],
            'criteria'=>['string','max:1500'],
            'commission'=>['decimal:0,15']
        ]);

        $imageName = time().'.'.$request->image->extension();
        // Public Folder
        $request->image->move(public_path('images'), $imageName);

        $campaign = new Campaign;
        $campaign->title = $request->title;
        $campaign->creator_id = Auth::user()->id;
        $campaign->image = $imageName;
        $campaign->url = $request->url;
        $campaign->info = $request->info;
        $campaign->criteria = $request->criteria;
        $campaign->commission = $request->commission;

        $campaign->save();

        return redirect('campaign');
    }
}
