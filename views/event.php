<?php
require './controller/eventSellsController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<nav class="navbar navbar-light bg-light d-flex align-items-center p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            Guicher
        </a>

        <div class="d-flex justify-content-end align-items-center">
            <div class="d-flex align-items-center gap-3">
                <?php
                if (isset($_SESSION['loggedUser']) and $_SESSION['loggedUser'] != 0) {
                    echo '<a class="fa-solid fa-user btn" href="profile"></a>';
                } else {
                    echo '
            <a type="button" class="btn btn-outline-warning mx-3" href="login">login</a>
            <a type="button" class="btn btn-outline-warning mx-3" href="signup">Sign Up</a>';
                }
                ?>
            </div>
        </div>
</nav>

<main class="w-100 p-5">
    <?php
    $event = getEventDetail($_GET['title'])[0];
    echo '<h1 class="w-100 text-center fs-1 fw-bold font-monospace">' . $_GET['title'] . '</h1>';
    ?>
    <div class="p-5 d-flex w-100 gap-5 flex-wrap">
        <img class="rounded" style="height: 60vh" src="./views/assets/AlNU3WTK_400x400.jpg">
        <div class="w-50">
            <div class="d-flex align-items-center">
                <p class="fs-3 fw-bold m-2 mb-3">Description</p>
                <i class="badge text-bg-primary">Music</i>
            </div>
            <p><?php echo $event['DESCRIPTION']?></p>
            <form action="./controller/eventSellsController.php?title=<?php echo $_GET["title"]?>" method="post" class="d-flex flex-column gap-3 form">
                <label for="">
                    Tarif Normal:<?php echo $event['TARIF_NORMAL']?>
                    <input type="number" class="form-control w-100" value="0" min="0" name="tarifReduit">
                </label>
                <label for="">
                    Tarif Reduit:<?php echo $event['TARIF_REDUIT']?>
                    <input type="number" class="form-control w-100" value="0" min="0" name="tarifNormal">
                </label>
                <?php

                if (isTherePlace($event['TITRE'])) {
                    echo '<input type="submit" value="J’achète" name="byTicket" class="btn btn-warning align-self-center">
                    </div>
                    </div>';
                } else {
                    echo '<input type="submit" value="Guichet fermé" name="byTicked" class="btn btn-dark align-self-center">                    </div>
                    </div>';
                }
                ?>
            </form>
        </div>
    </div>

    <p class="fs-3 fw-bold">Other Events</p>
    <section class="w-100 d-flex flex-wrap gap-4 ps-4 pe-4">
        <?php
        foreach (getEvents() as $event) {
            if ($event['TITRE'] === $_GET['title']) continue;
//        echo "<event-card img=".$event['IMAGE']." title=".'"'.$event['TITRE'].'"'."category=".$event['CATEGORIE']." endTime=".'"'.$event['DATE'].'"'."></event-card>";
            echo '<div class="card event-card" style="width: 18rem;">
            <img src="views/assets/AlNU3WTK_400x400.jpg" class="card-img-top" alt="...">
            <a class="badge text-bg-primary text-decoration-none disabled m-1 align-self-start category-label">' . $event['CATEGORIE'] . '</a>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold">' . $event['TITRE'] . '</h5>
                <p class="card-text d-flex gap-2 align-items-center"><i class="fa-regular fa-clock"></i>' . $event['DATE'] . '</p>';
            if (isTherePlace($event['TITRE'])) {
                echo '<a href="event?title=' . $event['TITRE'] . '" class="btn btn-warning align-self-end">J’achète</a>
                    </div>
                    </div>';
            } else {
                echo '<a href="event?title=' . $event['TITRE'] . '" class="btn btn-dark align-self-end">Guichet fermé</a>
                    </div>
                    </div>';
            }
        }
        ?>

    </section>
</main>

<footer class="p-5 bg-dark mt-4"></footer>

</body>
</html>






