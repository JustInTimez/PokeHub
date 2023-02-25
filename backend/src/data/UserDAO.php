<?php

namespace Data;

use Config\DatabaseConfig;
use Data\FavoritesDAO;
use Model\User;
use Model\Favorites;

class UserDAO
{

    // =================================== Fields =================================== //

    private DatabaseConfig $databaseConfig;


    // =================================== Constructor ============================== //

    public function __construct($databaseConfig)
    {
        $this->databaseConfig = $databaseConfig;
    }



    // ====================================== CREATE ================================ //

    public function addUser($email, $password)
    {
        // Add user to the database
        $conn = $this->databaseConfig->connect();

        $stmt = $conn->prepare("INSERT INTO trainers (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);

        $stmt->execute();
        $stmt->close();
        $conn->close();
    }



    // ===================================== READ ================================ //

    public function getUserByEmail($email)
    {
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
