<?php

$id = $_GET['id'];

$orderNumber = $_GET['orderNum'];

include '../connection/connection.php';

$sql_update = 'UPDATE tbl_reserve SET pending_to_admin = :pending_to_admin WHERE id = :id AND order_number = :order_number ';
$stmt = $pdo->prepare($sql_update);
$stmt->execute([
	'pending_to_admin' => 'Pending',
	'id' => $id,
	'order_number' => $orderNumber
	]);

if($stmt->rowCount()) {
echo "<script> alert('Order Confirmed!'); window.location.href='pendingOrders.php'; </script> ";
} else {
echo "<script> console.log('error'); </script> ";
}




?>