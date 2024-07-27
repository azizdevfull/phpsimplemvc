<?php

class User
{

    // Make private to secure the connection var
    private $db;

    // First initial constructor function
    public function __construct()
    {
        $host = "127.0.0.1";
        $dbname = "mvc-tuto";
        $dbport = "8889";
        $username = "root";
        $password = "root";

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;port=$dbport", $username, $password);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Select all users
    public function getUsers()
    {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Select detail for given id
    public function getUserById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $email 
     * 
     * @return boolean 
     */
    public function checkEmailExists($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return true;
        }
        return false;
    }

    public function insertUser($name, $email)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name,email) value (:name,:email)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $stmt2 = $this->db->prepare("SELECT * FROM users ORDER BY id DESC LIMIT 1");
        $stmt2->execute();
        $last_record = $stmt2->fetch(PDO::FETCH_ASSOC);

        if ($email == $last_record['email']) {
            return true;
        } else {
            return false;
        }
    }


}