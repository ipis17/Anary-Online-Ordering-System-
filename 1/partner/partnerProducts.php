<?php 
include 'session.php'; 
if(!isset($login_session)){
  $pdo->null;
  header('Location: partner.php');
}
?>

<?php

include '../connection/connection.php';

$stmt = $pdo->query("SELECT id FROM tbl_partner WHERE business_username = '$login_session' ");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $id = $row['id'];
  }
echo "<script>console.log('id is: ".$id." ')</script>";
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css"> 
  <style type="text/css">
    body{
      background-color: #424242;
    }
  </style>

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


      <div class="collapse navbar-collapse" id="navcol-1" style="padding-left: 7%; padding-right: 8%;">
          <ul class="nav navbar-nav">
              <li role="presentation"><a href="partnerProfile.php">My Business</a></li>
              <li role="presentation" class="active"><a href="#">My products</a></li>
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
    <div class="col-lg-12">
      <button class="btn btn-info btn-md" data-toggle="modal" data-target="#addProduct">Add Product</button>  
      <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="well" id="result">          

        <table class="table table-bordered table-hover table-striped table-responsive " id="dataTables-example" >
          
           
        <thead>
          <tr>
            <th>Category</th>
            <th>Type</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Product Image</th>
            <th>Details</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include '../connection/connection.php';
             $stmt = $pdo->query("SELECT * FROM tbl_products WHERE partner_id = $id order by id desc");
             while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['category'];  
                echo "</td><td>".$row['type'];                                             
                echo "</td><td>".$row['product_name'];
                echo "</td><td>".$row['price'];
                echo "</td><td><img src='product_image/".$row['product_image']."' width='70' height='70'>";
                echo "</td><td>".$row['product_details'];
                echo "</td><td><a href='productEdit.php?id=".$row['id']."' class='btn btn-info btn-md'>Edit</a>&nbsp<a href='productDelete.php?id=".$row['id']."' class='btn btn-danger btn-md' onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a>";
                echo "</td></tr>"; 

            }
          ?>
        </tbody> 
      </table>
    </div><!-- well -->
    </div>
  </div>
</div>


 <!-- Modal -->
<div class="modal fade" id="addProduct" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Product</h4>
      </div>
      <div class="modal-body">
        <form action="partnerAddProducts.php" method="POST" enctype="multipart/form-data">
          <fieldset>
            <input type="hidden" value="<?php echo $id ?>" name="partner_id">
            
             <div class="form-group">
                <label>Category </label>
                <select class="form-control" name="partner_category">
                  <option value="">Select Category</option>
                  <option value="services">Services</option>
                  <option value="products">Products</option>
                  <option value="package">Package</option>
                </select>
            </div>

            <div class="form-group">
                <label>Type: </label>
                <select class="form-control" name="partner_type">
                  <option value="">Select Type</option>
                  <option value="clown">Services - Clown</option>
                  <option value="magician">Services - Magician</option>
                  <option value="chairs">Services - Chairs</option>
                  <option value="photo_booth">Services - Photo Booth</option>
                  <option value="catering">Services - Catering</option>
                  <option value="cake">Products - Cake</option>
                  <option value="balloon">Products - Balloon</option>
                  <option value="loothbag">Products - Looth Bag</option>
                  <option value="package_a">Package A</option>
                  <option value="package_b">Package B</option>
                  <option value="package_c">Package C</option>
                  <option value="package_d">Package D</option>
                  <option value="package_e">Package E</option>
                  
                </select>
            </div>
            <div class="form-group">
                <label>Product Name: </label>
                <input class="form-control" placeholder="Enter Product Name" name="partner_productName" type="text" value="">
            </div>
            <div class="form-group">
                <label>Price: </label>
                <input class="form-control" placeholder="Enter Price" name="partner_productPrice" type="number" autofocus>
            </div>
             <div class="form-group">
                <label>Details: </label>
                <textarea class="form-control" placeholder="Details" name="product_details"></textarea> 
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Enter Business Email" name="image" type="file">
            </div>
            <br>
            <!-- Change this to a button or input when using this as a form -->
            <input type="submit" class="btn btn-md btn-info" name="upload" value="Add Product">
        </fieldset>
        </form>
      </div>
    
    </div>
    
  </div>
</div>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<script>
  $(document).ready(function() {
      $('#dataTables-example').DataTable({
          responsive: true
      });
  });

</script>

</body>
</html>