<?php

namespace Model;

class Pokemon implements \JsonSerializable {


    // =================================== Fields =================================== //

    private $id;
    private $attack;
    private $base_egg_steps;
    private $classification;
    private $defense;
    private $height_m;
    private $hp;
    private $name;
    private $pokedex_number;
    private $sp_attack;
    private $sp_defense;
    private $speed;
    private $type1;
    private $type2;
    private $weight_kg;
    private $is_legendary;
    private $abilities = [];
    private $img;
    

    // ================================= Constructor ================================= //

    public function __construct($id, $attack, $base_egg_steps, $classification, $defense, $height_m, $hp, $name, 
        $pokedex_number, $sp_attack, $sp_defense, $speed, $type1, $type2, $weight_kg, $is_legendary, $abilities, $img) {
            
        $this->id = $id;
        $this->attack = $attack;
        $this->base_egg_steps = $base_egg_steps;
        $this->classification = $classification;
        $this->defense = $defense;
        $this->height_m = $height_m;
        $this->hp = $hp;
        $this->name = $name;
        $this->pokedex_number = $pokedex_number;
        $this->sp_attack = $sp_attack;
        $this->sp_defense = $sp_defense;
        $this->speed = $speed;
        $this->type1 = $type1;
        $this->type2 = $type2;
        $this->weight_kg = $weight_kg;
        $this->is_legendary = $is_legendary;
        $this->img = $img;


        // Decode abilities property if it's a JSON string
       if (is_string($abilities)) {
            $this->abilities = json_decode($abilities, true) ?: [];

        } elseif (is_array($abilities)) {
            $this->abilities = $abilities;
        }

    }

    // =================================== Methods =================================== //


    // converts stdObject to Model class Object
    public static function readPkmFromDB($Object) {  

        $pokemon = new Pokemon(
            $Object->id, $Object->attack, $Object->base_egg_steps, 
            $Object->classification, $Object->defense, $Object->height_m, $Object->hp, 
            $Object->name, $Object->pokedex_number, $Object->sp_attack, $Object->sp_defense, 
            $Object->speed, $Object->type1, $Object->type2, $Object->weight_kg, $Object->is_legendary, $Object->abilities, $Object->img);

        return $pokemon;

    }

    public function checkClassification(): void {
        if (isset($this->classification)) {
            // Do something with the classification property
            echo $this->classification;
        } else {
            // The classification property is not defined
            echo 'Classification is not defined';
        }
    }

    public function jsonSerialize(): mixed {

        return [
            "id" => $this->id,
            "attack" => $this->attack,
            "base_egg_steps" => $this->base_egg_steps,
            "classification" => $this->classification,
            "defense" => $this->defense,
            "height_m" => $this->height_m,
            "hp" => $this->hp,
            "name" => $this->name,
            "pokedex_number" => $this->pokedex_number,
            "sp_attack" => $this->sp_attack,
            "sp_defense" => $this->sp_defense,
            "speed" => $this->speed,
            "type1" => $this->type1,
            "type2" => $this->type2,
            "weight_kg" => $this->weight_kg,
            "is_legendary" => $this->is_legendary,
            "abilities" => $this->abilities,
            "img" => $this->img
        ];
    }



    // ============================= Getters and Setters ============================= //
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    public function getAttack() {
        return $this->attack;
    }

    public function setAttack($attack) {
        $this->attack = $attack;

        return $this;
    }

    public function getBase_egg_steps() {
        return $this->base_egg_steps;
    }

    public function setBase_egg_steps($base_egg_steps) {
        $this->base_egg_steps = $base_egg_steps;

        return $this;
    }

    public function getClassification() {
        return $this->classification;
    }

    public function setClassification($classification) {
        $this->classification = $classification;

        return $this;
    }

    public function getDefense() {
        return $this->defense;
    }

    public function setDefense($defense) {
        $this->defense = $defense;

        return $this;
    }

    public function getHeight_m() {
        return $this->height_m;
    }

    public function setHeight_m($height_m) {
        $this->height_m = $height_m;

        return $this;
    }

    public function getHp() {
        return $this->hp;
    }

    public function setHp($hp) {
        $this->hp = $hp;

        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    public function getPokedex_number() {
        return $this->pokedex_number;
    }

    public function setPokedex_number($pokedex_number) {
        $this->pokedex_number = $pokedex_number;

        return $this;
    }

    public function getSp_attack() {
        return $this->sp_attack;
    }

    public function setSp_attack($sp_attack) {
        $this->sp_attack = $sp_attack;

        return $this;
    }

    public function getSp_defense() {
        return $this->sp_defense;
    }

    public function setSp_defense($sp_defense) {
        $this->sp_defense = $sp_defense;

        return $this;
    }

    public function getSpeed() {
        return $this->speed;
    }

    public function setSpeed($speed) {
        $this->speed = $speed;

        return $this;
    }

    public function getType1() {
        return $this->type1;
    }

    public function setType1($type1) {
        $this->type1 = $type1;

        return $this;
    }

    public function getType2() {
        return $this->type2;
    }

    public function setType2($type2) {
        $this->type2 = $type2;

        return $this;
    }

    public function getWeight_kg() {
        return $this->weight_kg;
    }

    public function setWeight_kg($weight_kg) {
        $this->weight_kg = $weight_kg;

        return $this;
    }

    public function getIs_legendary() {
        return $this->is_legendary;
    }

    public function setIs_legendary($is_legendary) {
        $this->is_legendary = $is_legendary;

        return $this;
    }

    public function getAbilities() {
        return $this->abilities;
    }

    public function setAbilities($abilities) {
        $this->abilities = $abilities;

        return $this;
    }

    public function getImg() {
        return $this->img;
    }

    public function setImg($img) {
        $this->img = $img;

        return $this;
    }
}