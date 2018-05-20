<?php

$id = $_GET['id'];

include '../admin/connection/connection.php';

$sql_delete = "DELETE FROM tbl_products WHERE id = :id";
$stmt = $pdo->prepare($sql_delete);
$stmt->execute(['id' => $id]);

if($stmt->rowCount()) {
    echo "<script> alert('Successfully Deleted!'); window.location.href='partnerProducts.php'; </script> ";
 } else {
   echo "<script> console.log('error'); </script> ";
 }


?>
