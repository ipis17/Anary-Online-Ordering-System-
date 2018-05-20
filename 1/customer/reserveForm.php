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

</head>
<body>


<div class="container">
  <div class="row">
    <br><br><br>


    <div class="col-lg-6 col-md-6 col-sm-6" style="color: #fff;">
       <h4>Terms and Condition:</h4>
            <p>You need to pay 20% of the total amount 3 days after your request before the admin approve your order. </p>
            <p>You need to pay 100% 1 week before the event.</p>
            <p>Down payment will not be refundable or transferable</p>
            <p>You will notify by the admin through phone call when your order is approved.</p>


                <br><br><br><br><br><br><br>
                <center><p>You can pay at the following..</p>
             <img src="img/remittance_grande.jpg"> </center> 
                
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        
        <div class="panel-body" style="background-color: #616161">
          <form action="getTracking.php" method="POST"> 
            <div class="form-group">
              <input type="text" class="form-control" name="flname" placeholder="Enter Full Name" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="address" placeholder="Enter Address" required="">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" name="phoneNum" placeholder="Enter Phone Number" required="">
            </div>
            <div class="form-group">
              <input type="date" class="form-control" name="date" placeholder="Enter Date" style="font-size: 16px;height: 43px;" required="">
            </div>
            <div class="form-group">
              <label>Special Request</label>
              <textarea class="form-control" name="request" placeholder="Enter Message"></textarea>
            </div>

            <div class="form-group">
              <?php  
                $total_presyo = $_SESSION['total_presyo'];
                echo "<script>console.log('id is: ".$total_presyo." ')</script>";
                echo '<label> Price is: '.$total_presyo.'</label><br>';
                $down_payment = $total_presyo * .20;
                echo '<label> Your down payment is: '.$down_payment.'<label>';
                $_SESSION['reserve_price'] = $total_presyo;
                $_SESSION['reserve_down'] = $down_payment;

              ?>
            </div>

           <p style="color:white;"><input type="checkbox" name="agreement" value="terms" required=""> &nbsp;By clicking this button, You agreed to our terms and condition.</p><br>
            <input type="submit" class="btn btn-primary hero-button" name="" value="Reserve!">

            <a class="btn btn-success" role="button" href="memberService.php">Back</a>
            
          </form>
        </div>
      
    </div>
  </div>
</div>
<?php

//generate unique number using current date


// session_start();

if(isset($_SESSION['flname'])&&isset($_SESSION['address'])&&isset($_SESSION['phoneNum'])&&isset($_SESSION['date'])&&isset($_SESSION['request'])){
    //fullname
    $_SESSION['flname']=$flname;
    $_SESSION['address']=$address;
    $_SESSION['phoneNum']=$phoneNum;
    $_SESSION['date']=$date;
    $_SESSION['request']=$request;


//     $sql_reserve = 'UPDATE tbl_reserve SET phone_num = :phone_num, address = :address, reserve_date = :reserve_date, message = :message, order_number = :order_number, pending_to_cart = :pending_to_cart  WHERE pending_to_admin = :pending_to_admin AND customer_id = :customer_id AND order_number = 0 ';
//     $stmt = $pdo->prepare($sql_reserve);
//     $stmt->execute([

//       'phone_num' => $phoneNum, 
//       'address' => $address,
//       'reserve_date' => $date,
//       'message' => $request,
//       'order_number' => $rand,
//       'pending_to_cart' => 1,
//       'pending_to_admin' => 'Pending Order',
//       'customer_id' => $customer_id
//     ]);

//    if($stmt->rowCount()) {
//       echo "<script> alert('Successfully Order'); </script> ";
//    } else {
//      echo "<script> console.log('error'); </script> ";
//    }


// }
}

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../partner/asset/js/editor.js" type="text/javascript"></script>

</body>
</html>