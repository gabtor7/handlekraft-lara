<?php

namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel{

    protected $routeMiddleware = [
        'listen' => \App\Http\Middleware\ListenPort::class
        // 'cors' => \App\Http\Middleware\Cors::class
    ];
    
    protected $middlewareGroups = [
        'web' => [
            'listen:80'
        ],
    
        'api' => [
            'listen:8000',
            'listen:5173',
            'listen:3000'
        ],
    ];
}

