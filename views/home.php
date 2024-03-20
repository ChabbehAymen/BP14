<?php
require './controller/homeController.php';
session_start();
global $startDate;
global $endDate;
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
    <link rel="stylesheet" href="views/css/home.style.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="views/js/home.js"></script>
</head>
<body style="height: 100vh">
<?php require './views/php_components/navBar.php'; printNavBar(true)?>

<form action="" method="post" class="d-flex  container mt-5 shadow-sm p-3 mb-5 bg-light gap-3 rounded">
    <input class="form-control me-2 m-1 start-date" type="date" min="<?=$startDate?>" name="startDate" placeholder="From Date" aria-label="Search" id="fromDate">
    <p class="align-self-center m-0 w-50">End At</p>
    <input class="form-control me-2 m-1 end-date" type="date" name="endDate" placeholder="From Date" aria-label="Search" id="fromDate" disabled>
    <div>

    </div>
    <select class="form-select form-select-sm m-1" aria-label=".
                form-select-sm example" name="category">
        <option value="all" selected>All Categories</option>
        <?php
        foreach (getCategories() as $_category){
            echo '<option value='.$_category["CATEGORIE"].'>'.$_category["CATEGORIE"].'</option>';
        }
        ?>
    </select>

    <input class="btn btn-warning p-1 m-1" type="submit" value="filter" onclick="this.form.submit()">
    <select class="form-select form-select-sm m-1 active-select" aria-label="form-select-sm example" name="availability">
        <option value="all" selected>All</option>
        <option value="open">Only Available</option>
        <option value="close">Guichet fermé</option>
    </select>

</form>

<section class="w-100 d-flex flex-wrap gap-4 ps-4 pe-4" style="height: 100%">
    <?php
    $data = getEvents();
    if (count($data)!==0 or $data!== false) {
        foreach ($data as $event) {
            $isActive = true;
            if ($event['DISPONIBLE'] == 0) $isActive = 0;
            echo "<event-card id=" . $event["ID_VERSION"] . " img=" . $event['IMAGE'] . " title=" . '"' . $event['TITRE'] . '"' . "active=" . $isActive . " category=" . $event['CATEGORIE'] . " endTime=" . '"' . $event['DATE'] . '"' . "></event-card>";
        }
    }else require './views/php_components/noDataFundImg.php';?>
</section>
</body>
</html>





