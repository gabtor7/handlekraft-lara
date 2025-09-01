<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

class ExampleTest extends TestCase
{

    // use CreatesApplication;

    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    /**
     * Test existing route
     */
    public function test_route(){
        Route::get('/register', [LoginController::class, 'registerUser'])->name('register');

        $this->assertTrue(Route::has('/'));
    }
}
