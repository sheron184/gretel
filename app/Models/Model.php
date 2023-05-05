<?php 

namespace App\Models;

use Config\DB;

class Model {
    protected $table = "";

    public function __construct($table){
        $this->table = $table;
    }

    public static function insert(){
        
    }

    public static function update(){

    }

    public static function delete(){

    }

    public static function all(){

    }

    protected function find(){

    }
}

