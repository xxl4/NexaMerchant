<?php

namespace Nicelizhi\Apps\Http\Controllers\Api;

use Illuminate\Foundation\Validation\ValidatesRequests;

class ListsController extends Controller
{
    
    public function plugins() {
        return response()->json([
            'data' => [
                'plugins' => [
                    [
                        'name' => 'Plugin 1',
                        'description' => 'This is plugin 1',
                    ],
                    [
                        'name' => 'Plugin 2',
                        'description' => 'This is plugin 2',
                    ],
                    [
                        'name' => 'Plugin 3',
                        'description' => 'This is plugin 3',
                    ],
                ]
            ]
        ]);
    }

    public function apps() {
        $items = \Nicelizhi\Apps\Models\App::where("status","enable")->get();
        return response()->json([
            'data' => [
                'apps' => $items
            ]
        ]);
    }
}
