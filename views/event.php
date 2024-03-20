<?php
require './controller/eventSellsController.php';
require_once(__ROOT__ . '/helpers/Reporter.php');
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./views/css/event.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="views/js/event.js"></script>
</head>
<body>
<?php
require './views/php_components/navBar.php';
printNavBar(false);
?>

<?php if (Reporter::getReport() === Reporter::$PURCHASE_SUCCEEDED ):?>
    <div class="absolute w-min items-center justify-center bg-gray-100 purchasing-successful" style="top: 30%; left: 40%">
        <div class="rounded-lg bg-gray-50 px-16 py-14">
            <div class="flex justify-center">
                <div class="rounded-full bg-green-200 p-6">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-500 p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                </div>
            </div>
            <h3 class="my-4 text-center text-3xl font-semibold text-gray-700">Enjoy Our Events!!!</h3>
            <p class="w-[230px] text-center font-normal text-gray-600">Your order have been taken and is being attended to</p>
            <button class="mx-auto mt-10 block rounded-xl border-4 border-transparent bg-orange-400 px-6 py-3 text-center text-base font-medium text-orange-100 outline-8 hover:outline hover:duration-300 dismiss-btn">Dismiss</button>
        </div>
    </div>
    <script>document.querySelector('body').style.overflow = 'hidden';</script>
    <?php elseif (Reporter::getReport()=== Reporter::$PURCHASE_FIELD):?>
        <div class="absolute w-min items-center justify-center bg-gray-100 purchasing-successful" style="top: 30%; left: 40%">
        <div class="rounded-lg bg-gray-50 px-16 py-14">
            <div class="flex justify-center">
                <div class="rounded-full bg-red-200 p-6">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-red-500 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>
                    </div>
                </div>
            </div>
            <h3 class="my-4 text-center text-3xl font-semibold text-gray-700">Enjoy Our Events!!!</h3>
            <p class="w-[230px] text-center font-normal text-gray-600">Your order have been taken and is being attended to</p>
            <button class="mx-auto mt-10 block rounded-xl border-4 border-transparent bg-orange-400 px-6 py-3 text-center text-base font-medium text-orange-100 outline-8 hover:outline hover:duration-300 dismiss-btn">Dismiss</button>
        </div>
    </div>
    <?php elseif (Reporter::getReport()===Reporter::$NO_CONNECTED_USER):?>
    <?php Reporter::dropReport();endif;?>

<?php if (empty($_GET['id']) or empty(getEventDetail($_GET['id'])) ): require './views/php_components/noDataFundImg.php';?>
<?php else:?>
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
<?php endif;?>

<footer class="p-5 bg-dark mt-4"></footer>

</body>
</html>







