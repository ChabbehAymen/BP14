<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/model/HomePageModel.php');

$model = new HomePageModel();

$startDate = date('Y-m-d');
$endDate = '';
$availability = 'all';
$category = 'all';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['startDate'] !== '') $startDate = $_POST['startDate'];
    if ($_POST['endDate'] !== '') $endDate = $_POST['endDate'];
    $availability = $_POST['availability'];
    $category = $_POST['category'];

}


function getEvents()
{
    global $model, $startDate, $endDate, $category;
    return $model->getAllEvents($startDate, $endDate, $category);
}

function getCategories(): array
{
    global $model;
    return $model->getAllCategories();
}

function isTherePlace($ID): bool
{
    global $model;
    if ($model->getEmptyPlaces($ID) != 0)
        return true;
    return false;
}