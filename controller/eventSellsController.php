<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/model/EventSellsModel.php');

$model = new EventSellsModel();

if (isset($_POST['byTicket'])) {
    $tarifReduit = $_POST['tarifReduit'];
    $tarifNormal = $_POST['tarifNormal'];
    $id = $_GET['id'];

    if (isset($_SESSION['loggedUser']) and $_SESSION['loggedUser'] != 0) {
        if (getRemainedPaces($id) - ($tarifNormal + $tarifReduit) > 0) {
            for ($i = 0; $i < $tarifReduit; $i++) {
                $model->byTickets($_GET['id'],'Reduit');
            }
            for ($i = 0; $i < $tarifNormal; $i++) {
                $model->byTickets($_GET['id'],'Normal');
            }
        }
    }else header('Location: /BP14/login');
}

function getEvents()
{
    global $model;
    return $model->getAllEvents('01-01-2000', date('Y-m-d'), 'all');
}

function getRemainedPaces($ID)
{
    global $model;
    return $model->getCapacityOfSallePerEventTitle($ID) - $model->getNumberOfPlacesPerEventTitle($ID);
}

function isTherePlace($title): bool
{
    return getRemainedPaces($title) != 0;
}

function getEventDetail($id)
{
    global $model;
    return $model->getEventByID($id);
}
