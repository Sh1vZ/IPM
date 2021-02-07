<?php
include 'conn.php';
   
    if(isset($_POST['but_submit'])){

        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
    
        if ($username != "" && $password != ""){
    
            $sql_query = "select count(*) as cntUser from admin where admin_naam='".$username."' and admin_password='".$password."'";
            $result = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($result);
    
            $count = $row['cntUser'];
    
            if($count > 0){
                $_SESSION['admin_naam'] = $username;
                header('Location: dashboard.php');
            }
    
        }
    
    }
    
?>
