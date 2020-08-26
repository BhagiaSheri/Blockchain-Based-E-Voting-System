<?php
include_once("header.html");
?>

<title>Admin</title>

<link rel="stylesheet" href="../../assets/lib/bootstrap-4.5.2/css/bootstrap.min.css">

<link href="../../assets/css/admin.css" rel="stylesheet" />
<style>
    a[href="admin.php"] {
        color: #e91d36;
    }

    #voting-winners {
        display: none;
    }
</style>

</head>

<body class="sb-nav-fixed">
    <?php
    include_once("nav.php");
    // to keep track of current visited page
    $_SESSION['page-link'] =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">

                <?php
                // results charts html file
                include_once("../../html/charts.html");
                // bar and pic chart file
                include_once("../result-charts/charts.php");

                // Connection to Database 
                global $conn;
                if ($conn == null) {
                    include_once("../config/connection.php");
                }
                ?>

                <!-- Complete Result Table-->
                <div class="card mb-4" id="voting-result">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fas fa-table mr-1"></i>
                            Voting Results
                        </span>
                        <button onclick="showWinners();" id="winner" type="button" class="btn btn-primary"><i class="fa fa-trophy" aria-hidden="true"></i> Show Winners</button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Profile Picture</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Age</th>
                                        <th>Designation</th>
                                        <th>Number of Votes</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Profile Picture</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Age</th>
                                        <th>Designation</th>
                                        <th>Number of Votes</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['user_name']) && $_SESSION['role'] == "admin") {

                                        $stm = $conn->prepare("SELECT c_id, name, email, contact_no, age, designation, no_of_votes, profile, imgtype from candidates WHERE is_deleted=0");
                                        $stm->execute();

                                        while ($row = $stm->fetch()) {

                                            echo "<tr>";
                                            echo "<td><img src='data:" . $row["imgtype"] . ";base64," . base64_encode($row["profile"]) . "'height='100' width='100'/></td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['contact_no'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['designation'] . "</td>";
                                            echo "<td>" . $row['no_of_votes'] . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Show Winners Table-->
                <?php
                include_once("winners.php");
                ?>

                <!-- Voting Result Script -->
                <script src="../../assets/script/result-script.js"></script>
            </div>
        </main>
    </div>

</body>
<?php
include_once("footer-script.html");
?>

</html>