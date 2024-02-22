<?php
require 'model/HomePageModel.php';

$model = new HomePageModel();
function getEvents(){
    global $model;
    return $model->getAllEvents();
}