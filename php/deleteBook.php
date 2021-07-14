<?php

    $id = $_GET['id'];
    
    include "connect.php";
    $sql= "DELETE FROM booking WHERE id = '$id'";
    $check = mysqli_query($conn, $sql);

    header("location: home.php");


?>