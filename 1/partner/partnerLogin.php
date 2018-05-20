
<!DOCTYPE html>
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
      </div>
  </div>
</nav>



<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login for Partner</h3>
                </div>
                <div class="panel-body">
                  <?php
                    session_start();
                    include '../connection/connection.php';

                    if(isset($_POST['username'])&&isset($_POST['password'])){
                      $username = $_POST['username'];
                      $password = $_POST['password'];

                      if(!empty($username)&&!empty($password)){
                        $sql_login = "SELECT COUNT(business_username) AS username FROM tbl_partner WHERE business_username = :business_username AND password = :password";
                        $stmt = $pdo->prepare($sql_login);
                        $stmt->bindValue(':business_username', $username);
                        $stmt->bindValue(':password', $password);
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        if($row['username'] == 1){
                          $_SESSION['login_user']=$username;
                          header('Location: partnerProfile.php');
                        }else{
                         // echo "<script> console.log('invalid username and password'); </script> ";
                          echo "<div class='alert alert-danger'><center>Invalid Username and Password!!</center></div> ";
                        }

                      }else{
                        //echo "<script> console.log('Please Fill All input'); </script> ";
                        echo "<div class='alert alert-warning'><center>Please Fill All input!!</center></div> ";
                      }

                    }

                  ?>
                  <form role="form" action="partnerLogin.php" method="POST">
                      <fieldset>
                          <div class="form-group">
                              <input class="form-control" placeholder="Enter Username" name="username" type="text" autofocus>
                          </div>
                          <div class="form-group">
                              <input class="form-control" placeholder="Enter Password" name="password" type="password" value="">
                          </div>
                          <br>
                          <!-- Change this to a button or input when using this as a form -->
                          <input type="submit" class="btn btn-md btn-success btn-block" value="Login">
                           <a href="partnerRegister.php" class="btn btn-md btn-primary btn-block">Register</a>
                      </fieldset>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</body>
</html>