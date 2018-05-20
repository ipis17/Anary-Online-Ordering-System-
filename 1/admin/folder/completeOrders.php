<?php

    include 'head.php';
?>
<script type="text/javascript" src="add.js"></script>

</head>
<body>
<div id="wrapper" style="background-color: #424242;">
    <?php include 'nav.php';?>

<div id="page-wrapper" style="background-color: #E0E0E0;">
            <div class="row">
                 <!--<div class="col-lg-12">
                    <h2 class="page-header">Dashboard</h2>
                </div>
                /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <br>
          <div class="row">
        <div class="col-lg-12">
            <h2>List of Orders</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="well">
                <a href="pendingOrders.php">New Orders</a> <i class="fa fa-angle-double-right"></i> <a href="confirmedOrders.php"> Confirmed Orders </a><i class="fa fa-angle-double-right"></i> <a href="completeOrders.php"> Complete Orders </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Customer Order Information
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                 
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>                                                         
                                <th>First Name</th>
                                <th>Partner Name</th>
                                <th>Product Name</th> 
                                <th>Phone number</th>
                                <th>Order Number</th>
                                <th>Reserve Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                include '../connection/connection.php';
                              
                                $stmt = $pdo->query("
                                    SELECT tbl_reserve.id as ID, tbl_customers.firstname as fname, tbl_partner.business_name as partnerName, tbl_customers.lastname lname, tbl_products.product_name productName, tbl_reserve.phone_num as phoneNum, tbl_reserve.order_number as orderNumber, reserve_date as reserveDate1 
                                        FROM tbl_reserve 
                                        LEFT JOIN tbl_customers 
                                        ON tbl_customers.id=tbl_reserve.customer_id 
                                        LEFT JOIN tbl_products 
                                        ON tbl_products.id = tbl_reserve.product_id 
                                        LEFT JOIN tbl_partner 
                                        ON tbl_partner.id = tbl_reserve.partner_id
                                        WHERE pending_to_admin = 'Completed'
                                        ORDER BY reserve_date ASC
                                    ");
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo "<tr class gradeX><td>".$row['fname'];                                             
                                    echo "</td><td>".$row['partnerName'];
                                    echo "</td><td>".$row['productName'];
                                    echo "</td><td>".$row['phoneNum'];
                                    echo "</td><td>".$row['orderNumber'];
                                    echo "</td><td>".$row['reserveDate1'];
                                    echo "</td></tr>";
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
            responsive: true,
            "pageLength": 5
        });
    });
    </script>

</body>
</html>