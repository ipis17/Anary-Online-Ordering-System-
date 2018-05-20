<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guestPackage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/Hero-Technology.css">
</head>
<?php include('connection/connection.php');?>
<body>
    <br><br><br><br>
        <nav id="navbar" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <p class="navbar-brand navbar-link" href="#"><img src="assets/img/download-144x128.png" width="125"></p>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>

                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation"><a href="index.php">HOME </a></li>
                        <li role="presentation"><a href="gallery.php">GALLERY </a></li>
                        <li role="presentation"><a href="#">STORE</a></li>
                        <li role="presentation"><a href="#contact">CONTACT US</a></li>
                        <li role="presentation"><a href="partner/partner.php">LOGIN AS PARTNER</a></li>
                    </ul>
                </div>
                
            </div>
        </nav>
    

<div style="padding-left: 18%;padding-right: 18%;">
 
     <ul class="nav nav-pills categories">
                <li>
                    <a href="storehome.php">
                        <i class="fa fa-home   fa-fw"></i>
                    </a>
                </li>
                <li>
                    <a href="guestService.php">
                        <i class="fa fa-suitcase   fa-fw"></i> Services
                    </a>
                </li>
                 <li>
                    <a href="guestProduct.php">
                        <i class="fa fa-gift   fa-fw"></i> Products
                    </a>
                </li>
                 <li class="active">
                    <a href="#">
                        <i class="fa fa-dropbox   fa-fw"></i> Packages
                    </a>
                </li>
                
          <li class=" navbar-right" type="button"><a href="" data-toggle="modal" data-target="#myModalLogin"> Login </a></li>
            </ul>
</div>   


<div>

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="row">
          <form action="guestPackage.php" method="POST">
            <div class="col-lg-5 col-lg-offset-2">
              <div class="form-group">
                 <input type="text" name="select_location" value="" class="form-control" placeholder="Search Location">
              </div>
            </div>
          <div class="col-lg-3 col-md-3 col-sm-4 ">
            <input type="submit" class="btn btn-info btn-block" name="" value="Search">
          </div>
          </form> 
        </div>
        
  </div>
</div><!-- row -->

<div class="row">
  <div class="col-lg-10 col-lg-offset-1 col-md-8 col-md-offset-2">
    <div class="well">
          <div class="row"> 

          <?php
          include "connection/connection.php";
          if(isset($_POST['select_location'])){
            $select_location = $_POST['select_location'];
            echo "<script>console.log('you select: ".$select_location." ')</script>";
          // $stmt = $pdo->query("SELECT * FROM tbl_products where category = 'services'");
          
          $stmt = $pdo->query("
          SELECT tbl_products.product_image as productImage, tbl_products.id as ID, tbl_products.product_name as productName, tbl_products.price as productPrice, tbl_products.type as productType, tbl_products.product_details as productDetails, tbl_products.partner_id as partnerID
          FROM tbl_products
          LEFT JOIN tbl_partner
          ON tbl_products.partner_id = tbl_partner.id
          WHERE tbl_partner.approve = 1 and category = 'package' AND tbl_partner.city_address LIKE '%$select_location%'

          ");
          ?>
            
          
          <?php
          // output data of each row
          while($row_location = $stmt->fetch(PDO::FETCH_ASSOC)){   
              
            ?>
              <div class="col-lg-3">
              <div class="well">
              <img style="width: 100%;height: 150px;" data-toggle="modal" data-target="#<?php echo $row_location["ID"]; ?>" src="partner/product_image/<?php echo $row_location['productImage'] ?>" class="img-responsive">
              <center>
              <b><?php echo $row_location['productName'] ?></b><br>
               </center> 
              </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="<?php echo $row_location["ID"]; ?>" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><b><?php echo $row_location['productName'] ?></b></h4>
                    </div>
                    <div class="modal-body">
                      <div class="row_location">
                        <div class="col-lg-6">
                          <img style="width: 100%;height: 250px;"  src="partner/product_image/<?php echo $row_location['productImage'] ?>" class="img-responsive">
                        </div>
                        <div class="col-lg-6">
                          Price: <b><?php echo $row_location['productPrice'] ?></b><br><br>
                          Type: <b><?php echo $row_location['productType'] ?></b><br><br>
                          
                          Details:
                         <p><?php echo $row_location['productDetails'] ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      
                    </div>
                  </div>
                  
                </div>
              </div>
            <?php
          }
        }else {
          
          $stmt = $pdo->query("
          SELECT tbl_products.product_image as productImage, tbl_products.id as ID, tbl_products.product_name as productName, tbl_products.price as productPrice, tbl_products.type as productType, tbl_products.product_details as productDetails, tbl_products.partner_id as partnerID
          FROM tbl_products
          LEFT JOIN tbl_partner
          ON tbl_products.partner_id = tbl_partner.id
          WHERE tbl_partner.approve = 1 and category = 'package' 
          ");
          
            
          
          
          // output data of each row
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   
              
            ?>
              <div class="col-lg-3">
              <div class="well">
              <img style="width: 100%;height: 150px;" data-toggle="modal" data-target="#<?php echo $row["ID"]; ?>" src="partner/product_image/<?php echo $row['productImage'] ?>" class="img-responsive">
              <center>
              <b><?php echo $row['productName'] ?></b><br>
               </center> 
              </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="<?php echo $row["ID"]; ?>" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><b><?php echo $row['productName'] ?></b></h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-lg-6">
                          <img style="width: 100%;height: 250px;"  src="partner/product_image/<?php echo $row['productImage'] ?>" class="img-responsive">
                        </div>
                        <div class="col-lg-6">
                          Price: <b><?php echo $row['productPrice'] ?></b><br><br>
                          Type: <b><?php echo $row['productType'] ?></b><br><br>
                          
                          Details:
                         <p><?php echo $row['productDetails'] ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      
                    </div>
                  </div>
                  
                </div>
              </div>
            <?php
          }
        
          


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




<!-- Modal2 for login -->
<div class="modal fade" id="myModalLogin" role="dialog">
  <div class="modal-dialog">
  <br><br><br>
    <!-- Modal content-->
    <div class="modal-content" style="width: 80%;margin: auto;">
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
                  <input type="submit" class="btn btn-md btn-info btn-block" value="Login">
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
                  <input type="submit" name="" class="btn btn-md btn-info btn-block" value="Register">
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>


</div>
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
                        echo "<script> alert('Message Sent'); window.location.href='guestPackage.php#contact'; </script> ";

                     } else {
                       echo "<script> console.log('error'); </script> ";
                     }
  }
    ?>
   
      <footer id="contact">

        <div class="row">
            <div class="col-md-4 col-sm-6 footer-navigation">
                <h3><a href="#contact"><span>Anary </span></a></h3>
                <p class="company-name">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                If you have any questions, comments or concerns about our products and
                services, please don't hesitate to contact us. We ensure that we 
                will make your Occasion an enjoyable and pleasant experience.</p>
            </div>
            <div class="col-md-4 col-sm-6 footer-contacts">
                <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                    <p>#9 B. Morada St, Lipa City, Bats.<br>Philippines 4200</p>
                </div>
                <div><i class="fa fa-phone footer-contacts-icon"></i>
                    <p class="footer-center-info email text-left">+63917 145 2799</p>
                </div>
                <div><i class="fa fa-envelope footer-contacts-icon"></i>
                    <p><a href="#contact"><span>anary@gmail.com</span></a></p>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-4 footer-about">
               
                <div data-form-alert="true">
                    <div class="hide" data-form-alert-success="true">Thanks for reaching us! We will give you a response on your Email!</div>
                </div>
                <form action="guestPackage.php" method="POST">
                    
                    <div class="form-group">
                        <input type="email" class="form-control input-sm input-inverse" name="email" required="" placeholder="Your Email" data-form-field="Email">
                    </div>
                    
                    <div class="form-group">
                        <textarea class="form-control input-sm input-inverse" name="message" rows="4" placeholder="Your Message" data-form-field="Message" required></textarea>
                    </div>
                    <div class="mbr-buttons mbr-buttons--right btn-inverse"><input type="submit" class="mbr-buttons__btn btn btn-info" value="CONTACT US"></div>

                             
                </form>
            </div>
        </div>
            </div>
       
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-75px";
  }
  prevScrollpos = currentScrollPos;
}
</script>


</html>