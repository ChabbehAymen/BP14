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

    public function insertUser($firstName, $lastName, $email, $password): bool
    {
        return $this->pdo->query("INSERT INTO UTILISATEUR VALUES(DEFAULT, '$firstName', '$lastName', '$email', '$password')");
    }

    public function getAllUsers(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM UTILISATEUR');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($ID): array{
        $query = $this->pdo->prepare('SELECT * FROM `UTILISATEUR` WHERE :ID ; ');
        $query->execute(array('ID'=>$ID));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUserFirstName($ID, $firstName): bool
    {
        $query = $this->pdo->prepare('UPDATE UTILISATEUR SET NOM = :firstName WHERE ID_UTILISATEUR = :ID');
        return $query->execute(array('firstName' =>$firstName, 'ID'=>$ID ));
    }

    public function updateUserLastName($ID, $lastName): bool{
        $query = $this->pdo->prepare('UPDATE UTILISATEUR SET PRENOM = :lastName WHERE ID_UTILISATEUR = :ID');
        return $query->execute(array('lastName' =>$lastName, 'ID'=>$ID ));
    }

    public function updateUserPassword($ID, $password): bool
    {
        $query = $this->pdo->prepare('UPDATE UTILISATEUR SET `PASSWORD` = :password WHERE ID_UTILISATEUR = :ID');
        return $query->execute(array('password' =>$password, 'ID'=>$ID ));
    }

}