<?php
include 'customerSession.php'; 
include '../connection/connection.php';

$sql_profile = "SELECT id FROM tbl_customers WHERE username = :login_session";
$stmt = $pdo->prepare($sql_profile);
$stmt->bindValue(':login_session', $login_session);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $customer_id = $row['id'];
}

if(isset($_POST['add_to_cart'])){
  $product_id = $_POST['product_id'];
  $partner_id = $_POST['partner_id'];
  $qty = $_POST['qty'];

  $sql = 'INSERT INTO tbl_reserve(customer_id, product_id, partner_id, qty, pending_to_admin) VALUES(:customer_id, :product_id, :partner_id, :qty, :pending_to_admin)';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
  	'customer_id' => $customer_id, 
  	'product_id' => $product_id, 
    'partner_id' => $partner_id,
    'qty' => $qty,
  	'pending_to_admin' => 'Pending Order'
  ]);
}
if($stmt->rowCount()) {
   echo "<script> alert('Added to cart!'); window.location.href='memberService.php'; </script> ";
 } else {
   echo "<script> console.log('error'); </script> ";
 }
?>