<?php
include 'customerSession.php'; 
if(!isset($login_session)){
  $pdo->null;
  header('Location: ../reserveNow1.php');
}


?>
<?php
include '../connection/connection.php';

$stmt = $pdo->query("SELECT id FROM tbl_customers WHERE username = '$login_session' ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $customer_id = $row['id'];
  }
echo "<script>console.log('id is: ".$customer_id." ')</script>";

$total_cart = $pdo->query("SELECT count(*) FROM tbl_reserve WHERE customer_id = '$customer_id' ")->fetchColumn();
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/services.css">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Welcome to Anary: <?php echo $login_session; ?></a>
          <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav">
              <li class="active" role="presentation"><a href="reserveNow.html">Reserve Now</a></li>
              <li role="presentation"><a href="reserveForm.html">About </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">&nbsp<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="partnerProfile.php">My Profile</a></li>
                <li><a href="customerCart.php">My Cart (<?php echo $total_cart;  ?>)</a></li>
                <li><a href="customerLogout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
      </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <form>
        <div class="row">
          <div class="col-lg-9 col-md-9 col-sm-8">
            <div class="form-group">
              <select class="form-control" id="sel1">
                <option>Select</option>
                <option>Clowns</option>
                <option>Cakes</option>
                <option>Chairs</option>
                <option>Clowns</option>
              </select> <!-- naka database dapat -->
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-4 ">
            <input type="submit" class="btn btn-warning btn-block" name="" value="Search">
          </div>
        </div>
      </form>   
  </div>
</div><!-- row -->
<br>

<div class="row">
  <div class="col-lg-10 col-lg-offset-1 col-md-8 col-md-offset-2">
    <div class="well">
       <?php
          include "../connection/connection.php";
          $stmt = $pdo->query("SELECT * FROM tbl_products");

          ?>
          
          <div class="row"> 
          
          <?php
          // output data of each row
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   
              
            ?>
              <div class="col-lg-3">
              <div class="well">
              <img data-toggle="modal" data-target="#<?php echo $row["id"]; ?>" src="<?php echo $row['product_image'] ?>" class="img-responsive"><br><br><br>
              <button class="btn btn-warning btn-block btn-sm" data-toggle="modal" data-target="#<?php echo $row["id"]; ?>">Buy</button>
              </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="<?php echo $row["id"]; ?>" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><b><?php echo $row['product_name'] ?></b></h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-lg-6">
                          <img src="<?php echo $row['product_image'] ?>" class="img-responsive">
                        </div>
                        <div class="col-lg-6">
                          Price: <b><?php echo $row['price'] ?></b><br><br>
                          Type: <b><?php echo $row['type'] ?></b><br><br>

                          <div class="row">
                            <div class="col-lg-6">
                           <?php  echo "<a href='customer_viewPartner.php?id=".$row['partner_id']."' class=\"btn btn-default\">View Business</a></div>" ?>
                            <div class="col-lg-6">
                              <form action="addToCart.php" method="POST">
                                 <input type="hidden" value="<?php echo $row['product_name']; ?>" name="product_name">
                                <input type="submit" name="add_to_cart" class="btn btn-success" value="Add to cart">
                              </form>
                            </div>
                          </div>                   
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>
            <?php
          }
          ?>
          </div>
          
          <?php

          $pdo = null;
        ?>
  </div>
  </div>
  </div>
</div> <!-- parent_container -->



<!-- Modal for login -->
<div class="modal fade" id="myModalSignUp" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <ul class="nav nav-tabs">
          <li><a data-toggle="tab" href="#loginMenu">Login</a></li>
          <li class="active"><a data-toggle="tab" href="#signUpMenu">Sign Up</a></li>
        </ul>
      </div>
      <div class="modal-body">
        <div class="tab-content">
          <div id="loginMenu" class="tab-pane fade">
             <form role="form" action="customer/customerLogin.php" method="POST">
                <fieldset>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Username" name="email" type="text" autofocus>
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Password" name="password" type="password" value="">
                  </div>
                  <br>
                  <!-- Change this to a button or input when using this as a form -->
                  <input type="submit" name="" class="btn btn-md btn-success btn-block" value="Login">
                </fieldset>
            </form>
          </div>
          <div id="signUpMenu" class="tab-pane fade in active">
            <form role="form" action="customer/customerRegister.php" method="POST">
              <fieldset>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Firstname" name="fname" type="text" autofocus>
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Lastname" name="lname" type="text" value="">
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Email" name="email" type="text">
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Username" name="username" type="text">
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Password" name="password" type="password">
                  </div>
                  <br>
                  <!-- Change this to a button or input when using this as a form -->
                  <input type="submit" class="btn btn-md btn-success btn-block" value="Register">
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>

<!-- Modal2 for login -->
<div class="modal fade" id="myModalLogin" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#loginMenu1">Login</a></li>
          <li><a data-toggle="tab" href="#signUpMenu1">Sign Up</a></li>
        </ul>
      </div>
      <div class="modal-body">
        

        <div class="tab-content">
          <div id="loginMenu1" class="tab-pane fade in active">
             <form role="form" action="customer/customerLogin.php" method="POST">
                <fieldset>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Username" name="username" type="text" autofocus>
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Password" name="password" type="password" value="">
                  </div>
                  <br>
                  <!-- Change this to a button or input when using this as a form -->
                  <input type="submit" class="btn btn-md btn-success btn-block" value="Loign">
                </fieldset>
            </form>
          </div>
          <div id="signUpMenu1" class="tab-pane fade">
            <form role="form" action="customer/customerRegister.php" method="POST">
              <fieldset>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Firstname" name="fname" type="text" autofocus>
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Lastname" name="lname" type="text" value="">
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Email" name="email" type="text">
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Username" name="username" type="text">
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Enter Password" name="password" type="password">
                  </div>
                  <br>
                  <!-- Change this to a button or input when using this as a form -->
                  <input type="submit" name="" class="btn btn-md btn-success btn-block" value="Register">
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


<script>
function cart() {
    console.log("Hello world!");
}
</script>
</body>
</html>