<?php

namespace Nicelizhi\Lp\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

class LpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($slug)
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

        //$html = "";
        return view('lp::Lp.index', compact('html'));
    }
}