<?php
session_start();
require_once (__ROOT__.'/helpers/Router.php');
if (isset($_SESSION['loggedUser'])) Router::route('home');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh">
<form class="d-flex flex-column p-5 rounded shadow-lg gap-3" action="./controller/signupController.php" method="post">
    <p class="form-label align-self-center fw-bold"> Enjoy Our Platform :)</p>
    <input class="form-control" type="text" placeholder="Your Name" name="firstName">
    <input class="form-control" type="text" placeholder="Last Name" name="lastName">
    <input class="form-control" type="email" placeholder="Email Or User Name" name="email">
    <input class="form-control" type="text" placeholder="Password" name="password">
    <input class="align-self-center btn btn-warning" type="submit" value="Register" name="register">
    <p class="form-text align-self-center">You Have Account? <a class="link" href="login">Login!</a></p>
</form>
</body>
</html>
