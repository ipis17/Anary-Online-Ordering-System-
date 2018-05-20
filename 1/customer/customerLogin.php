<?php
session_start();
include '../connection/connection.php';

if(isset($_POST['username'])&&isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  if(!empty($username)&&isset($password)){
    $sql_login = "SELECT COUNT(username) AS username FROM tbl_customers WHERE username = :username AND password = :password";
      $stmt = $pdo->prepare($sql_login);
      $stmt->bindValue(':username', $username);
      $stmt->bindValue(':password', $password);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if($row['username'] == 1){
        $_SESSION['login_user1']=$username;
        header('Location: storehome.php');
      }else{
        
        echo "<script> alert('Invalid Username and Password!!'); window.location.href='../guestService.php'; </script> ";

      }

  }else{
    echo "<script> alert('Please Fill all input fields'); window.location.href='../guestService.php'; </script> ";
    
  }
}

?>



<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/reserveForm.css">

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Anary</a>
          <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav">
              <li class="active" role="presentation"><a href="reserveNow.html">Reserve Now</a></li>
              <li role="presentation"><a href="reserveForm.html">About </a></li>
              <li role="presentation"><a href="#">Third Item</a></li>
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
                    <h3 class="panel-title">Please Sign In For Login</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Username" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Password" name="password" type="password" value="">
                            </div>
                            <br>
                            //Change this to a button or input when using this as a form 
                            <a href="index.html" class="btn btn-md btn-success btn-block">Login</a>
                             <a href="customerRegister.html" class="btn btn-md btn-primary btn-block">Register</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


  
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html> -->


