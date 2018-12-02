<?php

Class DB {
    
    public $db;
    
    function __construct($server, $user, $pass, $dbname) {
        return $this->db = mysqli_connect($server, $user, $pass, $dbname);
    }
    
    public function query($sql) {
        $results =   $this->db->query($sql) or die('Error al buscar en la bbdd');
        return $results;
    }
    
    public function select_all($table){
        $query  = "SELECT * FROM " . $table;
        return $this ->query($query);
    }
    
    public function create($table, $values) {
        $query = "INSERT INTO " . $table . "(Title, Author, PublishedDate, isbn)" 
            . "VALUES " . $values;
        $results = $this->db->query($query);
    }
}
