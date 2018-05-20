<?php

$id = $_GET['id'];
include '../connection/connection.php';

$sql_delete = 'DELETE FROM tbl_reserve WHERE id = :id';
$stmt = $pdo->prepare($sql_delete);
$stmt->execute(['id' => $id]);

if($stmt->rowCount()) {
   echo "<script> alert('Deleted!'); window.location.href='memberPackage.php'; </script> ";

} else {
 echo "<script> console.log('error'); </script> ";
}


?>