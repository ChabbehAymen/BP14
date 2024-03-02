<?php require './controller/profileController.php'; ?>
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
    <script src="./views/js/profile.js" defer></script>
</head>
<?php $user = getUserById() ?>
<body class="" style="height: 100vh">
<nav class="navbar navbar-light bg-light d-flex align-items-center p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/BP14/">
            <i class="fa fa-home"></i>
            Guicher
        </a>
    </div>
</nav>
<main style="height: 100vh" class="d-flex align-items-center justify-content-center">
    <form class="d-flex flex-column p-5 rounded shadow-lg gap-3 w-1/2" method="post"
          action="./controller/profileController.php">
        <i class="fa fa-user align-self-center d-flex gap-2"><p class="not-italic font-serif"><?= $user['EMAIL'] ?></p>
        </i>

        <label class="d-flex align-items-center">
            <input class="form-control bg-transparent border-0" disabled type="text" value='<?= $user['NOM'] ?>'
                   name="firstName">
            <input class="form-control bg-transparent border-0" disabled type="text" value='<?= $user['PRENOM'] ?>'
                   name="lastName">
            <i class="fa fa-pen name-edit-pen"></i>
        </label>
        <label class="d-flex gap-3 align-items-center">
            <input class="form-control bg-transparent border-0" disabled type="password"
                   value=<?= $user['PASSWORD'] ?> name="password">
            <i class="fa fa-eye show-hide-icon"></i>
            <i class="fa fa-pen password-edit-pen"></i>
        </label>
        <input class="align-self-center btn btn-warning" disabled type="submit" value="UPDATE" name="update">
    </form>
</main>
</body>
</html>
