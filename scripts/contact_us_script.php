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
  $subject = mysqli_real_escape_string($con, $_POST['subject']);
  $message = mysqli_real_escape_string($con, $_POST['message']);

  $query_check = "select * from contact_us where email = '$email'";
  $query_result = mysqli_query($con, $query_check) or die(mysqli_error($con));
  $query_outcome = mysqli_num_rows($query_result);

  if($query_outcome==0) {
    $contact_info = "insert into contact_us(name, email, subject, message) values('$name', '$email', '$subject', '$message')";
    $result = mysqli_query($con, $contact_info) or die(mysqli_error($con));
    $modal_message = "Thank you for getting in touch !";
  } else {
    $modal_message = "You have already filled this form !";
  }
 ?>

 <!-- PHP Code for Database ends here -->


<br><br>
 <div class="container my-5">
   <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
     <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
       <h1 class="display-4 fw-bold lh-1"><?php echo $modal_message ?></h1><br>
       <p class="lead">We appreciate you contacting us about <em><?php echo $subject ?></em>. One of our customer happiness members will be getting back to you shortly.
         <br>
       Have a great day!
     </p><br>
   <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
         <button type="button" onclick="window.location.href='../index.html'" class="btn btn-warning btn-lg px-4 me-md-2"><i class="far fa-caret-square-left"></i>&ensp;Home Page</button>
         <button type="button"  onclick="window.location.href='../index.html#contact'" class="btn btn-outline-warning btn-lg px-4"><i class="far fa-caret-square-left"></i>&ensp;Contact Us</button>
       </div>
     </div>
     <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
         <img class="rounded-lg-3" src="../images/customer-service.png" alt="customer-care-img" width="720">
     </div>
   </div>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
