<?php 
include 'session.php'; 
if(!isset($login_session)){
  $pdo->null;
  header('Location: partner.php');
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="asset/css/partnerProfile.css">
  <link rel="stylesheet" type="text/css" href="asset/css/sidebar.css">

</head>
<body>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
       <div class="navbar-header">
                   
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>

                </div>
      <div class="collapse navbar-collapse" id="navcol-1"  style="padding-left: 7%; padding-right: 8%;">
          <ul class="nav navbar-nav">
              <li role="presentation"><a href="partnerProfile.php">My Business</a></li>
              <li role="presentation"><a href="partnerProducts.php">My products</a></li>
              <li role="presentation"><a href="partnerCustomers.php">My Customers</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $login_session; ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="partnerSettings.php">Settings</a></li>
                <li><a href="partnerlogout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
      </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="well">
        <h3>Change Account Settings</h3>
        <hr>
        <h4>Change Username</h4>
        <form action="changeSettings.php" method="POST">
          <div class="form-group">
            <input type="text" name="new_username" class="form-control" placeholder="Enter new Username">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Please Enter your Password">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-success" name="changeUsername" value="Submit">
          </div>
        </form>
        <hr>
      </div>
    </div><!-- row -->

    <div class="col-lg-6">
      <div class="well">
        <h3>Change Account Settings</h3>
        <hr>
        <h4>Change Password</h4>
        <form action="changeSettings.php" method="POST">
          <div class="form-group">
            <input type="password" name="old_password" class="form-control" placeholder="Enter Old Password">
          </div>
          <div class="form-group">
            <input type="password" name="new_password" class="form-control" placeholder="Please Enter your new Password">
          </div>
          <div class="form-group">
            <input type="password" name="repeat_password" class="form-control" placeholder="Please repeat your new Password">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-success" name="changePassword" value="Submit">
          </div>
        </form>
        <hr>
      </div>
    </div><!-- row -->
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>
</html>