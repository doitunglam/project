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
                $campaigns_content[] = $campaign;
            }
            //TODO: Chunk processing
//            Campaign::chunk(20, function ($campaigns) use ($id) {
//                foreach ($campaigns as $campaign) {
//                    //
//                    if ($campaign->creator_id != $id) return reje
//                }
//            });
            return view('advertiser.campaign', ["user" => $user, "campaigns" => json_encode($campaigns_content)]);
        }
        $campaigns = Campaign::all()->sortByDesc('created_at');

        return view('campaign',["campaigns" => json_encode($campaigns)]);
    }

    public function create(Request $request)
    {
        $request->commission = floatval($request->commisson);
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'info' => ['nullable', 'string', 'max:255'],
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:8096',
            'url' => ['required', 'url'],
            'criteria' => ['nullable', 'string', 'max:1500'],
            'commission' => ['required', 'decimal:0,15']
        ]);
        $campaign = new Campaign;

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            // Public Folder
            $request->image->move(public_path('images'), $imageName);
            $campaign->image = $imageName;
        } else
            $campaign->image = 'none.jpg';
        $campaign->title = $request->title;
        $campaign->creator_id = Auth::user()->id;
        $campaign->url = $request->url;
        if ($request->info)
            $campaign->info = $request->info;
        else $campaign->info = 'none';
        if ($request->criteria)
            $campaign->criteria = $request->criteria;
        else $campaign->criteria = 'none';
        $campaign->commission =$request->get('commission');

        $campaign->save();

        return redirect('campaign');
    }
}
