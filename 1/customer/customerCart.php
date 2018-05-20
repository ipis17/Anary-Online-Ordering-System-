<?php 
include 'customerSession.php'; 
if(!isset($login_session)){
  $pdo->null;
  header('Location: ../memberService.php');
}
?>

<?php

include '../connection/connection.php';

$stmt = $pdo->query("SELECT id FROM tbl_customers WHERE username = '$login_session' ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $customer_id = $row['id'];
  }
echo "<script>console.log('id is: ".$customer_id." ')</script>";

$total_cart = $pdo->query("SELECT count(*) FROM tbl_reserve WHERE customer_id = '$customer_id' ")->fetchColumn();
              

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../partner/asset/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../partner/asset/css/sidebar.css">
  
  <style type="text/css">
    body{
      background-color: #424242;
    }
  </style>

</head>
<body>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Welcome: <?php echo $login_session; ?></a>
          <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav">
              <li role="presentation"><a href="reserveNow.html">My Customer</a></li>
              <li role="presentation"><a href="partnerProducts.php">My Products</a></li>
              <li role="presentation"><a href="#">Settings</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">&nbsp<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="partnerProfile.php">My Profile</a></li>
                <li><a href="customerCart.php">My Cart (<?php echo $total_cart;  ?>)</a></li>
                <li><a href="customerLogout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
      </div>
  </div>
</nav>


<div class="container">
  
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="well" id="result">
        <h3 style="margin: 0px;"><b>My Cart</b></h3><br>
        <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>customer_id</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include '../connection/connection.php';
             $stmt = $pdo->query("SELECT * FROM tbl_reserve WHERE customer_id = $customer_id");
             while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['customer_id'];                                             
                echo "</td><td>".$row['product_name'];
                echo "</td><td>".$row['pending'];
                echo "</td><td><center><a href='delete_product.php?id=".$row['id']."' class='btn btn-danger btn-md'>Remove</a></center>";
                echo "</td></td>";
            }
          ?>
        </tbody>
      </table>
      <center><a href="reserveForm.php" class="btn btn-success">Buy</a></center>
    </div><!-- well -->
    </div>
  </div>
</div>




<script src="../vendor/jquery/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables JavaScript -->
<script src="../partner/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../partner/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../partner/vendor/datatables-responsive/dataTables.responsive.js"></script>


</body>
</html>