<?php
require_once(__ROOT__ . '/model/DBconf.php');
class HomePageModel extends DBconf
{
    public function getAllEvents($startDate, $endDate, $category)
    {
        $q  ="SELECT ID_VERSION, TITRE , DATE , CATEGORIE , IMAGE , CAPACITE - COUNT(NUM_BILLET) AS 'DISPONIBLE' FROM BILLET INNER JOIN FACTURE USING(NUM_FACTURE) RIGHT JOIN VERSION USING(ID_VERSION) INNER JOIN EVENEMENT USING(ID_EVENT) INNER JOIN SALLE USING (NUM_SALLE) GROUP BY ID_VERSION HAVING DATE >= '$startDate'";
        // var_dump($endDate);
        if ($endDate != '')$q=$q." and DATE <= '".$endDate."'";
        if ($category !== 'all')$q=$q." and CATEGORIE = '$category'";
        $query = $this->pdo->prepare($q);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    final function getAllCategories()
    {
        $query = $this->pdo->prepare('SELECT DISTINCT CATEGORIE FROM EVENEMENT');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmptyPlaces($ID)
    {
        $query = $this->pdo->prepare("SELECT CAPACITE -  COUNT(PLACE) AS TOTALP FROM BP14.FACTURE INNER JOIN BP14.BILLET USING(NUM_FACTURE) INNER JOIN VERSION USING(ID_VERSION) INNER JOIN BP14.SALLE USING(NUM_SALLE) WHERE ID_VERSION = $ID;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC)[0]['TOTALP'];
    }

}
