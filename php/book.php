

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USAFIRI WETU</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
        <a class="navbar-brand" href="#">USAFIRI WETU</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="schedule.php">Schedules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="regulation.php">Regulations</a>
                </li>
        </div>
    </nav> <br>

    <div class="container mt-4">
        <h6>MAKE YOUR BOOKING NOW:</h6>
    </div>

    <div class="container">
        <?php
            $control = rand(8888888888,9999999999);

            echo"
                <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        <span class='sr-only'>Close</span>
                    </button>
                    Please Make Your Payments through control Number: <strong>$control</strong> Via <strong>M-pesa</strong>,<strong>TigoPesa</strong> ,<strong>HaloPesa</strong>  To gain Receipt Number!! 
                </div>
            
            ";
        ?>
    </div>


        
    <div class="container mt-3">

<?php    

    include "connect.php";

    session_start();


    $nameErr = $emailErr = $mobilenoErr = $receiptErr ="";  
    $name = $email = $mobileno = "";  

    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    
    //Validating the fullname 
    if (empty($_POST["fullname"])) {  
        $nameErr = "The fullname is required";  
    } else {  
        $name = input_data($_POST["fullname"]);  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "alphabets and white space only";  
            }  
    }  

    // validating the email
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            $email = input_data($_POST["email"]);   
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
    }  

    //  valdating namaba ya simu
    if (empty($_POST["phone"])) {  
            $mobilenoErr = "Mobile number is required";  
    } else {  
            $mobileno = input_data($_POST["phone"]);  
            if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
            $mobilenoErr = "Only numeric value is allowed.";  
            }  
        if (strlen ($mobileno) != 10) {  
            $mobilenoErr = "Mobile no must contain 10 digits.";  
            }  
    }  
    


    }  

    function input_data($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
    }  

    if(isset($_POST['booked'])){
    if($nameErr == "" && $mobilenoErr == "" && $emailErr == ""){
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $receipt = mysqli_real_escape_string($conn, $_POST['receipt']);

        $_SESSION['fullname'] = $fullname;

        
        $from = $_SESSION['from'] ;
        $to = $_SESSION['to'] ;
        $date = $_SESSION['date'];
        $depart = $_SESSION['depart'];
        $class = $_SESSION['class']; 
        $seat = $_SESSION['seat']; 

        $book = rand();

        $qry ="SELECT * FROM receipt WHERE receiptNO = '$receipt'";
        $check = mysqli_query($conn, $qry);

        if(mysqli_num_rows($check) == 1){
                
            $sql = "INSERT INTO `booking`(`fullname`, `phone`, `receipt`, `placeFrom`, `PlaceTo`, `Date`, `Departure`, `TrainClass`, `SeatNo`, `Email`, `BookingId`) VALUES ('$fullname','$phone','$receipt','$from','$to','$date','$depart','$class','$seat','$email','$book')";
            mysqli_query($conn, $sql);

            header("location: booked.php");
        }else{
            echo'
            
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    Wrong Receipt Number!!
                </div>
            
            ';
        }
    } 
    }

?>

</div>



    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="../img/pendo.jpg" width="100%" height="200px" alt="">
                    </div>
                    <div class="col-md-6">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Fullname</label>
                                    <input type="text" name="fullname"  class="form-control">
                                    <small class="text-danger"><?php echo $nameErr; ?></small><br>

                                    <label for="">Phone</label>
                                    <input type="tel" name="phone" placeholder="0743867221"  class="form-control">
                                    <small class="text-danger"><?php echo $mobilenoErr; ?></small>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="email" name="email" placeholder="example@gmail.com"  class="form-control">
                                    <small class="text-danger"><?php echo $emailErr; ?></small><br>
                                    <label for="">Payment Receipt No</label>
                                    <input type="text" name="receipt" required class="form-control">
                                    
                                </div>
                                <div class="col-md-12 mt-3 text-right">
                                    <input type="submit" name="booked" value="BOOK NOW" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </div>



    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/proper.js"></script>
    
</body>
</html>