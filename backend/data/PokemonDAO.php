<?php

namespace PkmData;

use config\DatabaseConfig;
use model\Pokemon;


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
                $pokemon = Pokemon::readPkmFromDB($row);     // Will throw error until I create the Pokemon model data
                array_push($pokemonFromDB, $pokemon);
            }



        };
    }
}