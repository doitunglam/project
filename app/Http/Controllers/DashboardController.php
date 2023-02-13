<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function get(Request $request)
    {
        //
        $user = Auth::user();
        if ($user->is_advertiser) {
            return view('advertiser.dashboard',["user"=>$user]);

        }
        return view('dashboard',["user"=>$user]);
    }
}
