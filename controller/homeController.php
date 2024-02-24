<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/model/HomePageModel.php');

$model = new HomePageModel();

$startDate = '01-01-2000';
$endDate = date('Y-m-d');
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

function isTherePlace($title): bool
{
    global $model;
    if ($model->getCapacityOfSallePerEventTitle($title) - $model->getNumberOfPlacesPerEventTitle($title) != 0)
        return true;
    return false;
}