<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/model/EventSellsModel.php');

$model = new EventSellsModel();

if (isset($_POST['byTicked'])){
    $tarifReduit = $_POST['tarifReduit'];
    $tarifNormal = $_POST['tarifNormal'];
    $title = $_GET['title'];
    if (getRemainedPaces($title)-($tarifNormal+$tarifReduit) > 0){
//        $model->byTickets()
    }
}

function getEvents(){
    global $model;
    return $model->getAllEvents('01-01-2000', date('Y-m-d'), 'all');
}

function getRemainedPaces($title){
    global $model;
    return $model->getCapacityOfSallePerEventTitle($title) - $model->getNumberOfPlacesPerEventTitle($title);
}
function isTherePlace($title): bool
{
    return getRemainedPaces($title)!=0;
}

function getEventDetail($title){
    global $model;
    return $model->getEventByTitle($title);
}
