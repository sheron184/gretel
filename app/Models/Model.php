<?php 

namespace App\Models;

use Config\DB;
use PDO;

class Model {

    protected $db;

    protected $main_model;

    protected static $table = "";

    protected static $fillable = []; 

    public function __construct()
    {
        $database = new DB();
        $this->db = $database->conn();
        $this->main_model = $this;

    }

    public static function insert($data, $model)
    {
        self::$table = $model->table;
        self::$fillable = $model->fillable;
        self::$main_model->get_table_info();
        //$query = self::$main_model->prepare_insert_query($data, $model);
    }

    public static function update()
    {

    }

    public static function delete()
    {

    }

    public static function all()
    {

    }

    public static function find()
    {

    }

    protected function exec()
    {

    }

    public function get_columns(){

    }

    protected function prepare_insert_query($data, $model){
        $bind_Q = [];
        $stmt = $this->db->prepare("INSERT INTO MyGuests (". implode(',', array_keys($data)) .") VALUES (?, ?, ?)");
        $stmt->bind_param("sss", array_values($data));
    }

    public function get_table_info(){
        // Define the query to retrieve the column information
        $query = "SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ?";

        // Prepare the query
        $stmt = $this->db->prepare($query);

        // Bind the table name parameter
        $stmt->bindParam(1, $this->table, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Fetch the results into an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the statement and connection
        $stmt->closeCursor();
        $this->db = null;

        // Print the column information
        foreach ($results as $result) {
            echo $result['COLUMN_NAME'] . ': ' . $result['DATA_TYPE'] . '<br>';
        }
    }
}

