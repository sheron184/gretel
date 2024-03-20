<?php 

namespace App\Controllers;

class WelcomeController extends Controller{
    
    public function index($request){
        $name = "yeeee";
        include 'app/Views/index.php';
    }

    public function home($request){
        // $this->json([
        //     "whaaaat" => "Hakuna Matata"
        // ]);
        //include 'app/Views/home.php';
        $this->view('home');
    }

    public function test($request, $id){
        echo $id;
    }

    public function isi($request){
        $this->view('test');
    }
}