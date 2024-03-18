<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/model/AuthenticationModel.php');
require_once(__ROOT__ . '/helpers/Router.php');
require_once(__ROOT__ . '/helpers/Reporter.php');

session_start();
$model = new AuthenticationModel();

if (isset($_SESSION['loggedUser'])) {
    Router::route('home');
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isEmailValid() and isPasswordValid()) {
        $user = $model->getUserByEmail($email);
        if ($user !== false && $user['PASSWORD'] === $password) successfulLogin($user['ID_UTILISATEUR']);
        elseif ($user !== false && $user['PASSWORD'] !== $password){
            Reporter::setReport(Reporter::$INCORRECT_PASSWORD);
            Router::route('login');
        }else{
            Reporter::setReport(Reporter::$NO_ACCOUNT_FOUND);
            Router::route('login');
        }
    }
}

function isEmailValid()
{
    global $email;
    return strlen($email) >= 10 and strchr($email, '@');
}

function isPasswordValid(): bool
{
    global $password;
    return strlen($password) >= 6;
}

function successfulLogin(int $userID): void
{
    $_SESSION['loggedUser'] = $userID;
    Router::route('home');
}
