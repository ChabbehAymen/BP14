<?php
require_once(__ROOT__ . '/model/HomePageModel.php');
session_start();
class EventSellsModel extends HomePageModel
{
    public function getEventByID($id){
        $query = $this->pdo->prepare("
            SELECT ID_VERSION, TITRE , DATE , CATEGORIE , SALLE.DESCRIPTION, IMAGE, TARIF_REDUIT, TARIF_NORMAL  , CAPACITE - COUNT(NUM_BILLET) AS 'DISPONIBLE' 
                    FROM BILLET INNER JOIN FACTURE USING(NUM_FACTURE) 
                    RIGHT JOIN VERSION USING(ID_VERSION) 
                    INNER JOIN EVENEMENT USING(ID_EVENT) 
                    INNER JOIN SALLE USING (NUM_SALLE) 
                    WHERE ID_VERSION = $id 
                    GROUP BY ID_VERSION");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function byTickets($id, $type){
            $emptyPlace = $this->getFirstEmptyPlaceInSalle($id)[0]['PLACE']+1;
            $query = $this->pdo->prepare("INSERT INTO BP14.BILLET VALUES (DEFAULT, (SELECT MAX(NUM_FACTURE) AS ID FROM FACTURE), '$type', $emptyPlace)");
            if ($query->execute())return true;
            else return false;
    }
    
    public function createFacture($id){
        return $this->pdo->query("INSERT INTO BP14.FACTURE VALUES (DEFAULT, ".$_SESSION['loggedUser'].", $id, '".date('Y-m-d h:m:s', time())."')");
    }

    private function getFirstEmptyPlaceInSalle($versionID)
    {
        $query = $this->pdo->prepare("SELECT COUNT(PLACE) AS PLACE FROM BILLET INNER JOIN FACTURE USING(NUM_FACTURE) INNER JOIN VERSION USING(ID_VERSION) INNER JOIN SALLE USING(NUM_SALLE) WHERE ID_VERSION = $versionID;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}