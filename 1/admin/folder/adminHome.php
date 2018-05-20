<?php

    include 'head.php';
?>
<script type="text/javascript" src="add.js"></script>

</head>
<body>
<div id="wrapper" style="background-color: #424242;height: 700px;">
    <?php include 'nav.php';?>

<div id="page-wrapper" style="background-color: #E0E0E0;height: 640px;">
            <div class="row">
                 <!--<div class="col-lg-12">
                    <h2 class="page-header">Dashboard</h2>
                </div>
                /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <br>
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-plus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                        include '../connection/connection.php';
                                        /*
                                        $query = "SELECT count(*) FROM tbl_lawyer";
                                        $result = mysqli_query($conn, $query);
                                        $row1 = mysqli_fetch_array($result);
                                        $total1 = $row1[0];
                                        echo $total1;   
                                        */
                                        $total = $pdo->query("SELECT count(*) FROM tbl_partner  WHERE approve = 0")->fetchColumn();
                                        echo $total;                

                                        ?>
                                    </div>
                                    <div>New Partners!</div>
                                </div>
                            </div>
                        </div>
                        <a href="pendingPartners.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                                            
                                        $total = $pdo->query("SELECT count(*) FROM tbl_partner WHERE approve = 1")->fetchColumn();
                                        echo $total;                


                                        ?>
                                    </div>
                                    <div>Approve Partners</div>
                                </div>
                            </div>
                        </div>
                        <a href="approvedPartners.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                       
                                        $total = $pdo->query("SELECT count(*) FROM tbl_customers")->fetchColumn();
                                        echo $total;    
                                        ?>
                                    </div>
                                    <div>Customers</div>
                                </div>
                            </div>
                        </div>
                        <a href="listCustomer.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-lg-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cart-plus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                      
                                        
                                        $total = $pdo->query("SELECT count(*) FROM tbl_reserve WHERE pending_to_admin = 0")->fetchColumn();
                                        echo $total;                

                                        ?>
                                    </div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="pendingOrders.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cart-arrow-down fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                      
                                        
                                        $total = $pdo->query("SELECT count(*) FROM tbl_reserve WHERE pending_to_admin = 1")->fetchColumn();
                                        echo $total;                

                                        ?>
                                    </div>
                                    <div>Confirmed Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="confirmedOrders.php">
                            <div class="panel-footer" style="color:green;">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                  <div class="col-md-3">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                                            
                                        $total = $pdo->query("SELECT count(*) FROM tbl_message")->fetchColumn();
                                        echo $total;                


                                        ?>
                                    </div>
                                    <div>Message</div>
                                </div>
                            </div>
                        </div>
                        <a href="message.php">
                            <div class="panel-footer" style="color:#990000;">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
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