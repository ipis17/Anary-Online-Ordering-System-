<?php include 'head.php' ?>

</head>
<body>
    <div id="wrapper" style="background-color: #424242;">
    <?php
        include 'nav.php';
    ?>

<div id="page-wrapper" style="background-color: #E0E0E0;">
            
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Message</h2>
            </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Inbox
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>                                    
                                        <th>Email</th>                  
                                        <th>Message</th>
                                        
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    include '../connection/connection.php';
                                    $stmt = $pdo->query("SELECT * FROM tbl_message order by id desc");
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo "<tr class gradeX><td>".$row['email'];                                    
                                    echo "</td><td>".$row['message'];
                                    
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
            responsive: true
        });
    });
    </script>

</body>
</html>