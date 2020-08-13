<?php
include_once("header.html");
?>
<title>Manage Users</title>
<link rel="stylesheet" href="../../assets/lib/bootstrap-4.5.2/css/bootstrap.min.css">
<link href="../../assets/css/admin.css" rel="stylesheet" />
<style>
    a[href="manage-users.php"] {
        color: #e91d36;
    }
</style>
</head>

<body class="sb-nav-fixed">
    <?php
    include_once("nav.php");
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="clearfix">
                    <h1 class="mt-4 float-left">Manage Users</h1>
                    <button class="btn btn-primary mt-4 float-right" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus"> Create</i></button>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Registered Users
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Profile Picture</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th>Contact Number</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Profile Picture</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th>Contact Number</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    include_once("modals/user-create-modal.php");
                                    include_once("modals/user-edit-modal.php");
                                    include_once("modals/user-delete-modal.html");
                                    global $conn;
                                    if ($conn == null) {
                                        include_once("../config/connection.php");

                                        if (isset($_SESSION['user_name']) && $_SESSION['role'] == "admin") {

                                            $stm = $conn->prepare("Select id, name, email, contact_no, age, profile, imgtype, is_active from users where is_deleted=0");
                                            $stm->execute();

                                            while ($row = $stm->fetch()) {

                                                echo "<tr>";
                                                echo "<td><img src='data:" . $row["imgtype"] . ";base64," . base64_encode($row["profile"]) . "'height='100' width='100'/></td>";
                                                echo "<td>" . $row['name'] . "</td>";
                                                echo "<td>" . $row['email'] . "</td>";
                                                echo "<td>" . $row['age'] . "</td>";
                                                echo "<td>" . $row['contact_no'] . "</td>";
                                                if ($row['is_active']) {
                                                    echo "<td> <a href='user-status.php?status=" . $row['is_active'] . "&uid=" . $row['id'] . "' style='font-size:16px' class='badge badge-pill badge-info text-white' id='" . $row['id'] . "'>Active</a></td>";
                                                } else {
                                                    echo "<td> <a href='user-status.php?status=" . $row['is_active'] . "&uid=" . $row['id'] . "' style='font-size:16px' class='badge badge-pill badge-warning text-white' id='" . $row['id'] . "'>Disable</a></td>";
                                                }
                                                echo "<td> <button class='btn btn-success fas fa-edit' onclick='addValues(this)' data-toggle='modal' data-target='#editModal' style='font-size:13px' id='" . $row['id'] . "'></button> <button style='font-size:13px' class='btn btn-danger fas fa-trash-alt dlt-user' id='" . $row['id'] . "'></button> </td>";
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
</body>

</html>