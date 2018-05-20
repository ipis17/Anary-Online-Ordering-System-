<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guestService</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/Hero-Technology.css">
</head>

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
                
                 <li class="active">
                    <a href="">
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
                 <li>
                    <a href="guestPackage.php">
                        <i class="fa fa-dropbox   fa-fw"></i> Packages
                    </a>
                </li>

                 <li class=" navbar-right" type="button"><a href="" data-toggle="modal" data-target="#myModalLogin"> Login </a></li>
                
                   </ul>
</div>   


<div>

<div class="container">
  <div class="row">
    <div>
     <center>
       <img class="img-thumbnail" src="assets/img/photography_background2.jpg">
       </center> 
  
</div><!-- row -->
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
                        echo "<script> alert('Message Sent'); window.location.href='guestService.php#contact'; </script> ";

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
                <form action="guestService.php" method="POST">
                    
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