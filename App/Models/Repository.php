<?php

namespace App\Models;


abstract class Repository {
    
    protected $db;


    function __construct() {
        $this->db = $this->connect();

    }


    public function connect() {

        if ($this->db == null) {
            $this->db = new \PDO("sqlite:/var/www/html/projet_librairie/db/database.db");
        }
        return $this->db;
    }
}