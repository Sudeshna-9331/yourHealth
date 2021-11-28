<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./css/all.css">
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
  <title>iForum - Coding Forum</title>
  <style>
      .search_input{
            visibility: hidden;
        }
    .jumbotron {
      background-color: rgb(255, 213, 136);
      padding: 2rem;
      margin: 3rem auto;
      border-top-right-radius: 50%;
      border-bottom-left-radius: 30%;
    }

    .jumbotron button {
      background-color: orange;

      margin: 1rem 2rem;
    }

    .jumbotron button:hover {
      background-color: rgb(167, 111, 9);
    }

    .jumbotron button a {
      text-decoration: none;
      color: white;
    }

    @media only screen and (max-width: 768px) {}
  </style>

</head>

<body>
  <?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false){
        header("location:login.php");
        exit;
    }
    else{
        session_unset();
        session_destroy();
    }
  
 ?>
  <?php require "partials/_header.php";?>


  <?php require "partials/_dbconnect.php";?>

  <div class="section">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">You are logged out...</h1>
        <p class="lead"> Login again... <button class="btn"><a href="login.php">Login</a></button></p>
      </div>
    </div>
  </div>





  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
    integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"
        integrity="sha512-cyAbuGborsD25bhT/uz++wPqrh5cqPh1ULJz4NSpN9ktWcA6Hnh9g+CWKeNx2R0fgQt+ybRXdabSBgYXkQTTmA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
  <script>
    let home = document.getElementById("home");

    home.classList.add("active");
  </script>
  <?php require "partials/_footer.php";?>


</body>

</html>