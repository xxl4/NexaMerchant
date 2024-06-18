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
        return response()->json([
            'data' => [
                'apps' => [
                    [
                        'name' => 'App 1',
                        'description' => 'This is app 1',
                    ],
                    [
                        'name' => 'App 2',
                        'description' => 'This is app 2',
                    ],
                    [
                        'name' => 'App 3',
                        'description' => 'This is app 3',
                    ],
                ]
            ]
        ]);
    }
}
