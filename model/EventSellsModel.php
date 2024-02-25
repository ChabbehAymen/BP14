<?php
require_once(__ROOT__ . '/model/HomePageModel.php');
session_start();
class EventSellsModel extends HomePageModel
{
    public function getEventByTitle($title){
        $query = $this->pdo->prepare("SELECT * FROM EVENEMENT WHERE TITRE = '$title'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function byTickets($title, $tickets){
        if (!$this->insertFacture($title)) return false;
        foreach ($tickets as $ticket){
            $emptyPlace = $this->getFirstEmptyPlaceInSalle();
            $query = $this->pdo->prepare("INSERT INTO BP14.BILLET VALUES (DEFAULT, (SELECT COUNT(BP14.FACTURE.NUM_FACTURE) AS ID FROM BP14.FACTURE), " . $ticket['type'] . ", $emptyPlace)");
            if ($query->execute())continue;
            else return false;
        }
        return true;
    }

    private function insertFacture($title){
        return $this->pdo->query("INSERT INTO BP14.FACTURE VALUES (DEFAULT, ".$_SESSION['loggedUser'].",(SELECT ID_VERSION FROM BP14.EVENEMENT INNER JOIN BP14.VERSION USING (ID_EVENT) WHERE TITRE = '$title'), '2024-02-25 04:02:15 ')");
    }

    private function getFirstEmptyPlaceInSalle()
    {
        $query = $this->pdo->prepare("SELECT COUNT(PLACE) + 1 FROM BP14.BILLET;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}