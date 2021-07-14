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
        <h6>BOOKING MADE BY YOU:</h6>
    </div>

    
    <?php

    session_start();

    include "connect.php";

    $full = $_SESSION['fullname'];

    $sql = "SELECT * FROM booking WHERE fullname = '$full'";
    $check = mysqli_query($conn, $sql);

    while($rows = mysqli_fetch_assoc($check)){
    ?>
        

    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                    <img src="../img/pendo.jpg" width="100%" height="200px" alt="">
                </div>
                <div class="col-md-6">
                    <div class="row">
                            <div class="col-md-6">
                                <h6>Place From</h6>
                                <p class="text-muted"><?php echo $rows['placeFrom']; ?></p>
                                <h6>Date</h6>
                                <p class="text-muted"><?php echo $rows['Date']; ?></p>
                                <h6>Train Class</h6>
                                <p class="text-muted"><?php echo $rows['TrainClass']; ?></p>

                            </div>
                            <div class="col-md-6">
                                <h6>Place To</h6>
                                <p class="text-muted"><?php echo $rows['PlaceTo']; ?></p>
                                <h6>Depart Time</h6>
                                <p class="text-muted"><?php echo $rows['Departure']; ?></p>
                                <h6>Seat Number</h6>
                                <p class="text-muted"><?php echo $rows['SeatNo']; ?></p>
                                    
                            </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
    
    <?php } ?>


    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/proper.js"></script>
    
</body>
</html>