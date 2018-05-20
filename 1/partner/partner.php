<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainPage</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/user.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="../assets/css/Hero-Technology.css">
</head>
<style>
span{
    color: #8f9296;
    font-size: 50px;
}

.logo {
    color: #f4511e;
    font-size: 200px;
}
</style>
<body>
    <header1>
        <nav id="navbar" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <p class="navbar-brand navbar-link" href="#"><img src="../assets/img/download-144x128.png" width="125"></p>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>

                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation"><a href="../index.php">HOME </a></li>
                        <li role="presentation"><a href="../gallery.php">GALLERY </a></li>
                        <li role="presentation"><a href="../guestService.php">STORE</a></li>
                        <li role="presentation"><a href="#contact">CONTACT US</a></li>
                        <li role="presentation"><a href="">LOGIN AS PARTNER</a></li>
                    </ul>
                </div>
                
            </div>
        </nav>
    </header>
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
                          echo "<script>alert('Invalid Username and Password!!')</script>";
                        }

                      }else{
                        echo "<script>alert('Please Fill all input fields')</script>";
                      }

                    }

                  ?>
<br><br><br><br><br>

   <div class="container post " id="about">
    <form class="form-inline navbar-right" role="form" action="partner.php" style="margin-right: auto" method="POST">
    <p>Already a member? Sign In here!</p>
    <div class="form-group ">
        <input class="form-control" placeholder="Enter Username" name="username" type="text" autofocus>
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="Enter Password" name="password" type="password" value="">
    </div>
    
    <input type="submit" class="btn btn-primary hero-button"  value="Sign In">
                           
</form>

<br>

        <div class="row">
            <div class="col-md-6 post-title">
                <h2 class="text-info">Grow Your Business with Anary</h2>
                <p class="author"><strong>WE BRING CLIENTS TO YOU</strong></p>
                <img class="img-thumbnail" src="../assets/img/clown.jpg">

                <br><br>
               
<p style="text-align: left;"> Start your Online store.. Join us now.
</p>
 <p style="text-align: left;">Anary Party Needs and Catering Services is in need of you. </p>
                <p style="text-align: left;">Join us today and get an extra income online. Let us give you a client through this website and exposed your products.</p>
                <p style="text-align: left;">By joining us you can manage your products in your profile. </p>
               
                <p> </p>
                <p></p>
                <p></p>

            </div>


            <div class="col-md-6 col-md-offset-0 post-body">
                <div class="row" >
                  <br>
        <div class="col-md-12 col-md-offset-0">

        <div class="login-panel panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">Fill up to Register</h3>
                </div>
                <div class="panel-body">
                <?php
                include '../connection/connection.php';

                if(isset($_POST['business_name'])&&isset($_POST['business_address'])&&isset($_POST['province_address'])&&isset($_POST['business_phone'])&&isset($_POST['business_email'])&&isset($_POST['business_username'])&&isset($_POST['password'])){
                  $business_name = $_POST['business_name'];
                  $business_address = $_POST['business_address'];
                  $province_address = $_POST['province_address'];
                  $business_phone = $_POST['business_phone'];
                  $business_email = $_POST['business_email'];
                  $business_username = $_POST['business_username'];
                  $password = $_POST['password'];

                  if(!empty($business_name)&&!empty($business_address)&&!empty($province_address)&&!empty($business_phone)&&!empty($business_email)&&!empty($business_username)&&!empty($password)){

                  $sql = "SELECT COUNT(business_username) AS num FROM tbl_partner WHERE business_username = :business_username";
                  $stmt = $pdo->prepare($sql);
                  $stmt->bindValue(':business_username', $business_username);
                  $stmt->execute();
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  if($row['num'] > 0){

                      echo "<script>alert('The Username ".$business_username." Already Exist!!!')</script>";
                  }else{
                    $sql_insert = 'INSERT INTO tbl_partner(business_name, city_address, province_address, contact_num, business_email, business_username, password) VALUES(:business_name, :city_address, :province_address, :contact_num, :business_email, :business_username, :password)';
                    $stmt = $pdo->prepare($sql_insert);
                    $stmt->execute([
                      'business_name' => $business_name,
                      'city_address' => $business_address,
                      'province_address' => $province_address,
                      'contact_num' => $business_phone,
                      'business_email' => $business_email,
                      'business_username' => $business_username,
                      'password' => $password
                    ]);

                    if($stmt->rowCount()) {
                        
                        echo "<script>alert('Successfully Register!!')</script>";
                     } else {
                       echo "<script> console.log('error'); </script> ";
                     }

                  }
                 }else{
                    echo "<script>alert('Please Fill all input fields')</script>";
                 }
                }

                ?>  
                    <form action="partner.php" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Business Name" name="business_name" type="text" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter City Address" name="business_address" type="text" value="" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Province Address" name="province_address" type="text" value="" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Business Phone Number" name="business_phone" type="text" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Business Email" name="business_email" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Username" name="business_username" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Password" name="password" type="password" required>
                            </div>
                            <br>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-md btn-info btn-block" value="Register">
                             
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
include '../connection/connection.php';

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
                        echo "<script> alert('Message Sent'); window.location.href='partner.php#contact'; </script> ";

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
                    <p><a href="#contact">anary@gmail.com</a></p>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-4 footer-about">
               
                <div data-form-alert="true">
                    <div class="hide" data-form-alert-success="true">Thanks for reaching us! We will give you a response on your Email!</div>
                </div>
                <form action="partner.php" method="POST">
                    
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
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
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