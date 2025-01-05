<?php 
namespace Config;
use mysqli;

class Database {
    
    public $hostname = "";
    
    public $db_name = "";
    
    private $username = "";

    private $password = "";

    private $connection;

    public function __construct(){
        $this->hostname = "localhost";
        $this->db_name = "csquare";
        $this->username = "root";
        $this->password = "";

        $this->boot();
    }

    protected function boot(){
        $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->db_name);
    }
    
    public function conn(){
        return $this->connection;
    }
}  