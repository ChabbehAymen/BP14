<?php
require_once(__ROOT__ . '/model/DBconf.php');

class AuthenticationModel extends DBconf
{
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
        $query = $this->pdo->prepare('SELECT * FROM `UTILISATEUR` WHERE ID_UTILISATEUR = :ID ; ');
        $query->execute(array('ID'=>$ID));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByEmail(string $email)
    {
        $query = $this->pdo->prepare('SELECT * FROM `UTILISATEUR` WHERE EMAIL = :email ; ');
        $query->execute(array('email'=>$email));
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