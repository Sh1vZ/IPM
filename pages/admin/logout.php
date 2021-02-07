<?php
include "conn.php";


// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}
?>
