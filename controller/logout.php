<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__.'/helpers/Router.php');
session_start();
unset($_SESSION['loggedUser']);
Router::route('home');
