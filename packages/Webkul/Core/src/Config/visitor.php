<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Driver
    |--------------------------------------------------------------------------
    |
    | This value determines which of the following driver to use.
    | You can switch to a different driver at runtime.
    |
    */
    'default' => 'jenssegers',

    //except save request or route names
<<<<<<< HEAD
    'except' =>  ['login', 'register'],


    //name of the table which visit records should save in
    'table_name' =>  'visits',
=======
    'except' => ['login', 'register'],

    //name of the table which visit records should save in
    'table_name' => 'visits',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

    /*
    |--------------------------------------------------------------------------
    | List of Drivers
    |--------------------------------------------------------------------------
    |
    | This is the array of Classes that maps to Drivers above.
    | You can create your own driver if you like and add the
    | config in the drivers array and the class to use for
    | here with the same name. You will have to implement
    | Shetabit\Visitor\Contracts\UserAgentParser in your driver.
    |
    */
    'drivers' => [
        'jenssegers' => \Shetabit\Visitor\Drivers\JenssegersAgent::class,
<<<<<<< HEAD
        'UAParser' => \Shetabit\Visitor\Drivers\UAParser::class,
    ]
=======
        'UAParser'   => \Shetabit\Visitor\Drivers\UAParser::class,
    ],
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
];
