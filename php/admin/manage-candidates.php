<?php
include_once("header.html");
?>
<title>Manage Candidates</title>
<link rel="stylesheet" href="../../assets/lib/bootstrap-4.5.2/css/bootstrap.min.css">
<link href="../../assets/css/admin.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <?php
    include_once("nav.php");
    include_once("modals/create-candidate.html");
    include_once("modals/delete-candidate.html");
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="clearfix">
                <h1 class="mt-4 float-left" >Manage Candidates</h1>
                <button type="button" class="btn btn-primary mt-4 float-right" data-toggle="modal" data-target="#createCandidateModal"><i class="fas fa-plus"></i> Create</button>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Registered Candidates
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
                                        <th>Actions</th>
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
                                        <th>Actions</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    global $conn;
                                    if ($conn == null) {
                                        include_once("../config/connection.php");

                                        if (isset($_SESSION['user_name']) && $_SESSION['role'] == "admin") {

                                            $stm = $conn->prepare("SELECT * from CANDIDATES where is_deleted =0");
                                            $stm->execute();

                                            while ($row = $stm->fetch()) {

                                                echo "<tr>";
                                                echo "<td><img src='data:" . $row["imgtype"] . ";base64," . base64_encode($row["profile"]) . "'height='100' width='100'/></td>";
                                                echo "<td>" . $row['name'] . "</td>";
                                                echo "<td>" . $row['email'] . "</td>";
                                                echo "<td>" . $row['contact_no'] . "</td>";
                                                echo "<td>" . $row['age'] . "</td>";
                                                echo "<td>" . $row['designation'] . "</td>";
                                                echo "<td> <a class='btn btn-success far fa-edit edit-candidate' style='font-size:13px' id='".$row['c_id']."' ></a> <a style='font-size:13px' class='btn btn-danger fas fa-trash-alt dlt-candidate my-3' id='".$row['c_id']."' ></a> </td>";
                                                echo "</tr>";
                                            }
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php
    include_once("footer-script.html");
    ?>
    <script src="../../ajax/handler.js"></script>
    <script src="../../ajax/controller.js"></script>

</body>

</html>