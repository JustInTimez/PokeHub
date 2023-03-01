<?php

namespace Model;

class User implements \JsonSerializable {

    // =================================== Fields =================================== //

    private $id;
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $contact_no;


    // ================================= Constructor ================================= //

    public function __construct($id, $fname, $lname, $email, $password, $contact_no) {
        
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->password = $password;
        $this->contact_no = $contact_no;
    }

    // ================================= Methods ================================= //

    public function jsonSerialize(): mixed {

        return [
            "id" => $this->id,
            "fname" => $this->fname,
            "lname" => $this->lname,
            "email" => $this->email,
            "password" => $this->password,
            "contact_no" => $this->contact_no
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

    public function getFname() {
        return $this->fname;
    }

    public function setFname($fname) {
        $this->fname = $fname;

        return $this;
    }

    public function getLname() {
        return $this->lname;
    }

    public function setLname($lname) {
        $this->lname = $lname;

        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    public function getContact_no() {
        return $this->contact_no;
    }

    public function setContact_no($contact_no) {
        $this->contact_no = $contact_no;

        return $this;
    }
}