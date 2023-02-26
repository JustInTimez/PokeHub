<?php

namespace Data;

use Config\DatabaseConfig;
use Model\Favorites;

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
    
        if ($stmt->execute()) {
    
            $conn->close();
    
            return;
        } else {
    
            $conn->close();
            throw new \Exception("Unfortunatley, we weren't able to fetch yo favorites pokemons: " . $conn->error);
        }
    }
    


    // ===================================== DELETE =================================== //

    public function removeFavorite($favorites) {

        $conn = $this->databaseConfig->connect();
    
        $stmt = $conn->prepare("DELETE FROM favorites WHERE id = ?");
        $stmt->bind_param("i", $favorites->getId());
    
        if ($stmt->execute()) {
    
            $conn->close();
            return true;
        } else {
    
            $conn->close();
            throw new \Exception("Unfortunatley, we weren't able to complete the query: " . $conn->error);
        }
    }

}