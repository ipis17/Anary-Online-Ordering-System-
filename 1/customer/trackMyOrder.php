<?php
include 'customerSession.php'; 
if(!isset($login_session)){
  $pdo->null;
  header('Location: ../reserveNow1.php');
}
?>
<?php
include '../connection/connection.php';

$stmt = $pdo->query("SELECT id FROM tbl_customers WHERE username = '$login_session' ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $customer_id = $row['id'];

  }
echo "<script>console.log('id is: ".$customer_id." ')</script>";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../partner/asset/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../partner/asset/css/reserveForm.css">
  <link rel="stylesheet" type="text/css" href="../partner/asset/css/editor.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/user.css">

</head>
<body> 
  <br><br><br><br>
<nav id="navbar" class="navbar  navbar-fixed-top">
            
                <div>
                    <ul class="nav navbar-nav ">
                        <li role="presentation"><a href="memberService.php">Back</a></li>
                        <li role="presentation"><a href="add_receipt.php">Add Reciept</a></li>
                    </ul>
                </div>
        </nav>

<div class="container">
  <div class="row">
    <br><br><br>
   <div class="col-lg-10 col-lg-offset-1">
    

   	  <div class="well">
   	  	<div class="row">
   	  		<form action="trackMyOrder.php" method="POST">
   	  		<div class="col-lg-6">
  				<div class="form-group">
  					<input type="text" name="search_order" class="form-control" placeholder="Enter OrderNumber Here..">

  				</div>
   	  		</div>
   	  		<div class="col-lg-3">
   	  			<input type="submit" value="Track" class="btn btn-info">
   	  		</div>
          
   	  		</form>
   	  	</div>
        <table width="100%" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Date Order</th>                            
                    <th>Image</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>reserve date</th>
                </tr>
            </thead>
            <tbody>
            <?php

            include '../connection/connection.php';

            if(isset($_POST['search_order'])){
              $search_order = $_POST['search_order'];





              $stmt = $pdo->query("SELECT tbl_reserve.created_at as dateorder, tbl_products.product_name as product, tbl_products.product_image as image,tbl_products.price as price, tbl_reserve.reserve_date as reservedate from tbl_reserve LEFT JOIN tbl_products on tbl_reserve.product_id = tbl_products.id where tbl_reserve.order_number LIKE '%$search_order%' ");

              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr class gradeX><td>".$row['dateorder'];  
                echo "</td><td><img src='../partner/product_image/".$row['image']."' width='90' height='70'>";
                echo "</td><td>".$row['product'];
                echo "</td><td>".$row['price'];
                echo "</td><td>".$row['reservedate'];
                // echo "</td><td><center><a href='evaluate_lawyer.php?id=".$row['id']."' class='btn btn-danger btn-sm'>Remove</a></center>";
                echo "</td></tr>";
                }
              }         
          ?>
           </tbody>
        </table>
   	  </div> 
   </div>
  </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../partner/asset/js/editor.js" type="text/javascript"></script>

</body>
</html>