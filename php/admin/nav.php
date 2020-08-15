<?php
session_start();
if (!(isset($_SESSION['role']) ) || $_SESSION['role'] != 'admin') {
    header("location:../../index.php");
}else{
    include_once("modals/edit-admin-profile.html");
}
$name = $_SESSION["user_name"] ;
?>

<nav class="sb-topnav navbar navbar-expand " id="navbar">
    <a class="navbar-brand" href="#" style="margin:0px;"><img src="../../assets/images/logo-vo-blok.png" width="150" style="margin:0px;"></a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

    <!-- Navbar-->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">

        <!-- for logged in user in navbar -->
        <li class="nav-item dropdown" >
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#"><?php echo $name ?></a>
                <a class="dropdown-item" href="#" id="editProfile">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" id="log-me-out" href="#" >Logout</a>
            </div>
        </li>
    </ul>
</nav>

<!-- Side navigation menu -->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion " id="sidenavAccordion" >
            <div class="sb-sidenav-menu">
                <div class="nav"  >
                    <a class="nav-link  " href="admin.php">
                        <div class="sb-nav-link-icon "><i class="fas fa-tachometer-alt"></i></div>
                        Results
                    </a>
                    <a class="nav-link" href="manage-users.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                        Manage Users
                    </a>
                    <a class="nav-link" href="manage-candidates.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Manage Candidates
                    </a>
                    <a class="nav-link" href="schedule-vote.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                        Schedule Vote
                    </a>
                </div>
            </div>

        </nav>
    </div>