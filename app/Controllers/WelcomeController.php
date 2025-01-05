<?php 

namespace App\Controllers;

class WelcomeController extends Controller{
    
    public function index($request){
        $name = "Hakuna Matata!!";
        $this->view('index', array('name' => $name));
    }

    public function home($request){
        return;
    }

    public function test($request, $id){
        echo $id;
    }

    public function isi($request){
        $this->view('test');
    }
}