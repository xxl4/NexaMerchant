<?php

namespace Nicelizhi\Lp\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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

        $request->session()->put('refer', $refer);

        $session_id = session()->getId();

        $redis->hset($this->cache_prefix_key."_access_".date("Ymd"), $refer.'-'.$session_id, date("Y-m-d H:i:s"));

        $redis->hset($this->cache_prefix_key."_access_".date("Ymd")."_".$session_id, $refer, date("Y-m-d H:i:s"));

        return view('lp::Lp.index', compact('html'));
    }
}