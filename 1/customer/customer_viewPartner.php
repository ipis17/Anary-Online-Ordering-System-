<?php
$id = $_GET['id'];

include '../connection/connection.php';

$sql_partner_profile = "SELECT * FROM tbl_partner WHERE id = :partner_id";
$stmt = $pdo->prepare($sql_partner_profile);
$stmt->bindValue(':partner_id', $id);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $business_name = $row['business_name'];
    $address = $row['address'];
    $contact_num = $row['contact_num'];
    $business_email = $row['business_email'];
}



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/partnerProfile.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/sidebar.css">

</head>
<body>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Welcome: </a>
          <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav">
              <li role="presentation"><a href="customerReserve.php">Reserve Now!</a></li>
              <li role="presentation"><a href="partnerProducts.php">My products</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">&nbsp<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="partnerProfile.php">My Profile</a></li>
                <li><a href="customerCart.php">My Cart</a></li>
                <li><a href="customerLogout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
      </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="well">
        <h3><b>Business Profile</b></h3>
        <hr>
        <form action="partnerProfile.php" method="POST">
          <input type="hidden" value="<?php echo $id ?>" name="partner_id">
          <div class="form-group">
            <label>Business Name:</label>
            <input class="form-control burahin" name="business_name" type="text"  value="<?php echo $business_name ?>" autofocus disabled>
          </div>
          <div class="form-group">
            <label>Business Address:</label>
            <input class="form-control burahin" name="address" type="text" value="<?php echo $address ?>" autofocus disabled>
          </div>
          <div class="form-group">
            <label>Business Contact:</label>
            <input class="form-control burahin" name="contact_num" type="text" value="<?php echo $contact_num ?>" autofocus disabled>
          </div>
          <div class="form-group">
            <label>Business Email:</label>
            <input class="form-control burahin" name="business_email" type="text" value="<?php echo $business_email ?>" autofocus disabled>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="well" style="margin: auto;">
        <h4><b>About Business..</b></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        
      </div><br>
      <div class="well">
        <div class="form-group">
          <textarea class="form-control" id="txtedit" placeholder="What can you say about the their business?"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="">
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>