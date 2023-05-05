<?php

namespace App\Models;

class User extends Model{
   
    protected $columns = [
        'name',
        'email',
        'password',
    ];

}