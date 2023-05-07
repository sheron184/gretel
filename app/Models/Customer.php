<?php

namespace App\Models;

class Customer extends Model{

    public $table = "customer";
   
    public $fillable = [
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'contact_no',
        'district',
    ];

}