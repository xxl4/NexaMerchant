<?php
/*
|--------------------------------------------------------------------------
| Prettus Repository Config
|--------------------------------------------------------------------------
|
|
*/
return [

    /*
    |--------------------------------------------------------------------------
    | Repository Pagination Limit Default
    |--------------------------------------------------------------------------
    |
    */
    'pagination' => [
<<<<<<< HEAD
        'limit' => 15
=======
        'limit' => 15,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    ],

    /*
    |--------------------------------------------------------------------------
    | Fractal Presenter Config
    |--------------------------------------------------------------------------
    |

    Available serializers:
    ArraySerializer
    DataArraySerializer
    JsonApiSerializer

    */
    'fractal'    => [
        'params'     => [
<<<<<<< HEAD
            'include' => 'include'
        ],
        'serializer' => League\Fractal\Serializer\DataArraySerializer::class
=======
            'include' => 'include',
        ],
        'serializer' => League\Fractal\Serializer\DataArraySerializer::class,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Config
    |--------------------------------------------------------------------------
    |
    */
    'cache'      => [
        /*
         |--------------------------------------------------------------------------
         | Cache Status
         |--------------------------------------------------------------------------
         |
         | Enable or disable cache
         |
         */
        'enabled'    => false,

        /*
         |--------------------------------------------------------------------------
         | Cache Minutes
         |--------------------------------------------------------------------------
         |
         | Time of expiration cache
         |
         */
        'minutes'    => 10080,

        /*
         |--------------------------------------------------------------------------
         | Cache Repository
         |--------------------------------------------------------------------------
         |
         | Instance of Illuminate\Contracts\Cache\Repository
         |
         */
        'repository' => 'cache',

        /*
          |--------------------------------------------------------------------------
          | Cache Clean Listener
          |--------------------------------------------------------------------------
          |
          |
          |
          */
        'clean'      => [

            /*
              |--------------------------------------------------------------------------
              | Enable clear cache on repository changes
              |--------------------------------------------------------------------------
              |
              */
            'enabled' => true,

            /*
              |--------------------------------------------------------------------------
              | Actions in Repository
              |--------------------------------------------------------------------------
              |
              | create : Clear Cache on create Entry in repository
              | update : Clear Cache on update Entry in repository
              | delete : Clear Cache on delete Entry in repository
              |
              */
            'on'      => [
                'created' => true,
                'updated' => true,
                'deleted' => true,
<<<<<<< HEAD
            ]
=======
            ],
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],

        'params'     => [
            /*
            |--------------------------------------------------------------------------
            | Skip Cache Params
            |--------------------------------------------------------------------------
            |
            |
            | Ex: http://prettus.local/?search=lorem&skipCache=true
            |
            */
<<<<<<< HEAD
            'skipCache' => 'skipCache'
=======
            'skipCache' => 'skipCache',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],

        /*
       |--------------------------------------------------------------------------
       | Methods Allowed
       |--------------------------------------------------------------------------
       |
       | methods cacheable : all, paginate, find, findByField, findWhere, getByCriteria
       |
       | Ex:
       |
       | 'only'  =>['all','paginate'],
       |
       | or
       |
       | 'except'  =>['find'],
       */
        'allowed'    => [
            'only'   => null,
<<<<<<< HEAD
            'except' => null
=======
            'except' => null,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],

        'repositories' => [
            'Webkul\Core\Repositories\CoreConfigRepository' => [
                'enabled' => true,

                // 'minutes'    => 10080,
<<<<<<< HEAD
                
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                // 'clean'      => [
                //     'enabled' => true,

                //     'on'      => [
                //         'created' => true,
                //         'updated' => true,
                //         'deleted' => true,
                //     ]
                // ],

                // 'allowed' => [
                //     'only' => null,

                //     'except' => null
                // ],
            ],

            'Webkul\Core\Repositories\ChannelRepository' => [
                'enabled' => true,
            ],

            'Webkul\Core\Repositories\CountryRepository' => [
                'enabled' => true,
            ],

            'Webkul\Core\Repositories\CountryStateRepository' => [
                'enabled' => true,
            ],

            'Webkul\Core\Repositories\CurrencyRepository' => [
                'enabled' => true,
            ],

            'Webkul\Core\Repositories\LocaleRepository' => [
                'enabled' => true,
            ],
<<<<<<< HEAD
        ]
=======
        ],
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    ],

    /*
    |--------------------------------------------------------------------------
    | Criteria Config
    |--------------------------------------------------------------------------
    |
    | Settings of request parameters names that will be used by Criteria
    |
    */
    'criteria'   => [
        /*
        |--------------------------------------------------------------------------
        | Accepted Conditions
        |--------------------------------------------------------------------------
        |
        | Conditions accepted in consultations where the Criteria
        |
        | Ex:
        |
        | 'acceptedConditions'=>['=','like']
        |
        | $query->where('foo','=','bar')
        | $query->where('foo','like','bar')
        |
        */
        'acceptedConditions' => [
            '=',
            'like',
<<<<<<< HEAD
            'in'
=======
            'in',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ],
        /*
        |--------------------------------------------------------------------------
        | Request Params
        |--------------------------------------------------------------------------
        |
        | Request parameters that will be used to filter the query in the repository
        |
        | Params :
        |
        | - search : Searched value
        |   Ex: http://prettus.local/?search=lorem
        |
        | - searchFields : Fields in which research should be carried out
        |   Ex:
        |    http://prettus.local/?search=lorem&searchFields=name;email
        |    http://prettus.local/?search=lorem&searchFields=name:like;email
        |    http://prettus.local/?search=lorem&searchFields=name:like
        |
        | - filter : Fields that must be returned to the response object
        |   Ex:
        |   http://prettus.local/?search=lorem&filter=id,name
        |
        | - orderBy : Order By
        |   Ex:
        |   http://prettus.local/?search=lorem&orderBy=id
        |
        | - sortedBy : Sort
        |   Ex:
        |   http://prettus.local/?search=lorem&orderBy=id&sortedBy=asc
        |   http://prettus.local/?search=lorem&orderBy=id&sortedBy=desc
        |
        | - searchJoin: Specifies the search method (AND / OR), by default the
        |               application searches each parameter with OR
        |   EX:
        |   http://prettus.local/?search=lorem&searchJoin=and
        |   http://prettus.local/?search=lorem&searchJoin=or
        |
        */
        'params'             => [
            'search'       => 'search',
            'searchFields' => 'searchFields',
            'filter'       => 'filter',
            'orderBy'      => 'orderBy',
            'sortedBy'     => 'sortedBy',
            'with'         => 'with',
            'searchJoin'   => 'searchJoin',
<<<<<<< HEAD
            'withCount'    => 'withCount'
        ]
=======
            'withCount'    => 'withCount',
        ],
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    ],
    /*
    |--------------------------------------------------------------------------
    | Generator Config
    |--------------------------------------------------------------------------
    |
    */
    'generator'  => [
<<<<<<< HEAD
        'basePath'      => app()->path(),
        'rootNamespace' => 'App\\',
        'stubsOverridePath' => app()->path(),
        'paths'         => [
=======
        'basePath'          => app()->path(),
        'rootNamespace'     => 'App\\',
        'stubsOverridePath' => app()->path(),
        'paths'             => [
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'models'       => 'Entities',
            'repositories' => 'Repositories',
            'interfaces'   => 'Repositories',
            'transformers' => 'Transformers',
            'presenters'   => 'Presenters',
            'validators'   => 'Validators',
            'controllers'  => 'Http/Controllers',
            'provider'     => 'RepositoryServiceProvider',
<<<<<<< HEAD
            'criteria'     => 'Criteria'
        ]
    ]
=======
            'criteria'     => 'Criteria',
        ],
    ],
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
];
