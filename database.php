<?php

Class DB {
    
    public $db;
    
    function __construct($server, $user, $pass, $dbname) {
        return $this->db = mysqli_connect($server, $user, $pass, $dbname);
    }
    
    public function query($sql) {
        $results =   $this->db->query($sql);
        return $results;
    }
    
    public function select_all($table){
        $query  = "SELECT * FROM " . $table;
        return $this ->query($query);
    }
    
    
    public function create($table, $arrayValues) {
        $query = "INSERT INTO  `" . $table . " ($arrayValues)";  //TODO: setup arrayVal
        $results = $this->db->query($link, $query);
    }
}
