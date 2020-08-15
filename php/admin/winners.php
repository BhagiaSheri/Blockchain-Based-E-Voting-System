<!-- Show Winners -->
<div class="card mb-4" id="voting-winners">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>
            <i class="fas fa-table mr-1"></i>
            Winners
        </span>
        <button onclick="showResult();" id="result" type="button" class="btn btn-primary"><i class="fa fa-trophy" aria-hidden="true"></i> Voting Results</button>
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

                        $stm1 = $conn->prepare("SELECT c_id, name, email, contact_no, age, designation, MAX(no_of_votes) AS votes, profile, imgtype from candidates WHERE is_deleted=0 GROUP BY designation");
                        $stm1->execute();

                        while ($row = $stm1->fetch()) {

                            echo "<tr>";
                            echo "<td><img src='data:" . $row["imgtype"] . ";base64," . base64_encode($row["profile"]) . "'height='100' width='100'/></td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['contact_no'] . "</td>";
                            echo "<td>" . $row['age'] . "</td>";
                            echo "<td>" . $row['designation'] . "</td>";
                            echo "<td>" . $row['votes'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
