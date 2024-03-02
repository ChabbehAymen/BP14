<?php
session_start();
define("__ROOT__", dirname(dirname(__FILE__)));
require_once __ROOT__.'/model/AuthenticationModel.php';
$model = new AuthenticationModel();


if (isset($_POST['update'])){
    $userID = $_SESSION['loggedUser'];
    var_dump($_POST);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];

    $user = getUserById();

    if (!empty($firstName) and !empty($lastName) and !empty($password)){
        if ($user['NOM'] !== $firstName){
            $model->updateUserFirstName($userID, $firstName);
        }elseif ($user['PRENOM'] !== $lastName){
            $model->updateUserLastName($userID, $lastName);
        }elseif ($user['PASSWORD'] !== $password){
            $model->updateUserPassword($userID, $password);
        }
    }
    header('Location: /BP14/profile');
}

function getUserById(): array{
    global $model;
    return $model->getUserById($_SESSION['loggedUser']);
}
