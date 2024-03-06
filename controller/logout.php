<?php
require_once (__ROOT__.'/helpers/Router.php');
session_start();
unset($_SESSION['loggedUser']);
Router::route('home');
