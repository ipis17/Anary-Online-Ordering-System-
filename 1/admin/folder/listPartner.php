<?php include 'head.php'; ?>

</head>
<body>
    <div id="wrapper" style="background-color: #424242;">
   <?php

        include 'nav.php';
   ?>

<div id="page-wrapper" style="background-color: #E0E0E0">
            
        <div class="row">
            <div class="col-lg-12">
                <h2>List of  Partners</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="well">
                    <a href="pendingPartners.php">Pending </a> / <a href="approvedPartners.php"> Approved </a>
                </div>
            </div>
        </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Clients Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>                                    
                                        <th>FirstName</th>
                                        <th>Lastname</th>
                                        <th>Username</th>
                                        <th>email</th>
                                        <th>password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "dblaw";

                                        // Create connection
                                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                                        // Check connection
                                        if (!$conn) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }else{
                                            echo "<script>console.log('connected');</script>";
                                        }

                                        $sql = "SELECT * FROM tbl_lawyer";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr class gradeX><td>".$row['firstname'];
                                                echo "</td><td>".$row['lastname'];
                                                echo "</td><td>".$row['username'];
                                                echo "</td><td>".$row['email'];
                                                echo "</td><td>".$row['password'];
                                                echo "</td><td><center><a hre='edit.php?id=' class='btn btn-info'>Edit</a></center>";
                                                echo "</td></td>";
                                            }
                                        }

                                    ?>
                                 </tbody>
                            </table>
                    </div>
        </div>
    </div>
</div>
</div>
</div>
        <!-- /#page-wrapper -->

       


    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>
</html>