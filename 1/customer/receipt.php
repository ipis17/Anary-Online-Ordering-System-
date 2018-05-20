<?php

include '../connection/connection.php';

if(isset($_POST['add_receipt'])){
  $track_order = $_POST['track_order'];
  $image = $_FILES['image']['name'];
  $target = "receipt_image/".basename($image);

  $sql_add_reciept = "UPDATE tbl_reserve SET receipt_image = :receipt_image WHERE order_number = :order_number";
  $stmt = $pdo->prepare($sql_add_reciept);

  $stmt->execute([
    'receipt_image' => $image,
    'order_number' => $track_order
  ]);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
     echo "<script> alert('Successfully Added Receipt!'); window.location.href='add_receipt.php'; </script> ";
  }else{
   echo "<script> console.log('error'); </script> ";
  }

}


?>