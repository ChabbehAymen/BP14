<?php

class AuthenticationModel
{
    private $pdo;
    public function __construct()
    {

        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=BP14;charset=UTF8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function insertUser($firstName, $lastName, $email, $password)
    {
        return $this->pdo->query("INSERT INTO UTILISATEUR VALUES(DEFAULT, '$firstName', '$lastName', '$email', '$password')");
    }

    public function getAllUsers()
    {
        $query = $this->pdo->prepare('SELECT * FROM UTILISATEUR');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}