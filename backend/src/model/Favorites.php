<?php

namespace Model;

class Favorites {

    // ================================== Fields =================================== //

    private $id;
    private $trainer_id;
    private $pokemon_id;

    // ================================= Constructor ================================= //
    
    public function __construct($trainer_id, $pokemon_id) {

        $this->trainer_id = $trainer_id;
        $this->pokemon_id = $pokemon_id;

    }


    // ============================= Getters and Setters ============================= //


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    public function getTrainer_id() {
        return $this->trainer_id;
    }

    public function setTrainer_id($trainer_id) {
        $this->trainer_id = $trainer_id;

        return $this;
    }

    public function getPokemon_id() {
        return $this->pokemon_id;
    }

    public function setPokemon_id($pokemon_id) {
        $this->pokemon_id = $pokemon_id;

        return $this;
    }
}