<?php

class Book {

    private $table = 'books';
  

    public function fetch_one($id) {
        $link = mysqli_connect('');
        $query = "SELECT * from ". $this->table . " WHERE `id` =' " .  $id . "'";
        $results = mysqli_query($link, $query);
    }

    public function fetch_all() {
        $link = mysqli_connect('127.0.0.1', 'mariophp','admin','test' );
        $query = "SELECT * from `". $this->table . "`";
        $results = mysqli_query($link, $query);
    }

    public function insert_book($values)  {

        $link =  mysqli_connect('127.0.0.1', 'mariophp','admin', 'test');   

         $q = " INSERT INTO " . $this->table . " VALUES ( '". $values['Title']."', '".$values['Author'] . "' ,'".
            $values['PublishedDate']. "', '".$values['isbn']. "')";
   
        return mysqli_query($q);

    }
}

