
<?php include "bookCheck.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USAFIRI WETU</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <style>
        
        .banner {
            background-image: url("../img/pendo.jpg");
            background-size: cover;
            /* height: 450px */
            
        }
        
    </style>
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
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modelId">My Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="schedule.php">Schedules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="regulation.php">Regulations</a>
                </li>
        </div>
    </nav> <br>

    <div class="container banner pb-3">
        <div class="row">
            <div class="col-md-6 mt-5 pr-2 text-white">
                <h2>USAFIRI WETU SYSTEM</h2>
                Welcome to the train Booking system ..make your Bookings today towards different areas and regions in your locationbr
                Provide the valid details and make payments to confirm your bookings now!! <br><br>
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modelId">MY BOOKINGS</a><br><br>
                <?php

                    include "connect.php";

                    if(isset($_POST['train'])){ 
                        $from = mysqli_real_escape_string($conn, $_POST['from']);
                        $to = mysqli_real_escape_string($conn, $_POST['to']);
                        $date = mysqli_real_escape_string($conn, $_POST['date']);
                        $depart = mysqli_real_escape_string($conn, $_POST['depart']);
                        $class = mysqli_real_escape_string($conn, $_POST['class']);
                        $seat = mysqli_real_escape_string($conn, $_POST['seat']);


                        if(strtotime($date) < time()){ 
                            
                            echo"
                            
                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        <span class='sr-only'>Close</span>
                                    </button>
                                    This Date is out of range!!
                                </div>
                            
                            ";
                        }elseif($from == $to){
                            
                            echo"
                            
                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        <span class='sr-only'>Close</span>
                                    </button>
                                    Please provide the valid place you are heading!!
                                </div>
                            
                            ";
                        }else{ 

                                $sql = "SELECT * FROM booking WHERE SeatNo = '$seat' AND TrainClass = '$class' AND Date = '$date' AND Departure = '$depart' AND PlaceFrom = '$from' AND PlaceTo = '$to'";
                                $check = mysqli_query($conn, $sql);

                                if(mysqli_num_rows($check) == 1){
                                    echo'
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            The Seat is already Booked!! Please select another seat!!
                                        </div>
                                    ';
                                }else{
                                    $_SESSION['from'] = $from;
                                    $_SESSION['to']=$to ;
                                    $_SESSION['date']=$date ;
                                    $_SESSION['depart']=$depart ;
                                    $_SESSION['class']=$class; 
                                    $_SESSION['seat']=$seat; 
       
                                   header("location: myBooking.php");
                                }

                        }
                    }
                ?>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="" method="post">
                            <h5 class="text-center text-muted">MAKE YOUR BOOKING NOW</h5>
                            <div class="row">
                                <div class="col-md-6">                                            
                                    <label for="">Place From</label>
                                    <select class="form-control" name="from" id="" required>
                                        <option value="Dar-es-salaam">Dar-es-salaam</option>
                                        <option value="morogoro">Morogoro</option>
                                        <option value="Dodoma">Dodoma</option>
                                        <option value="Tabora">Tabora</option>
                                    </select>
                                </div>
                                <div class="col-md-6">                                            
                                    <label for="">Place To</label>
                                    <select class="form-control" name="to" id="" required>
                                        
                                        <option value="Dar-es-salaam">Dar-es-salaam</option>
                                        <option value="morogoro">Morogoro</option>
                                        <option value="Dodoma">Dodoma</option>
                                        <option value="Tabora">Tabora</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                         
                                    <label for="">Date</label>
                                    <input type="date" name="date" id="" class="form-control" required>
                                </div>
                                <div class="col-md-6">                                            
                                    <label for="">Departure Time</label>
                                    <select class="form-control" name="depart" id="" required>
                                        <option value="06:00">06:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="18:00">18:00</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                              
                                    <label for="">Train Class</label>
                                    <select class="form-control" name="class" id="" required>
                                        <option value="A">Class A</option>
                                        <option value="B">Class B</option>
                                        <option value="C">Class C</option>
                                    </select>
                                </div>
                                <div class="col-md-6">                                            
                                    <label for="">Seat Number</label>
                                    <select class="form-control" name="seat" id="" required>
                                        <option value="001">Seat: 001</option>
                                        <option value="002">Seat: 002</option>
                                        <option value="003">Seat: 003</option>
                                        <option value="004">Seat: 004</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 text-center">
                                    <input type="submit" name="train" value="CHECK AVAILABILITY" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>

  <div class="container text-center mt-4">
      <h4>OUR SERVICES</h4>
  </div>

  <div class="container mt-5 text-center">
      <div class="row">
          <div class="col-md-3">
                 <i class='fas fa-wifi' style='font-size:48px;color:green'></i>
                <p>Free wi-fi available through out the journey</p>
          </div>
          <div class="col-md-3">
            <i class='fas fa-pepper-hot' style='font-size:48px;color:silver'></i><i class='fas fa-glass-cheers'
                style='font-size:48px;color:green'></i>
                <p>Foods and Drinks availabel through out the journey</p>
          </div>
          <div class="col-md-3">
            <i class='fas fa-female' style='font-size:48px;color:green'></i><i class='fas fa-male'
                style='font-size:48px;color:silver'></i>
                <p>Washrooms and Toilets available through out the journey</p>

          </div>
          <div class="col-md-3">
             <i class='fas fa-smoking-ban' style='font-size:48px;color:green'></i>
             <p>No smoking through out the Journey</p>
          </div>
      </div>
  </div>

  <div class="container-fluid bg-secondary text-white pt-3 text-center">
      <i class="fab fa-facebook-f p-2" style="font-size: 25px;"></i>
      <i class="fab fa-instagram p-2"  style="font-size: 25px;"></i>
      <i class="fab fa-whatsapp p-2"  style="font-size: 25px;"></i>
      <i class="fab fa-twitter p-2"  style="font-size: 25px;"></i>
      <i class="fab fa-invision p-2"  style="font-size: 25px;"></i>

  </div>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">View Your Booking</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    
                   <form action="" method="post">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <label for="">Enter Your Booking Id</label>
                                <input type="text" name="book" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="view" class="btn btn-primary">View</button>
                        </div>
                </form>
        </div>
    </div>
</div>



<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
     
        
    });
</script>


    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/proper.js"></script>
    
</body>
</html>