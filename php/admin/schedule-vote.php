<?php
include_once("header.html");
?>
<title>Schedule Vote</title>
<link rel="stylesheet" href="../../assets/lib/bootstrap-4.5.2/css/bootstrap.min.css">
<link href="../../assets/css/admin.css" rel="stylesheet" />
<style>
   a[href="schedule-vote.php"]{
       color:#e91d36 ;
    }
</style>
</head>

<body class="sb-nav-fixed">
    <?php
    include_once("nav.php");
    include_once("modals/delete-vote-schedule.html");
    include_once("modals/create-vote-schedule.html");
    include_once("modals/edit-vote-schedule.html");
    // to keep track of current visited page
    $_SESSION['page-link'] =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="clearfix">
                <h1 class="mt-4 float-left" >Schedule Vote</h1>
                <div id="temp"></div>
                <?php
                 global $conn;
                 if ($conn == null) {
                     include_once("../config/connection.php");

                     if (isset($_SESSION['user_name']) && $_SESSION['role'] == "admin" ) 
                     {
                         $stm = $conn->prepare("SELECT * from vote_timing");
                         $stm->execute();
                         $row =  $stm->fetch();
                         if($row <= 0 )
                         {
                             echo '<button type="button" class="btn btn-primary mt-4 float-right" data-toggle="modal" data-target="#createVoteScheduleModal"><i class="fas fa-plus"></i> Create</button> ';
                         }                         
                     } 
                    }
                ?>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Scheduled Vote Details
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%"  cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                  
                                        if (isset($_SESSION['user_name']) && $_SESSION['role'] == "admin" ) 
                                        {
                                            if($row > 0 )
                                            {
                                                echo "<tr class='schedule-vote-row' id='".$row['t_id']."'>";
                                                echo "<td>" . $row['start_date'] . "</td>";
                                                echo "<td>" . $row['end_date'] . "</td>";
                                                echo "<td>" . $row['start_time'] . "</td>";
                                                echo "<td>" . $row['end_time'] . "</td>";
                                                echo "<td> <a class='btn btn-success far fa-edit text-white edit-schedule' data-toggle='modal' data-target='#editVoteScheduleModal' onclick='getExistingValues(this)' style='font-size:13px' id='" . $row['t_id'] . "' ></a> <a style='font-size:13px' class='btn btn-danger fas fa-trash-alt dlt-schedule my-3 text-white' id='" . $row['t_id'] . "' ></a> </td>";
                                                echo "</tr>";
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
    <script src="../../assets/script/image-holder.js"></script>
    <script src="../../ajax/handler.js"></script>
    <script src="../../ajax/controller.js"></script>
    

</body>

</html>