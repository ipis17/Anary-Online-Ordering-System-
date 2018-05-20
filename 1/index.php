<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainPage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/Hero-Technology.css">
</head>

<body>
    <header>
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
                        <li role="presentation"><a href="storehome.php">STORE</a></li>
                        <li role="presentation"><a href="#contact">CONTACT US</a></li>
                        <li role="presentation"><a href="partner/partner.php">LOGIN AS PARTNER</a></li>
                    </ul>
                </div>
                
            </div>
        </nav>
    </header>
    
    <div class="container post" id="about">
        <div class="row">
            <div class="col-md-6 post-title">
                <h2 class="text-info">ANARY'S PARTY NEEDS AND CATERING SERVICES</h2>
                <br><br>
                <img class="img-thumbnail" src="assets/img/past-event.jpg">

                <br><br> <br>
                <p style="text-align: left;">Anary Party Needs and Catering Services is your one stop party shop! When it comes to party needs Anary's is the place, Anary's is the biggest party needs provider in City and has the best balloons in Cebu when it comes to foods for catering. </p>
                <p style="text-align: left;">Anary's Cake Decors and Party Needs offers a complete selection of party supplies for kids and adults. We offer different kinds of balloons that would fit your event from a wide range of choices such as balloon archs, balloon pillars, balloon set-ups, balloon table centerpiece, balloons on sticks and balloons flying string or ribbons.</p>
                <p style="text-align: left;">Anary also offers Kiddies Birthday Packages, Party Entertainment, Party Rentals and Food Carts that would fit all celebrations. </p>

            </div>

            <div class="col-md-6 col-md-offset-0 post-body">
                <p>Food Carts like Chocolate Fountain; Cotton Candy Cart; French Fries Cart; Hotdog Cart; Mr. Softy Ice Cream Cart; Squid ball, Tempura and Squid Roll Cart; Popcorn Cart and Potato Twist. </p>
                <p>Party Rentals like Tables and Chairs for kids and adults; Buffet Table; Trampoline; Inflatable Castle (Small and Big); Bubble Machine; Videoke; and Sound System are available.  </p>
                <p>Party Entertainment like Clown Host; Clown Balloon Clown Twister; Mascot; Face Painting; Body Glitter Tattoo and Magic Illusionist. </p>
                <figure>
                    <div class="carousel slide" data-ride="carousel" id="carousel-1">
                        <div class="carousel-inner" role="listbox">
                            <div class="item active"><img src="assets/img/1.jpg" alt="Slide Image"></div>
                            <div class="item"><img src="assets/img/2.jpg" alt="Slide Image"></div>
                            <div class="item"><img src="assets/img/3.jpg" alt="Slide Image"></div>
                            <div class="item"><img src="assets/img/4.jpg" alt="Slide Image"></div>
                        </div>
                        <div><a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-1" role="button"
                            data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i><span class="sr-only">Next</span></a></div>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-1" data-slide-to="1"></li>
                            <li data-target="#carousel-1" data-slide-to="2"></li>
                            <li data-target="#carousel-1" data-slide-to="3"></li>
                        </ol>
                    </div>
                    <figcaption></figcaption>
                </figure>
                

                <p style="text-align: left;">Other services includes:
            <br><br>
                * Customized Calling Cards<br>
                * Customized Keychains<br>
                * Customized Mugs<br>
                * Personalized Tarpaulin</p>

            </div>
        </div>
    </div>
    <div class="jumbotron hero-technology">
        <h2 class="hero-title">Be a one of our Partner </h2>
        <p class="hero-subtitle">Be one of our partnet around the country and lets us bring enjoyment to their occasions. </p>
        <p><a class="btn btn-primary hero-button" role="button" href="partner/partner.php">Join Now</a></p>
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
                        echo "<script> alert('Message Sent'); window.location.href='index.php#contact'; </script> ";

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
                <form action="index.php" method="POST">
                    
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