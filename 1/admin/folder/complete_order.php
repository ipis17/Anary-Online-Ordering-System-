<?php

$id = $_GET['id'];


include '../connection/connection.php';

$sql_update = 'UPDATE tbl_reserve SET pending_to_admin = :pending_to_admin WHERE id = :id ';
$stmt = $pdo->prepare($sql_update);
$stmt->execute([
	'pending_to_admin' => 'Completed',
	'id' => $id
	]);

if($stmt->rowCount()) {
echo "<script> alert('Order Completed!'); window.location.href='confirmedOrders.php'; </script> ";
} else {
echo "<script> console.log('error'); </script> ";
}




?>