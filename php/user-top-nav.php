<?php
session_start();
if (!(isset($_SESSION['role'])) && $_SESSION['role'] != 'user') {
    header("location:../../index.php");
} else
    $name = $_SESSION["user_name"];
?>
<nav class="sb-topnav navbar navbar-expand" id="navbar" style="background-color: #b3aeab;">
    <a class="navbar-brand" href="#" style="margin:0px;"><img src="../assets/images/logo-vo-blok.png" width="150" style="margin:0px;"></a>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <li class="nav-item">
            <a href="election-statistics.php" class="btn btn-primary"><i class="fa fa-bar-chart" aria-hidden="true"></i> Election Statistics</a>
        </li>

        <!-- for logged in user in navbar -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#"><?php echo $name ?></a>
                <a class="dropdown-item user" href="#" id="editProfile">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item user" id="log-me-out" href="#">Logout</a>
            </div>
        </li>
    </ul>
</nav>