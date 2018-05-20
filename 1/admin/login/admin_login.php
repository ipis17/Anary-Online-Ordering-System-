<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color: #333">
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In For Login</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <center><img src="../assets/images/anary.png" width="130" height="100"></center>
                        </div>
                        <form role="form" action="admin_login.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Username.." name="user" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Password" name="pass" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="" value="Login" class="btn btn-info btn-block">


                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

include '../connection/connection.php';

if(isset($_POST['user'])&&isset($_POST['pass'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if(!empty($user)&&!empty($pass)){
        $sql_admin = "SELECT * FROM tbl_admin WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($sql_admin);
        $stmt->bindValue(':username', $user);
        $stmt->bindValue(':password', $pass);
        $stmt->execute();

         if($stmt->rowCount()) {
            echo "<script> alert('SuccessFully Login!'); window.location.href='../folder/adminHome.php'; </script> ";
         } else {
           echo "<script> alert('Wrong Combination of Username and Password!'); </script> ";
         }
    }else{
        echo "string";
    }
}


?>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
