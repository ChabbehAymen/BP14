<?php
require_once(__ROOT__ . '/model/HomePageModel.php');
session_start();
class EventSellsModel extends HomePageModel
{
    public function getEventByID($id){
        $query = $this->pdo->prepare("SELECT ID_VERSION, TITRE , DATE , CATEGORIE , SALLE.DESCRIPTION, IMAGE, TARIF_REDUIT, TARIF_NORMAL  , CAPACITE - COUNT(NUM_BILLET) AS 'DISPONIBLE' FROM BILLET INNER JOIN FACTURE USING(NUM_FACTURE) RIGHT JOIN VERSION USING(ID_VERSION) INNER JOIN EVENEMENT USING(ID_EVENT) INNER JOIN SALLE USING (NUM_SALLE) WHERE ID_VERSION = $id GROUP BY ID_VERSION");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function byTickets($id, $type){
        if (!$this->insertFacture($id)) return false;
            $emptyPlace = $this->getFirstEmptyPlaceInSalle()[0];
            $query = $this->pdo->prepare("INSERT INTO BP14.BILLET VALUES (DEFAULT, (SELECT COUNT(BP14.FACTURE.NUM_FACTURE) AS ID FROM BP14.FACTURE), " . $type . ", $emptyPlace)");
            if ($query->execute())return true;
            else return false;
    }

    private function insertFacture($id){
        return $this->pdo->query("INSERT INTO BP14.FACTURE VALUES (DEFAULT, ".$_SESSION['loggedUser'].",(SELECT ID_VERSION FROM BP14.EVENEMENT INNER JOIN BP14.VERSION USING (ID_EVENT) WHERE ID_EVENT = $id), '2024-02-25 04:02:15 ')");
    }

    private function getFirstEmptyPlaceInSalle()
    {
        $query = $this->pdo->prepare("SELECT COUNT(PLACE) + 1 FROM BP14.BILLET;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}