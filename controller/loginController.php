<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/model/AuthenticationModel.php');
require_once (__ROOT__.'/helpers/Router.php');

session_start();
$model = new AuthenticationModel();

if (isset($_SESSION['loggedUser'])){
    navigateToHomePage();
}

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isEmailValid() and isPasswordValid()){
        $userFound = false;
        $userID = 0;
        foreach ($model->getAllUsers() as $user){
            if ($userFound) break;
            $userFound = $user['EMAIL'] === $email and $user['PASSWORD'] === $password;
            $userID = $user['ID_UTILISATEUR'];
        }
        if ($userFound){
                successfulLogin($userID);
        }else{
                Router::route('home');
        }
    }
}

function isEmailValid(){
    global $email;
    return strlen($email) >= 10 and strchr($email, '@') ;
}

function isPasswordValid(): bool
{
    global $password;
    return strlen($password)>=6;
}

function successfulLogin($userID): void
{
    $_SESSION['loggedUser'] = $userID;
    navigateToHomePage();
}

function navigateToHomePage(): void
{
    Router::route('home');
}
