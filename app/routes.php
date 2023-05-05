<?php 

namespace App;

/**
 * - Set your base url of the system here. 
 */

$base_url = "http://localhost/gretel";

/**
 * - ROUTES
 * 
 * - Add your application routes here and the associated class and method.
 * 
 */ 

$routes = [

    '/' => [\App\Controllers\WelcomeController::class, 'index'],
    '/home' => [\App\Controllers\WelcomeController::class, 'home'],
    '/test/{id}' => [\App\Controllers\WelcomeController::class, 'test'],

];
