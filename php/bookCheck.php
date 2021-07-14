<?php
    session_start();
    
    include "connect.php";

    if(isset($_POST['view'])){
        $book = mysqli_real_escape_string($conn, $_POST['book']);

        $sql= "SELECT * FROM booking WHERE BookingId ='$book'";
        $check = mysqli_query($conn, $sql);

        
        if(mysqli_num_rows($check) == 1){ 

            $_SESSION['book'] = $book;

            header("location: history.php");
            


        }

    }

?>