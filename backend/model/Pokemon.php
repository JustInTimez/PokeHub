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
    
    

    // ================================= Constructor ================================= //

    public function __construct($id, $attack, $base_egg_steps, $classification, $defense, $height_m, $hp, $name, $pokedex_number, $sp_attack, $sp_defense, $speed, $type1, $type2, $weight_kg, $is_legendary) {
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
        
    }

    // =================================== Methods =================================== //


    // converts stdObject to Model class Object
    public static function readPkmFromDB($Object) {

        $pokemon = new Pokemon(
            $Object->id, $Object->attack, $Object->base_egg_steps, 
            $Object->classification, $Object->defense, $Object->height_m, $Object->hp, 
            $Object->name, $Object->pokedex_number, $Object->sp_attack, $Object->sp_defense, 
            $Object->speed, $Object->type1, $Object->type2, $Object->weight__kg, $Object->is_legendary);
            // $pokemon->setStudentNo($Object->student_no);  Not needed - not setting any Pokemon.
        return $pokemon;

    }


    public function jsonSerialize() {
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
            "is_legendary" => $this->is_legendary
        ];
    }



    // ============================= Getters and Setters ============================= //
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of attack
     */ 
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Set the value of attack
     *
     * @return  self
     */ 
    public function setAttack($attack)
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get the value of base_egg_steps
     */ 
    public function getBase_egg_steps()
    {
        return $this->base_egg_steps;
    }

    /**
     * Set the value of base_egg_steps
     *
     * @return  self
     */ 
    public function setBase_egg_steps($base_egg_steps)
    {
        $this->base_egg_steps = $base_egg_steps;

        return $this;
    }

    /**
     * Get the value of classification
     */ 
    public function getClassification()
    {
        return $this->classification;
    }

    /**
     * Set the value of classification
     *
     * @return  self
     */ 
    public function setClassification($classification)
    {
        $this->classification = $classification;

        return $this;
    }

    /**
     * Get the value of defense
     */ 
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     *
     * @return  self
     */ 
    public function setDefense($defense)
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get the value of height_m
     */ 
    public function getHeight_m()
    {
        return $this->height_m;
    }

    /**
     * Set the value of height_m
     *
     * @return  self
     */ 
    public function setHeight_m($height_m)
    {
        $this->height_m = $height_m;

        return $this;
    }

    /**
     * Get the value of hp
     */ 
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set the value of hp
     *
     * @return  self
     */ 
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of pokedex_number
     */ 
    public function getPokedex_number()
    {
        return $this->pokedex_number;
    }

    /**
     * Set the value of pokedex_number
     *
     * @return  self
     */ 
    public function setPokedex_number($pokedex_number)
    {
        $this->pokedex_number = $pokedex_number;

        return $this;
    }

    /**
     * Get the value of sp_attack
     */ 
    public function getSp_attack()
    {
        return $this->sp_attack;
    }

    /**
     * Set the value of sp_attack
     *
     * @return  self
     */ 
    public function setSp_attack($sp_attack)
    {
        $this->sp_attack = $sp_attack;

        return $this;
    }

    /**
     * Get the value of sp_defense
     */ 
    public function getSp_defense()
    {
        return $this->sp_defense;
    }

    /**
     * Set the value of sp_defense
     *
     * @return  self
     */ 
    public function setSp_defense($sp_defense)
    {
        $this->sp_defense = $sp_defense;

        return $this;
    }

    /**
     * Get the value of speed
     */ 
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set the value of speed
     *
     * @return  self
     */ 
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get the value of type1
     */ 
    public function getType1()
    {
        return $this->type1;
    }

    /**
     * Set the value of type1
     *
     * @return  self
     */ 
    public function setType1($type1)
    {
        $this->type1 = $type1;

        return $this;
    }

    /**
     * Get the value of type2
     */ 
    public function getType2()
    {
        return $this->type2;
    }

    /**
     * Set the value of type2
     *
     * @return  self
     */ 
    public function setType2($type2)
    {
        $this->type2 = $type2;

        return $this;
    }

    /**
     * Get the value of weight_kg
     */ 
    public function getWeight_kg()
    {
        return $this->weight_kg;
    }

    /**
     * Set the value of weight_kg
     *
     * @return  self
     */ 
    public function setWeight_kg($weight_kg)
    {
        $this->weight_kg = $weight_kg;

        return $this;
    }

    /**
     * Get the value of is_legendary
     */ 
    public function getIs_legendary()
    {
        return $this->is_legendary;
    }

    /**
     * Set the value of is_legendary
     *
     * @return  self
     */ 
    public function setIs_legendary($is_legendary)
    {
        $this->is_legendary = $is_legendary;

        return $this;
    }
}