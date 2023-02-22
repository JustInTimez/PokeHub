<?php

namespace Model;

class User {

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
     * Get the value of fname
     */ 
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set the value of fname
     *
     * @return  self
     */ 
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get the value of lname
     */ 
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set the value of lname
     *
     * @return  self
     */ 
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of contact_no
     */ 
    public function getContact_no()
    {
        return $this->contact_no;
    }

    /**
     * Set the value of contact_no
     *
     * @return  self
     */ 
    public function setContact_no($contact_no)
    {
        $this->contact_no = $contact_no;

        return $this;
    }
}