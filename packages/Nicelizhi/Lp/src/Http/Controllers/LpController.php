<?php

namespace Nicelizhi\Lp\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

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

        $html = \Nicelizhi\Lp\Models\Lp::where('slug', $slug)->first();

        if (
            ! $html
            || ! $html->slug
            || ! $html->status
        ) {
            abort(404);
        }

        visitor()->visit($html);

        $redis = Redis::connection('default');

        $refer = $request->input("refer");

        if(!empty($refer)) { 
            $request->session()->put('refer', $refer);
        }

        Log::info("refer start ".$refer);

        $ob_adv_id = config('onebuy.ob_adv_id');
        
        return view('lp::Lp.index', compact('html', 'ob_adv_id'));
    }
}