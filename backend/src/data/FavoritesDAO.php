<?php

namespace Data;

use Config\DatabaseConfig;

class FavoritesDAO
{
    // =================================== Fields =================================== //

    private DatabaseConfig $databaseConfig;

    // =================================== Constructor ============================== //

    public function __construct(DatabaseConfig $databaseConfig)
    {
        $this->databaseConfig = $databaseConfig;
    }

    // ===================================== CREATE ================================= //

    public function storeFavoritePokemon(int $userId, int $pokemonId): void
    {
        $conn = $this->databaseConfig->connect();

        $stmt = $conn->prepare("INSERT INTO favorites (trainer_id, pokemon_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $userId, $pokemonId);

        if (!$stmt->execute()) {
            $conn->close();
            throw new \Exception("Failed to store favorite pokemon");
        }

        $conn->close();
    }

    // ===================================== READ =================================== //

    public function getFavoritePokemonByUserId(int $userId): array
    {
        $conn = $this->databaseConfig->connect();

        $stmt = $conn->prepare("SELECT p.* FROM pokemon_data AS p INNER JOIN favorites AS f ON p.id = f.pokemon_id WHERE f.trainer_id = ?");
        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $pokemonList = [];

            while ($row = $result->fetch_object()) {
                $pokemonList[] = $row;
            }

            $conn->close();

            return $pokemonList;
        } else {
            $conn->close();
            throw new \Exception("Failed to retrieve favorite pokemon");
        }
    }
}