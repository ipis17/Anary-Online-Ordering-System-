<?php
include 'session.php'; 
if(!isset($login_session)){
  $pdo->null;
  header('Location: ../reserveNow1.php');
}

?>
<?php
include '../connection/connection.php';

$stmt = $pdo->query("SELECT id FROM tbl_partner WHERE business_username = '$login_session' ");
while($row1 = $stmt->fetch(PDO::FETCH_ASSOC)){
      $partner_id = $row1['id'];

  }
echo "<script>console.log('id is: ".$partner_id." ')</script>";

?>

<?php

include '../connection/connection.php';


if(isset($_POST['changeUsername'])){

	$new_username = $_POST['new_username'];
	$password = $_POST['password'];

	$sql_change = "SELECT COUNT(business_username) AS user FROM tbl_partner WHERE business_username = :business_username";
	$stmt = $pdo->prepare($sql_change);
	$stmt->bindValue(':business_username', $new_username);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if($row['user'] > 0){
      echo "<script>alert('Username Already Exist'); window.location.href='partnerSettings.php';</script>";
 	}else{

 		$sql_change1 = "SELECT COUNT(password) AS user1 FROM tbl_partner WHERE password = :password AND id = :id";
		$stmt = $pdo->prepare($sql_change1);
		$stmt->bindValue(':password', $password);
		$stmt->bindValue(':id', $partner_id);
		$stmt->execute();

		$row2 = $stmt->fetch(PDO::FETCH_ASSOC);

 	  	if($row2['user1'] > 0){

 	  	  $sql = 'UPDATE tbl_partner SET business_username = :business_username WHERE id = :id';
		  $stmt = $pdo->prepare($sql);
		  $stmt->execute([
		    'business_username' => $new_username, 
		    'id' => $partner_id
		  ]);

		 if($stmt->rowCount()) {
	        
	        echo "<script> alert('Username Successfully Updated!');window.location.href='partnerSettings.php'; </script> ";
	     } else {
	        echo "<script> alert('There is an error'); </script> ";
	     }
	      
	 	}
 	}

}


if(isset($_POST['changePassword'])){
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$repeat_password = $_POST['repeat_password'];

	if($new_password != $repeat_password){
		echo "<script> alert('new and old password did not match');window.location.href='partnerSettings.php'; </script> ";
	}else{
		$sql = 'UPDATE tbl_partner SET password = :password WHERE id = :id';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([
		   'password' => $new_password, 
		   'id' => $partner_id
		]);

		if($stmt->rowCount()) {
	        echo "<script> alert('Password Successfully Updated!');window.location.href='partnerSettings.php'; </script> ";
	     } else {
	        echo "<script> alert('There is an error'); </script> ";
	     }
	}


}





?>
