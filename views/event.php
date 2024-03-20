<?php
require './controller/eventSellsController.php';
require_once(__ROOT__ . '/helpers/Reporter.php');
require './views/php_components/errorPopupMessage.php';
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./views/css/event.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="views/js/event.js"></script>
</head>
<body>
<?php
require './views/php_components/navBar.php';
printNavBar(false);
?>

<?php if (Reporter::getReport() === Reporter::$PURCHASE_SUCCEEDED) showPopUpMessage();
     elseif (Reporter::getReport() === Reporter::$PURCHASE_FIELD) showPopUpMessage(1);
     elseif (Reporter::getReport() === Reporter::$NO_CONNECTED_USER) showPopUpMessage(2);
Reporter::dropReport(); ?>

<?php if (empty($_GET['id']) or empty(getEventDetail($_GET['id']))): require './views/php_components/noDataFundImg.php'; ?>
<?php else: ?>
    <main class="w-100 p-5">
        <?php
        $event = getEventDetail($_GET['id'])[0];
        echo '<h1 class="w-100 text-center fs-1 fw-bold font-monospace">' . $event['TITRE'] . '</h1>';
        ?>
        <div class="p-5 d-flex w-100 gap-5 flex-wrap">
            <img class="rounded" style="height: 60vh" src="./views/assets/AlNU3WTK_400x400.jpg">
            <div class="w-50">
                <div class="d-flex align-items-center">
                    <p class="fs-3 fw-bold m-2 mb-3">Description</p>
                    <i class="badge text-bg-primary">Music</i>
                </div>
                <p><?php echo $event['DESCRIPTION'] ?></p>
                <form action="./controller/eventSellsController.php?id=<?php echo $_GET["id"] ?>" method="post"
                      class="d-flex flex-column gap-3 form">
                    <label for="">
                        Tarif Normal:<?php echo $event['TARIF_NORMAL'] ?>
                        <input type="number" class="form-control w-100" value="0" min="0" name="tarifNormal">
                    </label>
                    <label for="">
                        Tarif Reduit:<?php echo $event['TARIF_REDUIT'] ?>
                        <input type="number" class="form-control w-100" value="0" min="0" name="tarifReduit">
                    </label>
                    <?php

                    if ($event["DISPONIBLE"] != 0) {
                        echo '<input type="submit" value="J’achète" name="byTicket" class="btn btn-warning align-self-center">
                    </div>
                    </div>';
                    } else {
                        echo '<input type="submit" value="Guichet fermé" name="byTicked" class="btn btn-dark align-self-center disabled"> </div>
                    </div>';
                    }
                    ?>
                </form>
            </div>
        </div>

        <section class="w-full my-44">
            <div class="w-fit mx-auto d-flex flex-column align-items-center">
                <span class="fs-2 fw-semibold">Time Is Going</span>
                <div class="d-flex gap-3 fs-4 fw-semibold  clock-count-down" id='<?= $event['DATE'] ?>'>
                    <i class="days">1j</i><span>:</span>
                    <i class="hours">1h</i><span>:</span>
                    <i class="mints">1m</i><span>:</span>
                    <i class="seconds">1s</i>
                </div>
            </div>
        </section>

        <p class="fs-3 fw-bold">Other Events</p>
        <section class="w-100 d-flex flex-wrap gap-4 ps-4 pe-4">
            <?php
            foreach (getEvents() as $_event) {
                if ($_event['TITRE'] === $event['TITRE']) continue;
                $isActive = true;
                if ($_event["DISPONIBLE"] == 0) $isActive = false;
                echo "<event-card id=" . $_event["ID_VERSION"] . " img=" . $_event['IMAGE'] . " title=" . '"' . $_event['TITRE'] . '"' . "active=" . $isActive . " category=" . $_event['CATEGORIE'] . " endTime=" . '"' . $_event['DATE'] . '"' . "></event-card>";
            }
            ?>

        </section>

    </main>
<?php endif; ?>
</body>
</html>







