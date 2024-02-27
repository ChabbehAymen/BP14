<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/model/EventSellsModel.php');

$model = new EventSellsModel();

if (isset($_POST['byTicket'])) {
    $tarifReduit = $_POST['tarifReduit'];
    $tarifNormal = $_POST['tarifNormal'];
    $id = $_GET['id'];

    var_dump(getEventDetail($id)[0]['DISPONIBLE'] != 0);

    if (isset($_SESSION['loggedUser']) and $_SESSION['loggedUser'] != 0) {
    if (getEventDetail($id)[0]['DISPONIBLE'] != 0) {
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
    return $model->getAllEvents(date('Y-m-d'), '', 'all');
}


function getEventDetail($id)
{
    global $model;
    return $model->getEventByID($id);
}
