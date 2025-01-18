<?php

namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel{

    protected $routeMiddleware = [
        'listen' => \App\Http\Middleware\ListenPort::class,
    ];
    
    protected $middlewareGroups = [
        'web' => [
            'listen:80',
        ],
    
        'api' => [
            'listen:8000',
        ],
    ];
}

