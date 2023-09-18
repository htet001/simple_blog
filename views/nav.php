<?php

include_once "sysgem/Mysession.php";
include_once "sysgem/DB_hacker.php";
?>
<!-- navigation start -->
<div class="container-fluid bg-primary">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand text-white english" href="simple_blog.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav" style="margin-left: auto;">
                <li class="nav-item">
                    <a class="nav-link text-white english" href="simple_blog.php">NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white english" href="filterpost.php?sid=1">Politic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white english" href="filterpost.php?sid=2">Wars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white english" href="filterpost.php?sid=3">IT News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white english" href="filterpost.php?sid=4">Social</a>
                </li>




                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        if (checkSession("username")) {
                            echo getSession("username");
                        } else {
                            echo "Member";
                        }
                        ?>
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        if (checkSession("username")) {
                            echo "<a class='dropdown-item' href='logout.php'>Logout</a>";
                        } else {
                            echo "<a class='dropdown-item' href='register.php'>Register</a>";
                            echo "<a class='dropdown-item' href='login.php'>Login</a>";
                        }
                        ?>
                    </ul>
                </div>


        </div>
        </ul>

</div>
</nav>
</div>
<!-- navigation end -->