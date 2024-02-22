<?php

class HomePageModel
{
    private $pdo;
    public function __construct()
    {

        try {
            $this->pdo = new PDO($GLOBALS['dbLink'], 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAllEvents()
    {
        $query = $this->pdo->prepare('SELECT TITRE, CATEGORIE, IMAGE, DATE FROM EVENEMENT INNER JOIN BP14.VERSION V on EVENEMENT.ID_EVENT = V.ID_EVENT');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

}
