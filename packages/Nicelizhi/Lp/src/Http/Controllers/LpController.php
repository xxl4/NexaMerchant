<?php

namespace Nicelizhi\Lp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LpController extends Controller
{

    private $cache_prefix_key = "ad_access_";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($slug, Request $request)
    {

        $html = Cache::remember("lp_".$slug, 360000, function () use ($slug) {
            return \Nicelizhi\Lp\Models\Lp::where('slug', $slug)->where("status", 1)->select(['html','goto_url','status'])->first();
        });

        //$html = \Nicelizhi\Lp\Models\Lp::where('slug', $slug)->first();
        if (
            ! $html
            || ! $html->status
        ) {
            abort(404);
        }

        //visitor()->visit($html);
        $refer = $request->input("refer");
        if(!empty($refer)) { 
            $request->session()->put('refer', $refer);
        }
        //Log::info("refer start ".$refer);

        $ob_adv_id = config('onebuy.ob_adv_id');
        $gtag = config('onebuy.gtag');
        
        return view('lp::Lp.index', compact('html', 'ob_adv_id','refer','gtag'));
    }
}