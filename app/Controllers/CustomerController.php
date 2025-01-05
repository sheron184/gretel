<?php 

namespace App\Controllers;

use App\Models\Customer;

class CustomerController extends Controller{
     
    public function index($request){
        Customer::insert([
            'title' => 'Mr',
            'first_name' => 'asasd',
            'middle_name' => 'asdasd',
            'last_name' => 'asdasd',
            'contact_no' => '324234234',
            'district' => 'western', 
        ], new Customer());

        header('location:/gretel/home');
    }

    public function store($request){
        
    }

}