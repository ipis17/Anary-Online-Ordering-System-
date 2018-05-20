  <?php
include '../connection/connection.php';

if (isset($_POST['partner_id'])&&isset($_POST['partner_type'])&&isset($_POST['partner_productName'])&&isset($_POST['partner_productPrice'])) {

  $partner_id = $_POST['partner_id'];
  $partner_category = $_POST['partner_category'];
  $partner_type = $_POST['partner_type'];
  $partner_productPrice = $_POST['partner_productPrice'];

  $partner_productName = $_POST['partner_productName'];
  $product_details = $_POST['product_details'];
  $image = $_FILES['image']['name'];
  $target = "product_image/".basename($image);
  // $target = "product_image/$partner_productName";
  // $actualpath = "http://localhost/aaanary/partner/$target";

  if(!empty($partner_id)&&!empty($partner_type)&&!empty($partner_productPrice)&&!empty($partner_productName)){

    $sql_insert = 'INSERT INTO tbl_products (partner_id, category,type, product_name, price, product_image,product_details) VALUES(:partner_id, :partner_category, :partner_type, :partner_productName, :partner_productPrice, :actualpath,:product_details)';
    $stmt = $pdo->prepare($sql_insert);
    $stmt->execute([
      'partner_id' => $partner_id,
      'partner_category' => $partner_category,
      'partner_type' => $partner_type,
      'partner_productName' => $partner_productName, 
      'partner_productPrice' => $partner_productPrice,
      'actualpath' => $image,
      'product_details' => $product_details
    ]);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
       header('Location: partnerProducts.php');
       
    }else{
     echo "<script> console.log('error'); </script> ";
    }
  }else{//!empty
    echo "<script> console.log('Please fill all input'); </script> ";
  }

}


?>
