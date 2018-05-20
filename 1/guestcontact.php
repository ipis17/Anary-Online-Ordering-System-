<?php
include 'connection/connection.php';

if(isset($_POST['email'])&&isset($_POST['message'])){

  $email = $_POST['email'];
  $message = $_POST['message'];
  

$sql_insert = 'INSERT INTO tbl_message(email, message) VALUES(:email, :message)';
                    $stmt = $pdo->prepare($sql_insert);
                    $stmt->execute([
                      'email' => $email,
                      'message' => $message
                    ]);

                    if($stmt->rowCount()) {
                        echo "<script> alert('Message Sent');</script> ";

                     } else {
                       echo "<script> console.log('error'); </script> ";
                     }
  }
    ?>