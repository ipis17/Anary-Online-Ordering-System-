<?php
include '../connection/connection.php';

if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])&&isset($_POST['username'])&&isset($_POST['password'])){

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql_reg = "SELECT COUNT(username) AS user FROM tbl_customers WHERE username = :username";
  $stmt = $pdo->prepare($sql_reg);
  $stmt->bindValue(':username', $username);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if($row['user'] > 0){
      echo "<script>alert('Username Already Exist')</script>";
  }else{
    $sql_register = 'INSERT INTO tbl_customers(firstname, lastname, email, username, password) VALUES(:firstname, :lastname, :email, :username, :password)';
    $stmt = $pdo->prepare($sql_register);
    $stmt->execute([
      'firstname' => $fname,
      'lastname' => $lname,
      'email' => $email,
      'username' => $username,
      'password' => $password
    ]);

    if($stmt->rowCount()) {
        echo "<script> alert('Successfully Register!');window.location.href='../guestService.php'; </script> ";
     } else {
       echo "<script> console.log('error'); </script> ";
     }
  }
}

?>

<!--<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/reserveForm.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/editor.css">

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Anary</a>
          <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav">
              <li class="active" role="presentation"><a href="../reserveNow.php">Reserve Now</a></li>
              <li role="presentation"><a href="../reserveForm.php">About </a></li>
              <li role="presentation"><a href="">Login as Partner</a></li>
          </ul>
          <a href="cart.html" class="btn btn-default navbar-btn navbar-right" type="button">My Cart </a>
      </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Register</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Firstname" name="email" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Lastname" name="password" type="text" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Phone Number" name="email" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Email" name="password" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Username" name="password" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Password" name="password" type="password">
                            </div>
                            <br>
                             Change this to a button or input when using this as a form 
                            <a href="index.html" class="btn btn-md btn-success btn-block">Register</a>
                             <a href="customerLogin.html" class="btn btn-md btn-danger btn-block">Back</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="asset/js/editor.js" type="text/javascript"></script>

<script>
  $('#txtedit').Editor();
</script>
</body>
</html> -->

