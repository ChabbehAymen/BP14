<?php
$requestUri = $_SERVER['REQUEST_URI'];
$viewDir = '/views/';
$baseDir = '/BP14/';

switch (strtok($requestUri, '?')){
    case $baseDir:
        require __DIR__.$viewDir.'home.php';
        break;
    case $baseDir.'login':
        require __DIR__.$viewDir.'login.php';
        break;
    case $baseDir.'signup':
        require __DIR__.$viewDir.'signup.php';
        break;
    case $baseDir.'profile':
        require __DIR__.$viewDir.'profile.php';
        break;
    case $baseDir.'event':
        require __DIR__.$viewDir.'event.php';
        break;

}

