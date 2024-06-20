<?php

namespace Nicelizhi\Apps\Http\Controllers\Api;

use Illuminate\Foundation\Validation\ValidatesRequests;

class ListsController extends Controller
{
    
    public function plugins() {
        
    }

    public function apps(Request $request) {
        $items = \Nicelizhi\Apps\Models\App::where("status","enable")->get();
        $total = $items->count();
        new \Illuminate\Encryption\Encrypter(config('apps.sync_key'), config('apps.cipher'));
        return response()->json([
            'data' => [
                'apps' => $items,
                'total' => $total
            ]
        ]);
    }

    public function search($name) {
        $items = \Nicelizhi\Apps\Models\App::where("name","like","%".$name."%")->get();
        $total = $items->count();
        return response()->json([
            'data' => [
                'apps' => $items,
                'total' => $total
            ]
        ]);
    }
}
