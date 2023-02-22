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


    // ====================================== CREATE ================================ //





    // ===================================== READ ALL ================================ //

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
}
