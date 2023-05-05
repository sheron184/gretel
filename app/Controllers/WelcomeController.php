<?php 

namespace App\Controllers;

class WelcomeController extends Controller{
    
    public static function index($request){
        $name = "yeeee";
        include 'app/Views/index.php';
    }

    public static function home($request){
        include 'app/Views/home.php';
    }
}