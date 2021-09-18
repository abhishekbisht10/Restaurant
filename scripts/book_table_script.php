<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Les Papilles</title>

    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/3a822e9218.js" crossorigin="anonymous"></script>

  </head>
  <body>


 <!-- PHP Code for Database starts here -->

 <?php
  $con = mysqli_connect("localhost","root","","restaurant_database") or die(mysqli_error($con));

  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $telephoneNumber = mysqli_real_escape_string($con, $_POST['telephoneNumber']);
  $date = mysqli_real_escape_string($con, $_POST['date']);
  $time = mysqli_real_escape_string($con, $_POST['time']);
  $numOfPeople = mysqli_real_escape_string($con, $_POST['numOfPeople']);
  $message = mysqli_real_escape_string($con, $_POST['message']);

  $query1 = "select * from book_table where email = '$email' and date = '$date'";
  $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
  $outcome1 = mysqli_num_rows($result1);

  if($outcome1==0) {
    $contact_info = "insert into book_table(name, email, telephone_number, date, time, number_of_people, message) values('$name', '$email', '$telephoneNumber', '$date', '$time', '$numOfPeople', '$message')";
    $result = mysqli_query($con, $contact_info) or die(mysqli_error($con));
    $modal_message = "Thank You! Your reservation has been confirmed.";
  } else {
    $modal_message = "Your reservation has already been confirmed.";
  }
 ?>

 <!-- PHP Code for Database ends here -->


  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">

        <h1 class="display-4 fw-bold lh-1"><?php echo $modal_message ?></h1><br>

        <p class="lead">
          Hello <?php echo $name ?> ! <br>
          Your reservation at <em>Les Papilles</em> on <?php echo $date ?> at <?php echo $time ?> for <?php echo $numOfPeople ?> people is now <strong>Confirmed.</strong>
        </p>
        <p class="lead"> Have a great day! </p><br>

        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">

          <button type="button" onclick="window.location.href='../index.html'" class="btn btn-warning btn-lg px-4 me-md-2">
            <i class="far fa-caret-square-left"></i>&ensp;Home Page
          </button>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-warning btn-lg px-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-receipt"></i>&ensp;Information
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-warning">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-check-circle"></i>&ensp;Reservation Confirmed</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                  <strong>Reservation at <em>Les Papilles</em>:-</strong><br>
                  Time: <?php echo $time ?><br>
                  Date: <?php echo $date ?><br>
                  Number of people: <?php echo $numOfPeople ?>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" src="../images/book-table-img.jpg" alt="customer-care-img" width="650">
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
 </body>
 </html>
