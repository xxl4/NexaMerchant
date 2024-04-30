<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {

        // if ($exception instanceof \Exception) {
        //     // emails.exception is the template of your email
        //     // it will have access to the $error that we are passing below
        //     // Mail::send('emails.exception', ['error' => $e->getMessage()], function ($m) {
        //     //     $m->to('your email', 'your name')->subject('your email subject');
        //     // });

            

        // }

       //var_dump($exception->getCode());

       //Log::info(json_encode($exception));

       

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Exception) {
            if(!empty($exception->getMessage())) {
                $pos      = strripos($exception->getMessage(), "bagisto");

                if ($pos === false) {
                    
                } else {
                    \Nicelizhi\Shopify\Helpers\Utils::send(json_encode($exception->getMessage()). " code is " .$exception->getCode(). " please check the log file for more details");
                }
                
            } 
        }
        
        return parent::render($request, $exception);
    }
}
