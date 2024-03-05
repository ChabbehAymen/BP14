<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__.'/model/EventSellsModel.php';

$model = new EventSellsModel();

function getPurchases(): bool|array
{
    global $model;
    return $model->getPurchases($_SESSION['loggedUser']);
}
