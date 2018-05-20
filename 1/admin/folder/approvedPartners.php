<?php

    include 'head.php';
?>

</head>
<body>
    <div id="wrapper" style="background-color: #424242;">
    <?php
        include 'nav.php';
    ?>


<div id="page-wrapper" style="background-color: #E0E0E0">


    <div class="row">
        <div class="col-lg-12">
            <h2>Approved Partners</h2>
        </div>  
    </div>
     <div class="row">
        <div class="col-lg-12">
            <div class="well">
                <a href="pendingPartners.php">Pending </a> <i class="fa fa-angle-double-right"></i> <a href="approvedPartners.php"> Approved </a>
            </div>
        </div>
    </div>

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Partner Basic Information
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Business Name</th>                            
                                    <th>Address</th>
                                    <th>Contact Num</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            include '../connection/connection.php';
                            
                            $stmt = $pdo->query("SELECT * FROM tbl_partner WHERE approve = 1 ");
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo "<tr class gradeX><td>".$row['business_name'];                                             
                                echo "</td><td>".$row['city_address'];
                                echo "</td><td>".$row['contact_num'];
                                echo "</td><td>".$row['business_email'];
                                echo "</td><td><center><a href='evaluate_lawyer.php?id=".$row['id']."' class='btn btn-danger btn-sm'>Remove</a></center>";
                                echo "</td></td>";
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