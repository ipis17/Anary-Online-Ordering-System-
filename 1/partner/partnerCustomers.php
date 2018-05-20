<?php 
include 'session.php'; 
if(!isset($login_session)){
  $pdo->null;
  header('Location: partner.php');
}

?>
<?php

include '../admin/connection/connection.php';

$sql_profile = "SELECT * FROM tbl_partner WHERE business_username = :login_session";
$stmt = $pdo->prepare($sql_profile);
$stmt->bindValue(':login_session', $login_session);
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $partner_id = $row['id'];
}

echo "<script>console.log('id is: ".$partner_id." ')</script>";


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="asset/css/partnerProfile.css">
  <link rel="stylesheet" type="text/css" href="asset/css/sidebar.css">

</head>
<body>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
       <div class="navbar-header">
                   
                  <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>

                </div>
      <div class="collapse navbar-collapse" id="navcol-1" style="padding-left: 7%; padding-right: 8%;">
          <ul class="nav navbar-nav">
              <li role="presentation"><a href="partnerProfile.php">My Business</a></li>
              <li role="presentation"><a href="partnerProducts.php">My products</a></li>
              <li role="presentation" class="active"><a href="partnerCustomers.php">My Customers</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $login_session; ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="partnerSettings.php">Settings</a></li>
                <li><a href="partnerlogout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
      </div>
  </div>
</nav>


<div class="container">
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="well">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Reserve Date</th>
                    <th>Message</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php

            include '../connection/connection.php';
            
            $stmt = $pdo->query("
                SELECT tbl_customers.firstname as fname, tbl_customers.lastname as lname, tbl_products.product_name as productName, tbl_reserve.qty as QTY, tbl_reserve.phone_num as phoneNum, tbl_reserve.address as adress, tbl_reserve.reserve_date as reserveDate, tbl_reserve.message as message,tbl_reserve.pending_to_admin as status
                    FROM tbl_reserve
                    LEFT JOIN tbl_customers
                    ON tbl_customers.id = tbl_reserve.customer_id
                    LEFT JOIN tbl_products
                    ON tbl_products.id = tbl_reserve.product_id
                    WHERE tbl_reserve.partner_id = '$partner_id' AND tbl_reserve.pending_to_admin in ('Completed',  'Pending')
              ");


            while($row1 = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr class gradeX><td>".$row1['fname'].' '.$row1['lname'];
                echo "</td><td>".$row1['productName'];
                echo "</td><td>".$row1['QTY'];
                echo "</td><td>".$row1['phoneNum'];
                echo "</td><td>".$row1['adress'];
                echo "</td><td>".$row1['reserveDate'];
                echo "</td><td>".$row1['message'];
                echo "</td><td>".$row1['status'];
                echo "</td></td>";
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

</body>
</html>