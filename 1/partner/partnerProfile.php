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
  $id = $row['id'];
  $business_name = $row['business_name'];
  $address = $row['city_address'];
  $paddress = $row['province_address'];
  $contact_num = $row['contact_num'];
  $business_email = $row['business_email'];
  $approve = $row['approve'];
}


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
              <li role="presentation" class="active"><a href="#">My Business</a></li>
              <li role="presentation"><a href="partnerProducts.php">My products</a></li>
              <li role="presentation"><a href="partnerCustomers.php">My Customers</a></li>
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

<?php

if(isset($_POST['update'])){

  $id1 = $_POST['partner_id'];
  $business_name1 = $_POST['business_name'];
  $address1 = $_POST['address'];
  $paddress = $_POST['paddress'];
  $contact_num1 = $_POST['contact_num'];
  $business_email1 = $_POST['business_email'];

  $sql_update = 'UPDATE tbl_partner SET business_name = :business_name, city_address = :address, province_address = :paddress,contact_num = :contact_num, business_email = :business_email WHERE id = :id';
  $stmt = $pdo->prepare($sql_update);
  $stmt->execute([
    'id' => $id1,
    'business_name' => $business_name1, 
    'address' => $address1,
    'paddress' => $paddress,
    'contact_num' => $contact_num1,
    'business_email' => $business_email1  
  ]);

   if($stmt->rowCount()) {
      //echo "<div class='alert alert-success'><center>Successfully Register!!</center></div> ";
    echo "<script> alert('Your Profile is Successfully Updated! '); </script> ";
    echo "<script> window.location.href=window.location.href </script> ";
    
   } else {
     echo "<script> console.log('you did not update anything'); </script> ";
   }
}




?>

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="well">

        <h3><b><?php if($approve == "1") echo "Official Partner"; else echo "Not Official Partner"; ?></b></h3>
        <hr>
        <form action="partnerProfile.php" method="POST">
          <input type="hidden" value="<?php echo $id ?>" name="partner_id">
          <div class="form-group">
            <label>Business Name:</label>
            <input class="form-control burahin" name="business_name" type="text"  value="<?php echo $business_name ?>" autofocus disabled>
          </div>
          <div class="form-group">
            <label>City Address:</label>
            <input class="form-control burahin" name="address" type="text" value="<?php echo $address ?>" autofocus disabled>
          </div>
           <div class="form-group">
            <label>Province Address:</label>
            <input class="form-control burahin" name="paddress" type="text" value="<?php echo $paddress ?>" autofocus disabled>
          </div>
          <div class="form-group">
            <label>Business Contact:</label>
            <input class="form-control burahin" name="contact_num" type="text" value="<?php echo $contact_num ?>" autofocus disabled>
          </div>
          <div class="form-group">
            <label>Business Email:</label>
            <input class="form-control burahin" name="business_email" type="text" value="<?php echo $business_email ?>" autofocus disabled>
          </div>
          <div class="row">
              <div class="col-xs-12">
                  <div class="text-right">
                      <input type="submit" class="btn btn-primary" name="update" id="ibalik" value="Save">
                      <button type="button" class="btn btn-info" id="clickmo">Edit</button>
                  </div>
              </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-6" style="color:white;">
      <h3>Terms and Condition</h3>
      <p>You need to pay 5,000.00 Php registration fee to Anary before you become an Official partner</p>
      <p>You also need to deposit another 5,000.00 Php for our assurance that you will not decieve customer</p>
      <p>You will get your deposit upon leaving our company without a problem</p>
      <p>After you become an official partner, The customer can view your products.</p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){
  $("#ibalik").hide();
  $("#clickmo").click(function(){
    $(".burahin").prop('disabled', false);
    $("#ibalik").show();
  });

  $("#ibalik").click(function(){
    $(".burahin").prop('disabled', false);
 });
});
</script>

</body>
</html>