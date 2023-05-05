<?php 

namespace App\Controllers;

class WelcomeController extends Controller{
    
    public function index($request){
        $name = "yeeee";
        include 'app/Views/index.php';
    }

    public function home($request){
        include 'app/Views/home.php';
    }

    public function test($request, $id){
        echo $id;
    }
}