<?php 
include_once("header.html");
?>
<<<<<<< HEAD
<title>Manage Users</title>
<link rel="stylesheet" href="../../assets/lib/bootstrap-4.5.2/css/bootstrap.min.css">
<link href="../../assets/css/admin.css" rel="stylesheet" />
<style>
    a[href="manage-users.php"]{
        color: #e91d36;
    }
</style>
=======
        <title>Manage Users</title>
        <link rel="stylesheet" href="../../assets/lib/bootstrap-4.5.2/css/bootstrap.min.css">
        <link href="../../assets/css/admin.css" rel="stylesheet" />
>>>>>>> 4481ef52f891f9f00248dc0e130a8ea99e58f229
</head>

<body class="sb-nav-fixed">
<?php 
  include_once("nav.php");
?>
<div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Manage Users</h1>
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
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Profile Picture</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Contact Number</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    
                                        


<?php
        
  

    global $conn;
    if($conn==null){
    include_once("../config/connection.php");

    if(isset($_SESSION['user_name'])){

    $stm=$conn->prepare("Select name, email, contact_no, age, profile, imgtype from users");
    $stm->execute();

        while($row=$stm->fetch()){

            echo "<tr>";
            echo "<td><img src='data:".$row["imgtype"].";base64,".base64_encode($row["profile"])."'height='100' width='100'/></td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['age']."</td>";
            echo "<td>".$row['contact_no']."</td>";
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