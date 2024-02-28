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
    <link rel="stylesheet" href="views/css/home.style.css">
    <script type="module" src="views/js/home.js"></script>
</head>
<body style="height: 100vh">
<nav class="navbar navbar-light bg-light d-flex align-items-center p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            Guicher
        </a>

        <div class="d-flex justify-content-end align-items-center">
            <div class="d-flex align-items-center gap-3">
                <input placeholder="Search..." class="border border-0 search-input p-1 rounded closed">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <?php
                if (isset($_SESSION['loggedUser']) and $_SESSION['loggedUser'] != 0){
                    echo'<a class="fa-solid fa-user btn" href="profile"></a>';
                }else{
                    echo '
            <a type="button" class="btn btn-outline-warning mx-3" href="login">login</a>
            <a type="button" class="btn btn-outline-warning mx-3" href="signup">Sign Up</a>';
                }
                ?>
            </div>
        </div>
</nav>


<form action="" method="post" class="d-flex  container mt-5 shadow-sm p-3 mb-5 bg-light gap-3 rounded">
    <input class="form-control me-2 m-1" type="date" value='<?=$startDate?>' min="<?=$startDate?>" name="startDate" placeholder="From Date" aria-label="Search" id="fromDate">
    <p class="align-self-center m-0 w-50">End At</p>
    <input class="form-control me-2 m-1" type="date" name="endDate" placeholder="From Date" aria-label="Search" id="fromDate">
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
    foreach (getEvents() as $event){
        $isActive = true;
    if ($event['DISPONIBLE'] == 0) $isActive = false;
        echo "<event-card id=".$event["ID_VERSION"]." img=".$event['IMAGE']." title=".'"'.$event['TITRE'].'"'. "active=".$isActive." category=".$event['CATEGORIE']." endTime=".'"'.$event['DATE'].'"'."></event-card>";
    }
    ?>

</section>

<footer class="p-5 bg-dark mt-4"></footer>

</body>
</html>





