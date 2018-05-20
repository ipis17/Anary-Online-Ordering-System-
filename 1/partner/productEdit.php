<?php 
//-----------------//
include 'session.php'; 
if(!isset($login_session)){
  $pdo->null;
  header('Location: partnerlogin.php');
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
  <link rel="stylesheet" type="text/css" href="asset/css/sidebar.css">
  
  <style type="text/css">
    body{
      background-color: #424242;
    }
  </style>

</head>
<body>
 
<?php

$product_id = $_GET['id'];

$sql_select = 'SELECT * FROM tbl_products WHERE id = :product_id';
$stmt = $pdo->prepare($sql_select);
$stmt->bindValue(':product_id', $product_id);
$stmt->execute();

while($row1 = $stmt->fetch(PDO::FETCH_ASSOC)){
      $edit_id = $row1['id'];
      //$edit_type = $row1['type'];
      $edit_productName = $row1['product_name'];
      $edit_price = $row1['price'];
      $edit_productImage = $row1['product_image'];
  }

?>


<div class="container">
 <br><br><br>
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="well" id="result">
      	<h3>Edit Product</h3>
        <form action="productEdit.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="product_id" value="<?php echo $edit_id ?>">
        	<div class="form-group">
        		<select class="form-control" name="edit_type">
                  <option value="">Select Type</option>
                  <option value="clown">Clown</option>
                  <option value="cake">Cake</option>
                </select>
        	</div>
        	<div class="form-group">
        		<input type="text" name="edit_productName" class="form-control" value="<?php echo $edit_productName; ?>" >
        	</div>
        	<div class="form-group">
        		<input type="number" name="edit_price" class="form-control" value="<?php echo $edit_price; ?>">
        	</div>

        	<div class="form-group">
        		<img width="100" height="100" src="product_image/<?php echo $edit_productImage; ?>"><br><br>
        		<input type="file" name="image" class="form-control">
        	</div>
        	<div class="form-group">
        		<input type="submit" name="edit_product" class="btn btn-primary" value="Update" onclick="return confirm('Are you sure you want to Update?');"> 
            <a href="partnerProducts.php" class="btn btn-danger">Back</a>
        	</div>
        </form>
    </div><!-- well -->
    </div>
  </div>
</div>


<?php
//if(isset($_POST['edit_type'])&&isset($_POST['edit_productName'])&&isset($_POST['edit_price'])&&isset($_POST['edit_image'])&&isset($_POST['product_id'])){

if(isset($_POST['edit_type'])&&isset($_POST['edit_productName'])&&isset($_POST['edit_price'])&&isset($_POST['product_id'])){
  $edit_id = $_POST['product_id'];
	$type = $_POST['edit_type'];
	$price = $_POST['edit_price'];
  $product_name = $_POST['edit_productName'];

  $image = $_FILES['image']['name'];
  $target = "product_image/".basename($image);
  // $target = "product_image/$product_name";
  // $actualpath = "http://localhost/aaanary/partner/$target";
  

  $sql_edit = "UPDATE tbl_products SET type = :type, product_name = :product_name, price = :price, product_image = :product_image WHERE id = :id";
   $stmt = $pdo->prepare($sql_edit);
   $stmt->execute([
      'type' => $type,
      'product_name' => $product_name,
      'price' => $price,
      'product_image' => $image,
      'id' => $edit_id
   ]); 

    if($stmt->rowCount()) {
       if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
           echo "<script> alert('Successfully Updated!'); window.location.href='partnerProducts.php'; </script> ";
       }
        
   }
	
}

?>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>