<?php

namespace Data;

use Config\DatabaseConfig;
use Model\User;

class UserDAO {

    // =================================== Fields =================================== //

    private DatabaseConfig $databaseConfig;


    // =================================== Constructor ============================== //

    public function __construct($databaseConfig) {
        $this->databaseConfig = $databaseConfig;
    }



    // ====================================== CREATE ================================ //

    public function addUser(User $user) {
        // Add user to the database
        $conn = $this->databaseConfig->connect();
    
        $stmt = $conn->prepare("INSERT INTO trainers (fname, lname, email, password, contact_no) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $user->getFname(), $user->getLname(), $user->getEmail(), $user->getPassword(), $user->getContact_no());
    
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    // ===================================== READ ================================ //

    // TODO: Upgrade this for better auth later...
    public function getUserByEmail($email) {
        $conn = $this->databaseConfig->connect();

        $stmt = $conn->prepare("SELECT * FROM trainers WHERE email = ?");
        $stmt->bind_param("s", $email);
    
        $userFromDB = null;
    
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $userFromDB = new User(
                    $row['id'],
                    $row['fname'],
                    $row['lname'],
                    $row['email'],
                    $row['password'],
                    $row['contact_no']
                );
            }
        }
    
        $stmt->close();
        $conn->close();
    
        if ($userFromDB === null) {
            return "No User Found. Try again m8!";
        }

        return $userFromDB;
    }



}