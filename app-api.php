<?php
require_once 'API.Class.php';

error_reporting(E_ERROR);
date_default_timezone_set('GMT');

class APP extends API
{

    public $data = "";

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "root";
    const DB = "mydb";

    private $conn = NULL;
    /*
     * Connect to Database
     */
    private function dbConnect(){
        $this->conn = new mysqli(self::DB_SERVER, self::DB_USER, self::DB_PASSWORD, self::DB);
        mysqli_query($this->conn, "SET CHARACTER SET UTF8");
    }

    public function __construct($request, $origin) {
        parent::__construct($request);
        $this->dbConnect(); // Initiate Database connection
    }

    protected function time(){
        date_default_timezone_set("UTC");
        return array(
            'time' => time(),
            'date' => date('D F j  Y h:i:s').' GMT+0000 (UTC)'
        );
    }
}
