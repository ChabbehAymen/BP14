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
<main class="px-24 py-11">
    <div class="d-flex align-items-center justify-between">
        <p class="fw-bold fs-4">Purchased Events</p>
        <div class="py-2 px-3 flex items-center text-sm font-medium leading-none text-gray-600 bg-gray-200 hover:bg-gray-300 cursor-pointer rounded">
            <select aria-label="select" class="focus:text-indigo-600 focus:outline-none bg-transparent ml-1">
                <option class="text-sm text-indigo-800" selected>All Categories</option>
                <option class="text-sm text-indigo-800">Music</option>
            </select>
        </div>
    </div>
    <section class="pt-3">
        <div class="bg-gray-100 py-2 rounded px-4">
            <div class="d-flex align-items-center justify-between">
                <p class="fs-5 fw-bold"> Title</p>
                <p>15/3/2024</p>
                <p class="badge text-bg-primary">Music</p>
                <i class="fa fa-caret-down"></i>
            </div>
            <div class="">
                <p>discreption</p>
                <div>
                    <p>Place 11: Billet Normal</p>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>