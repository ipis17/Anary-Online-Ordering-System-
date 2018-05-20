
<?php
include '../connection/connection.php';

$stmt = $pdo->query("SELECT * FROM tbl_admin");
?>

<?php

include '../connection/connection.php';


if(isset($_POST['changepassword'])){
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$repeat_password = $_POST['repeat_password'];

	if($new_password != $repeat_password){
		echo "<script> alert('new and old password did not match');window.location.href='adminSettings.php'; </script> ";
	}else{
		$sql = 'UPDATE tbl_admin SET password = :password';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([
		   'password' => $new_password
		]);

		if($stmt->rowCount()) {
	        echo "<script> alert('Password Successfully Updated!');window.location.href='adminSettings.php'; </script> ";
	     } else {
	        echo "<script> alert('There is an error'); </script> ";
	     }
	}


}





?>
