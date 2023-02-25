<?php

namespace Data;

use Config\DatabaseConfig;
use Model\Pokemon;


class PokemonDAO {

    // =================================== Fields =================================== //

    private DatabaseConfig $databaseConfig;

    // =================================== Constructor ============================== //

    public function __construct($databaseConfig) {
        $this->databaseConfig = $databaseConfig;
    }

    // ===================================== CREAT ================================ //

    public function storeFavoritePokemon($userId, $pokemonId) {

        $conn = $this->databaseConfig->connect();
    
        $stmt = $conn->prepare("INSERT INTO favorites (id, trainer_id, pokemon_id) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $userId, $pokemonId);
    
        if (!$stmt->execute()) {
            $conn->close();
            throw new \Exception("Failed to store favorite pokemon");
        }
    
        $conn->close();
    
    }


    // ===================================== READ ================================ //

    public function readAllPkm() {

        $conn = $this->databaseConfig->connect();

        $pokemonFromDB = [];

        $stmt = "SELECT * FROM pokemon_data";

        if ($result = $conn->query($stmt)) {

            while ($row = $result->fetch_object()) {
                $pokemon = Pokemon::readPkmFromDB($row);
                array_push($pokemonFromDB, $pokemon);
            }

            $conn->close();

            return $pokemonFromDB;
        } else {

            throw new \Exception("Unfortunatley, we weren't able to complete the query: " . $conn->error);
        }
    }


    public function readPkmById($id) {

        $conn = $this->databaseConfig->connect();

        $stmt = $conn->prepare("SELECT * FROM pokemon_data WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {

            $result = $stmt->get_result();

            if ($result->num_rows == 0) {

                $conn->close();
                throw new \Exception("No Pokemon found with this id");
            }

            $row = $result->fetch_object();
            $pokemon = Pokemon::readPkmFromDB($row);
            $conn->close();

            return $pokemon;
        } else {

            $conn->close();
            throw new \Exception("Unfortunatley, we weren't able to complete the query: " . $conn->error);
        }
    }
}
