<?php

    include 'head.php';
?>

</head>
<body>
    <div id="wrapper" style="background-color: #424242;height: 700px;">
    <?php
        include 'nav.php';
    ?>

    <
    <div id="page-wrapper" style="background-color: #E0E0E0;height: 610px;">
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    Admin Setting
                </div>
            </div>
        </div>
        <hr class="hrcss">
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <b>Change Admin Password</b>
                            <form action="changepass.php" method="POST">
                                <div class="form-group">
                                  <label>Old Password:</label>
                                  <input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">
                                </div>
                                <div class="form-group">
                                  <label>New Password:</label>
                                  <input type="password" name="new_password" class="form-control" placeholder="Please Enter your new Password">
                                </div>
                                <div class="form-group">
                                  <label>Repeat Password:</label>
                                  <input type="password" name="repeat_password" class="form-control" placeholder="Please repeat your new Password">
                                </div>
                                <input type="submit" class="btn btn-info" name="changepassword">
                            </form>
                        </div>
                    </div>
                </div>
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