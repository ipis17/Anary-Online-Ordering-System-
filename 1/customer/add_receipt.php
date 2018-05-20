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
                        
                    </ul>
                </div>
        </nav>

<div class="container">
  <div class="row">
    <br><br><br>
   <div class="col-lg-10 col-lg-offset-1">
    
   	  <div class="well">
   	  	<div class="row">

          <div class="col-lg-5">
            <form action="receipt.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">

                <input type="text" name="track_order" class="form-control" placeholder="Enter OrderNumber Here..">
              </div>
              <div class="form-group">
                <label style="color: black;">Enter Your Reciept here</label>
                <input type="file" name="image">
              </div>
              <div class="form-group"> 
                <input type="submit" class="btn btn-success" name="add_receipt">
              </div>
            </form>
          </div>
   	  	</div>
   	  </div> 
   </div>
  </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../partner/asset/js/editor.js" type="text/javascript"></script>

</body>
</html>
