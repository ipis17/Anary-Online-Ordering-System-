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

$total_cart = $pdo->query("SELECT count(*) FROM tbl_reserve WHERE customer_id = '$customer_id'and pending_to_cart= 0 ")->fetchColumn();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guestService</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/user.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="../assets/css/Hero-Technology.css">
</head>
<?php include('../connection/connection.php');?>
<body>
   <br><br><br><br>
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
                        <li role="presentation"><a href="index.php">HOME </a></li>
                        <li role="presentation"><a href="gallery.php">GALLERY </a></li>
                        <li role="presentation"><a href="#">STORE</a></li>
                        <li role="presentation"><a href="#contact">CONTACT US</a></li>
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
                    <a href="memberService.php">
                        <i class="fa fa-suitcase   fa-fw"></i> Services
                    </a>
                </li>
                 <li>
                    <a href="memberProduct.php">
                        <i class="fa fa-gift   fa-fw"></i> Products
                    </a>
                </li>
                 <li>
                    <a href="memberPackage.php">
                        <i class="fa fa-dropbox   fa-fw"></i> Packages
                    </a>
                </li>
              <li><a href="" data-toggle="modal" data-target="#myCart"> <i class="fa fa-shopping-cart  fa-fw"></i> My Cart (<?php echo $total_cart;  ?>)</a></li>  

            <li class="nav navbar-right dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">welcome : <?php echo $login_session; ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="trackMyOrder.php"><span class="glyphicon glyphicon-list-alt"></span> &nbsp; My Order &nbsp;&nbsp;&nbsp;</a></li>
                <li><a href="customerLogout.php"><span class="glyphicon glyphicon-log-out"></span> &nbsp; Logout &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
              </ul>
            </li>
         
</ul>

            
</div>   




<div>

<div class="container">
  <div class="row">
    
      <div>
     <center>
       <img class="img-thumbnail" src="../assets/img/photography_background2.jpg">
       </center> 
  
</div>

</div><!-- row -->




<!-- Modal for mycart -->
<div class="modal fade" id="myCart" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><b>MyCart</b></h4>
                    </div>
      <div class="modal-body">
        

      
          <div id="mycart">
            <div class="well">
       
        <table class="table table-bordered table-hover">
        <thead>
          <tr>
           <th>Image</th>
            <th>Product</th>
            <th>Price</th> 
            <th>Quantity</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include '../connection/connection.php';
          //  SELECT * FROM tbl_reserve WHERE customer_id = $customer_id
            //, tbl_products.product_name as productName, tbl_reserve.price as productPrice
             $stmt = $pdo->query("
                 SELECT tbl_products.product_image as productImage, tbl_reserve.id as ID, tbl_products.product_name as productName, tbl_products.price as productPrice, tbl_reserve.qty as QTY
                 FROM tbl_reserve 
                 LEFT JOIN tbl_products
                 ON tbl_products.id = tbl_reserve.product_id
                 WHERE customer_id = '$customer_id' and tbl_reserve.pending_to_cart = 0
              ");
             while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td><img src='../partner/product_image/".$row['productImage']."' width='70' height='70'>";      
                echo "</td><td>".$row['productName'];
                echo "</td><td>".$row['productPrice'];
                echo "</td><td>".$row['QTY'];
                echo "</td><td><center><a href='removeFromCart.php?id=".$row['ID']."' class='btn btn-danger btn-md fa fa-trash'></a></center>";
                echo "</td></tr>";
            }
          ?>
        </tbody>
      </table>
      <p>
        <?php
        $res1 = $pdo->prepare("
            SELECT sum(tbl_products.price * tbl_reserve.qty) as PRICE 
            from tbl_reserve 
            left join tbl_products
            on tbl_products.id = tbl_reserve.product_id
            WHERE customer_id = '$customer_id' AND pending_to_cart = 0
        ");
        $res1->execute();
        while ($row = $res1->fetch(PDO::FETCH_ASSOC))
        {
            $total_price = $row['PRICE'];
            echo 'Total Price:  &#8369; '.$total_price;
            $_SESSION['total_presyo'] = $total_price;
        }

        ?>

      </p>
      <center><a href="reserveForm.php" class="btn btn-success">Checkout</a></center>
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
                        echo "<script> alert('Message Sent'); window.location.href='memberService.php#contact'; </script> ";

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
                <form action="memberService.php" method="POST">
                    
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