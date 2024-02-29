<?php

function printNavBar($withSearchBar): void
{
    $searchBar = $withSearchBar ? '
                <input placeholder="Search..." class="border border-0 search-input p-1 rounded closed">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>' : '';
    $userControl = isset($_SESSION['loggedUser']) and $_SESSION['loggedUser'] != 0 ? $userControl =
        '<div class="dropdown">
  <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-user"></i>
  </button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><a class="dropdown-item active" href="profile">Account</a></li>
    <li><a class="dropdown-item" href="#">Bought</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Log out</a></li>
  </ul>
</div>' : $userControl =
        '
            <a type="button" class="btn btn-outline-warning mx-3" href="login">login</a>
            <a type="button" class="btn btn-outline-warning mx-3" href="signup">Sign Up</a>';
    echo ' <nav class="navbar navbar-light bg-light d-flex align-items-center p-3 pe-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="/BP14/">
            Guicher
        </a>

        <div class="d-flex justify-content-end align-items-center">
            <div class="d-flex align-items-center gap-3">
            ' . $searchBar.$userControl . '
            </div>
        </div>
</nav>';
}
