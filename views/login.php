<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/helpers/Router.php');
require_once(__ROOT__ . '/helpers/Reporter.php');
session_start();
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="navbar navbar-light bg-light d-flex align-items-center p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/BP14/">
            <i class="fa fa-home"></i>
            Guicher
        </a>
    </div>
</nav>
<main class="d-flex align-items-center justify-content-center" style="height: 88vh">
    <form class="d-flex flex-column p-5 rounded shadow-lg gap-3" method="post" action="./controller/loginController.php">
        <p class="form-label align-self-center fw-bold"> Welcome Back</p>
        <input class="form-control" type="email" placeholder="Email Or User Name" name="email">
        <input class="form-control" type="text" placeholder="Password" name="password">
        <?php if (Reporter::getReport() === Reporter::$NO_ACCOUNT_FOUND): ?>
            <p class="form-text align-self-center text-red-600"><i class="fa fa-info">&nbsp;</i>No Account found With This
                Email</p>
        <?php elseif (Reporter::getReport() === Reporter::$INCORRECT_PASSWORD): ?>
            <p class="form-text align-self-center text-red-600"><i class="fa fa-info">&nbsp;</i>Incorrect Password</p>
        <?php
        endif;
        Reporter::dropReport(); ?>
        <input class="align-self-center btn btn-warning" type="submit" value="Login" name="login">
        <p class="form-text">Don't Have Account? <a class="link" href="signup">Register Know !</a></p>
    </form>
</main>

</body>
</html>
