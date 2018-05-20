<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../partner/asset/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../partner/asset/css/reserveForm.css">
  <link rel="stylesheet" type="text/css" href="../partner/asset/css/editor.css">
</head>

<body>

<div class="container">
  <div class="row">
    <br><br>

    <div class="col-lg-4 ">
               
    </div>
    <div class="col-lg-6" style="color: #fff;">
       
<br><br><br>

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

<?php

include '../admin/connection/connection.php';
function getGUIDnoHash(){
    mt_srand((double)microtime()*10000);
    $charid = md5(uniqid(rand(), true));
    $c = unpack("C*",$charid);
    $c = implode("",$c);

    return substr($c,0,10);
}
// get the unique number
$rand = getGUIDnoHash();

  $sql_select = "SELECT COUNT(order_number) as order_rand FROM tbl_reserve WHERE order_number = :rand";
  $stmt = $pdo->prepare($sql_select);
  $stmt->bindValue(':rand', $rand );
  $stmt->execute();

  $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
  // check if the random number is already exists in the database
  while($row1['order_rand'] > 0){
      getGUIDnoHash();
  }


$flname =  $_POST['flname'];
$address = $_POST['address'];
$phoneNum =$_POST['phoneNum'];
$date =   $_POST['date'];
$request = $_POST['request'];
// session_start();
$total_presyo = $_SESSION['reserve_price'];
$down_payment =$_SESSION['reserve_down'];
echo '<h1>Were processing your order now!</h1>';
echo '<h3>Your Order Number: &nbsp;'.$rand.' </h3>';
echo '<h3>Fullname: '.$flname.'<br>'. 'Adress: '.$address.'<br>'.'Phone Number: '.$phoneNum.'<br>'.'Date of Reservation: '.$date.'<br>'.'Request:'.$request.'<br>Total Price: '.$total_presyo.'<br>DownPayment: '.$down_payment.'</h3>';
echo '<p><i>You need to pay the downpayment 3 days after this request before the admin approve your request</i></p>';
echo "<br><a href='storehome.php'>Back!</a>";

$sql_reserve = 'UPDATE tbl_reserve SET phone_num = :phone_num, address = :address, reserve_date = :reserve_date, message = :message, order_number = :order_number, pending_to_cart = :pending_to_cart  WHERE pending_to_admin = :pending_to_admin AND customer_id = :customer_id AND order_number = 0 ';
    $stmt = $pdo->prepare($sql_reserve);
    $stmt->execute([

      'phone_num' => $phoneNum, 
      'address' => $address,
      'reserve_date' => $date,
      'message' => $request,
      'order_number' => $rand,
      'pending_to_cart' => 1,
      'pending_to_admin' => 'Pending Order',
      'customer_id' => $customer_id
    ]);

   if($stmt->rowCount()) {
      echo "<script> alert('Successfully Order'); </script> ";
   } else {
     echo "<script> console.log('error'); </script> ";
   }



?>
    </div>
    <div class="col-lg-4 ">
       
    </div>

  </div>
</div>






</body>
</html>
