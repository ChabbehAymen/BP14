<?php
require 'controller/homePageController.php';
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
    <script type="module" src="views/js/home.script.js"></script>
</head>
<body>
<nav class="navbar navbar-light bg-light d-flex align-items-center p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <!--            <img src="../config/assets/G.png" alt="" width="100" height="24">-->
            Guicher
        </a>

        <div class="d-flex justify-content-end align-items-center">
            <div class="d-flex align-items-center gap-3">
                <input placeholder="Search..." class="border border-0 search-input p-1">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <button type="button" class="btn btn-outline-warning mx-3" onclick="location.href='login.php'">login
            </button>
            <button type="button" class="btn btn-outline-warning mx-3" onclick="location.href='signup.php'">Sign Up
            </button>
        </div>
</nav>


<div class="d-flex  container mt-5 shadow-sm p-3 mb-5 bg-light rounded">
    <input class="form-control me-2 m-1" type="date" placeholder="From Date" aria-label="Search" id="fromDate">
    <!--    <img src="../config/Assets/hand.png" alt="" width="100px" height="30px" class="m-1">-->
    <p>To</p>

    <input class="form-control me-2 m-1" type="date" placeholder="From Date" aria-label="Search" id="fromDate">
    <div>

    </div>
    <select class="form-select form-select-sm m-1" aria-label=".
                form-select-sm example" name="category">
        <option selected>Event</option>
        <option>ALL</option>
        <option>Only Available</option>
    </select>
    <select class="form-select form-select-sm m-1" aria-label=".
                form-select-sm example" name="category">
        <option selected>Category</option>
        <option>Theatre</option>
        <option>Comedy</option>
        <option>Music</option>
    </select>

</div>

<section>
    <template id="event-card-temp">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
              crossorigin="anonymous">
        <div class="card" style="width: 18rem;">
            <img src="views/assets/AlNU3WTK_400x400.jpg" class="card-img-top" alt="...">
            <a href="#" class="btn btn-dark p-1 disabled m-1 align-self-start category-label">Music</a>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Card title</h5>
                <p class="card-text d-flex gap-2 align-items-center"><i class="fa-regular fa-clock"></i>20:40:00</p>
                <a href="#" class="btn btn-warning align-self-end">Detail</a>
            </div>
        </div>
    </template>

    <?php
    foreach (getEvents() as $event){
        echo "<event-card img=".$event['IMAGE']." title=".'"'.$event['TITRE'].'"'."category=".$event['CATEGORIE']." endTime=".'"'.$event['DATE'].'"'."></event-card>";
    }
    ?>

</section>


</body>
</html>





<event-card img="rock-concert.jpg" title="Concert de Rock" category="Music" endtime="2023-03-01 20:00:00"></event-card>