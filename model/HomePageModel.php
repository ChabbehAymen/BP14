<?php

class HomePageModel
{
    protected $pdo;
    public function __construct()
    {

        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=BP14;charset=UTF8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAllEvents($startDate, $endDate, $category)
    {

        if ($category === 'all') {
            $query = $this->pdo->prepare("SELECT TITRE, CATEGORIE, IMAGE, DATE FROM EVENEMENT INNER JOIN BP14.VERSION V on EVENEMENT.ID_EVENT = V.ID_EVENT WHERE  DATE >= $startDate AND DATE <= '$endDate'");
        } else $query = $this->pdo->prepare("SELECT TITRE, CATEGORIE, IMAGE, DATE FROM EVENEMENT INNER JOIN BP14.VERSION V on EVENEMENT.ID_EVENT = V.ID_EVENT WHERE  DATE >= $startDate AND DATE <= '$endDate' and CATEGORIE = '$category'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    final function getAllCategories()
    {
        $query = $this->pdo->prepare('SELECT DISTINCT CATEGORIE FROM EVENEMENT');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNumberOfPlacesPerEventTitle($title)
    {
        $query = $this->pdo->prepare("SELECT COUNT(PLACE) AS TOTALP FROM BP14.FACTURE INNER JOIN BP14.BILLET USING(NUM_FACTURE) WHERE ID_VERSION = (SELECT ID_VERSION FROM BP14.EVENEMENT INNER JOIN BP14.VERSION USING(ID_EVENT) WHERE TITRE = '$title')");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC)[0]['TOTALP'];
    }

    public function getCapacityOfSallePerEventTitle($title){
        $query = $this->pdo->prepare("SELECT CAPACITE FROM BP14.EVENEMENT INNER JOIN (SELECT * FROM BP14.VERSION INNER JOIN BP14.SALLE USING (NUM_SALLE))  AS A USING(ID_EVENT) where TITRE = '$title'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC)[0]['CAPACITE'];
    }

}
