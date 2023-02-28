<?php

namespace Data;

use Config\DatabaseConfig;
use Model\Favorites;
use mysqli;

class FavoritesDAO {
    // =================================== Fields =================================== //

    private DatabaseConfig $databaseConfig;

    // =================================== Constructor ============================== //

    public function __construct($databaseConfig) {
        $this->databaseConfig = $databaseConfig;
    }

    // ===================================== CREATE ================================= //

    public function createFavorite($trainerId, $pokemonId) {

        $conn = $this->databaseConfig->connect();
    
        $stmt = $conn->prepare("INSERT INTO favorites (trainer_id, pokemon_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $trainerId, $pokemonId);
    
        if ($stmt->execute()) {
    
            $conn->close();
    
            return;
        } else {
    
            $conn->close();
            throw new \Exception("Unfortunatley, we weren't able to complete the query: " . $conn->error);
        }
    }

    // ===================================== READ =================================== //

    public function fetchByUserId($userID) {

        $conn = $this->databaseConfig->connect();
    
        $stmt = $conn->prepare("SELECT * FROM favorites WHERE trainer_id = ?");
        $stmt->bind_param("i", $userID);
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        $favorites = array();
        while ($row = $result->fetch_assoc()) {
            $favorites[] = $row;
        }
    
        $conn->close();
    
        return $favorites;
    }
    
    public function checkIfFavorited($userID, $pokemonId) {

        $conn = $this->databaseConfig->connect();
    
        $stmt = $conn->prepare("SELECT * FROM favorites WHERE trainer_id = ? AND pokemon_id = ?");
        $stmt->bind_param("ii", $userID, $pokemonId);

        if (!$stmt->execute()) {
            error_log("Error executing query: " . $stmt->error);
            return false;
        }
    
        $stmt->store_result();
        $isFavorited = $stmt->num_rows == 1;

        $stmt->close();
        $conn->close();
    
        return $isFavorited;
    }




    // ===================================== DELETE =================================== //

    public function removeFavorite($trainerId, $pokemonId) {

        $conn = $this->databaseConfig->connect();
    
        $stmt = $conn->prepare("DELETE FROM favorites WHERE trainer_id = ? AND pokemon_id = ?");
        $stmt->bind_param("ii", $trainerId, $pokemonId);
    
        if ($stmt->execute()) {
    
            $conn->close();
    
            return;
        } else {
    
            $conn->close();
            throw new \Exception("Unfortunatley, we weren't able to complete the query: " . $conn->error);
        }
    }

}