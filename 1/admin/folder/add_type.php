<?php
    include '../connection/connection.php';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['add_type'])){
        $add_type = $_POST['add_type'];

        if(!empty($add_type)){
            try{
            $sql_type = 'INSERT INTO tbl_type(type) VALUES(:type)';
            $stmt = $pdo->prepare($sql_type);
            $stmt->execute(['type' => $add_type]);
               // echo "<div class='alert alert-success'><center>Successfully Register!!</center></div> ";
                header("Location: admin_edit.php");
            }catch(PDOException $e){
                echo "<script> console.log('error'); </script> ";
            }
        }else{
            echo "<script> console.log('Please Fill All Input'); </script> ";
        }

    }
    
?>