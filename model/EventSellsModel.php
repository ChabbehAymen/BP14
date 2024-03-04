<?php
require_once(__ROOT__ . '/model/HomePageModel.php');
session_start();
class EventSellsModel extends HomePageModel
{
    public function getEventByID($id): bool|array
    {
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

    public function byTickets($id, $type): bool
    {
            $emptyPlace = $this->getFirstEmptyPlaceInSalle($id)[0]['PLACE']+1;
            $query = $this->pdo->prepare("INSERT INTO BP14.BILLET VALUES (DEFAULT, (SELECT MAX(NUM_FACTURE) AS ID FROM FACTURE), '$type', $emptyPlace)");
            if ($query->execute())return true;
            else return false;
    }
    
    public function createFacture($id):bool
    {
        $query = $this->pdo->prepare("INSERT INTO BP14.FACTURE VALUES (DEFAULT, :userID, :versionId, '".date('Y-m-d h:m:s', time())."')");
        return $query->execute(array('userID'=>$_SESSION['loggedUser'], 'versionId'=>$id));
    }

    private function getFirstEmptyPlaceInSalle($versionID): bool|array
    {
        $query = $this->pdo->prepare("SELECT COUNT(PLACE) AS PLACE FROM BILLET INNER JOIN FACTURE USING(NUM_FACTURE) INNER JOIN VERSION USING(ID_VERSION) INNER JOIN SALLE USING(NUM_SALLE) WHERE ID_VERSION = $versionID;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPurchases($id):bool|array
    {
        $q = "SELECT BILLET.NUM_BILLET, NUM_FACTURE  AS NF, TITRE ,FACTURE.DATE_ACHAT ,CATEGORIE , EVENEMENT.DESCRIPTION,
ifnull((SELECT COUNT(BILLET.TYPE) FROM BILLET WHERE NUM_FACTURE = NF AND BILLET.TYPE = 'Normal' GROUP BY BILLET.TYPE), 0)AS 'COUN_NORMAL',
ifnull((SELECT COUNT(BILLET.TYPE) FROM BILLET WHERE NUM_FACTURE = NF AND BILLET.TYPE = 'Reduit' GROUP BY BILLET.TYPE) ,0)AS 'COUN_REDUIT',
(SELECT ifnull(COUN_NORMAL,0)*EVENEMENT.TARIF_NORMAL+ifnull(COUN_REDUIT,0)*EVENEMENT.TARIF_REDUIT) AS TOTAL
FROM BILLET INNER JOIN FACTURE USING(NUM_FACTURE) 
INNER JOIN VERSION USING(ID_VERSION) 
INNER JOIN EVENEMENT USING(ID_EVENT) 
INNER JOIN SALLE USING (NUM_SALLE)
INNER JOIN UTILISATEUR USING(ID_UTILISATEUR)
WHERE ID_UTILISATEUR = :id
GROUP BY FACTURE.NUM_FACTURE";
        $query = $this->pdo->prepare($q);
        return $query->execute($id);

    }

}