<?php
$id = $_GET['id'];

include '../connection/connection.php';

$stmt = $pdo->query("SELECT * from tbl_partner WHERE id = '$id'");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $id=$row['id'];
      $viewPartnerBusinesName=$row['business_name'];
      $viewPartnerAddress=$row['city_address'];
      $viewPartnerContactNum=$row['contact_num'];
      $viewPartnerEmail=$row['business_email'];
      $viewPartnerPic=$row['images'];
}


?>

<?php

include 'head.php';

?>

</head>
<body>
	<div id="wrapper" style="background-color: #424242;height: 700px;">
    <?php

        include 'nav.php';
    ?>
<div id="page-wrapper" style="background-color: #E0E0E0;height: 600px;">
            <!-- /.row -->
        <div class="row">
            <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <br>
                    
                    <h3>Basic Information</h3>
                  
                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="well">
                       <form action="evaluate_partner.php" method="POST">
                          <input type="hidden" name="admin_id" value="<?php echo $id ?>">
                          
                          <div class="form-group">
                          <label>Business Name:</label> 
                          <?php echo $viewPartnerBusinesName ?>
                          
                          <div class="form-group">
                          <label>Address:</label> 
                          <?php echo $viewPartnerAddress ?>
                         
                          <div class="form-group">
                          <label>Contact Number:</label> 
                          <?php echo $viewPartnerContactNum ?>
                          
                          <div class="form-group">
                          <label>Email:</label> 
                          <?php echo $viewPartnerEmail ?>
                          
                          <div class="form-group">
                          <label><a href="" data-toggle="modal" data-target="#products">View Products</a></label> 
                          
                        </div>
                        </div>
                    </div>
                    
                   
                    
                  </div><!-- tab -->
                  <input type="submit" class="btn btn-success" value="Approve">
                  <a href="pendingPartners.php" class="btn btn-danger">Back</a>
                  </form>
                </div><!-- col-lg-6 -->
                </div><!-- row -->
                <div class="col-md-3"></div>
        </div>
</div>
</div>
        <!-- /#page-wrapper -->

<?php
include '../connection/connection.php';
 
if(isset($_POST['admin_id'])){
   $admin_id = $_POST['admin_id'];

   $approve_query = 'UPDATE tbl_partner SET approve = :approve_by_admin WHERE `tbl_partner`.`id` = :id';
   $stmt = $pdo->prepare($approve_query);
   $stmt->execute([
    'approve_by_admin' => 1, 
    'id' => $admin_id
  ]);

   if($stmt->rowCount()) {
      echo "<script> window.location = \"approvedPartners.php\"; </script> ";
   } else {
     echo "<script> console.log('error'); </script> ";
   }

}


?>

       


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


<!-- Modal for mycart -->
<div class="modal fade" id="products" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><b>View Products</b></h4>
                    </div>
      <div class="modal-body">
        

      
          <div>
            <div class="well"> 
       
        <table class="table  table-hover">
        <thead>
          <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th> 
          </tr>
        </thead>
        <tbody>
          <?php
            include '../connection/connection.php';
          //  SELECT * FROM tbl_reserve WHERE customer_id = $customer_id
            //, tbl_products.product_name as productName, tbl_reserve.price as productPrice
             $stmt = $pdo->query("
                 SELECT tbl_products.product_image as productImage, tbl_products.product_name as productName, tbl_products.price as productPrice 
                 FROM tbl_products
                 WHERE partner_id = '$id' order by productName asc
              ");
             while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td><img src='../../partner/product_image/".$row['productImage']."' width='70' height='70'>";      
                echo "</td><td>".$row['productName'];
                echo "</td><td>".$row['productPrice'];
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