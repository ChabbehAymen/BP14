<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/model/AuthenticationModel.php');
require_once(__ROOT__ . '/helpers/Router.php');
require_once(__ROOT__ . '/helpers/Reporter.php');
session_start();


$model = new AuthenticationModel();
if (isset($_POST['register'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($model->getUserByEmail($email) === false) {
        Reporter::setReport(Reporter::$ACCOUNT_EXISTS);
        Router::route('signup');
    } else {
        if (strlen($firstName) >= 4 and strlen($lastName) >= 4 and isEmailValid() and strlen($password) >= 6) {
            $insertion = $model->insertUser($firstName, $lastName, $email, $password);
            if ($insertion) Router::route('login');
            else Router::route('signup');
        }
    }

}


function isEmailValid()
{
    global $email;
    return strlen($email) >= 10 and strchr($email, '@');
}