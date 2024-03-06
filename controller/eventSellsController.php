<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/model/EventSellsModel.php');
require_once (__ROOT__.'/helpers/Router.php');
require_once (__ROOT__.'/helpers/Reporter.php');

$model = new EventSellsModel();

if (isset($_POST['byTicket'])) {
    $tarifReduit = (int)$_POST['tarifReduit'];
    $tarifNormal = (int)$_POST['tarifNormal'];
    $id = $_GET['id'];

    if (isset($_SESSION['loggedUser']) and $_SESSION['loggedUser'] != 0) {
    if (getEventDetail($id)[0]['DISPONIBLE'] != 0 and getEventDetail($id)[0]['DISPONIBLE'] - ($tarifNormal+$tarifReduit) != 0) {
//        $model->createFacture($_GET['id']);
//            for ($i = 0; $i < $tarifReduit; $i++) {
//                $model->byTickets($_GET['id'],'Reduit');
//            }
//            for ($i = 0; $i < $tarifNormal; $i++) {
//                $model->byTickets($_GET['id'],'Normal');
//            }
            Reporter::setReport(Reporter::$PURCHASE_SUCCEEDED);
            Router::route('event', ['key'=>'id','value'=>$_GET['id']]);
        }
    } else {
        Reporter::setReport(Reporter::$PURCHASE_FIELD);
        Router::route('signup');
    }
}

function getEvents(): bool|array
{
    global $model;
    return $model->getAllEvents(date('Y-m-d'), '', 'all');
}


function getEventDetail($id): bool|array
{
    global $model;
    return $model->getEventByID($id);
}
