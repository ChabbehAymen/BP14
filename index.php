<?php
$requestUri = $_SERVER['REQUEST_URI'];
$viewDir = '/views/';
// defining envrment variables
$GLOBALS['dbLink'] = 'mysql:host=localhost;dbname=BP14;charset=UTF8';

switch ($requestUri){
    case '/BP14/':
        require __DIR__.$viewDir.'home.php';
        break;
    case '/BP14/login':
        require __DIR__.$viewDir.'login.php';
        break;
    case '/BP14/signup':
        require __DIR__.$viewDir.'signup.php';
        break;
}

