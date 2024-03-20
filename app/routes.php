<?php 

namespace App;

/**
 * - Set your base url of the system here. 
 */

$base_url = "http://localhost:3000";

/**
 * - ROUTES
 * 
 * - Add your application routes here and the associated class and method.
 * 
 */ 

$web = [
    '/' => [\App\Controllers\WelcomeController::class, 'index'],
    '/home' => [\App\Controllers\WelcomeController::class, 'home'],
    '/isi/selo' => [\App\Controllers\WelcomeController::class, 'isi'],
    '/test/{id}' => [\App\Controllers\WelcomeController::class, 'test'],
    '/customer/create' => [\App\Controllers\CustomerController::class, 'index'],
];

$api = [];
