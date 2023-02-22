<?php

namespace Config;

class DatabaseConfig {
    

    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbName = "pokemon_app";



    public function connect() {

        $conn = new \mysqli($this->host, $this->username, $this->password, $this->dbName);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);      // Die function to close connection in case of error
        } else {
            return $conn;
        }
    }
}