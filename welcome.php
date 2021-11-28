<?php
 session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  

  header("location:login.php");
  exit;
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>iForum - Coding Forum</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        .card img {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .card-title a {
            color: grey;
            font-size: 0.9rem;
            text-decoration: none !important;
        }

        .card-title a:hover {
            color: rgb(41, 40, 40) !important;
            text-decoration: underline !important;

        }


        .view_thread {
            background-color: orange;
            border: none !important;
            font-size: 0.8rem;
        }

        .card:hover {
            transform: scale(1.02, 1.02);
        }

        span {
            color: orange;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .section {
            padding: 35px;
        }

        .heading {
            padding-bottom: 25px;
            font-size: 24px;
            letter-spacing: 2px;

        }

        .body {

            display: grid;
            margin: 0 auto;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-column-gap: 0.5rem;
            grid-row-gap: 0.5rem;


        }

        .section .card {
            max-width: 200px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            align-items: center;
            margin: auto;
            border-radius: 20px;
        }

        .footer {
            margin: 0;
            width: 100%;
            overflow: hidden;
        }

        /*  WHY US */
        .why-us {
            position: relative;
            margin: 0;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            overflow: hidden;

        }

        .why-us img {
            background-color: orange;
            margin: 1rem auto;
            width: 30%;
        }

        .why-us .why-us-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 70%;
            text-align: center;
        }

        .why-us .why-us-inner h2 {
            color: orange;
            font-size: 1.5rem;
            font-weight: bold;

        }

        .why-us .why-us-inner .p {
            padding: 10px 25px;
            font-size: 0.7rem;
            color: rgb(119, 117, 117);
        }

        .why-us .why-us-inner .cards {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .why-us .why-us-inner .cards .card1 {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }

        .why-us .why-us-inner .cards .card2 {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;


        }

        .why-us .why-us-inner .cards .card {
            width: 18rem;
            margin: 0.5rem;

            box-shadow: 0 4px 1px 0 rgba(155, 169, 231, 0.2), 0 2px 2px 0 rgba(85, 123, 248, 0.19);
            border: none;
            border-radius: 1rem;
        }

        .why-us .why-us-inner .cards .card .card-title {
            font-size: 0.9rem;
            font-weight: bold;
        }

        .why-us .why-us-inner .cards .card .card-text {
            font-size: 0.7rem;
            color: rgb(95, 89, 89);
        }

        /*   CONTACT US   */
        .contact {
            display: flex;
            flex-direction: column;
            margin-bottom: 2.5rem;
            margin-top: 1.5rem;
            padding-bottom: 2.5rem;
            background-image: linear-gradient(rgba(77, 101, 128, 0.7), rgba(55, 78, 104, 0.7)), url("./partials/images/contact3.jpg");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            overflow: hidden;
            width: 100%;
        }

        .contact .heading {
            display: flex;
            flex-direction: column;
            width: 70%;
            align-items: center;
            margin: auto;
        }

        .contact .heading h2 {
            color: orange;
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 2rem;
            margin-bottom: 1rem;
            letter-spacing: 2px;
            font-family: "Lato", sans-serif;
        }

        .contact .heading p {
            color: white;
            font-size: 0.7rem;
            text-align: center;
            font-family: "Lato", sans-serif;
            width: 100%;
            margin-bottom: 0.5rem;
            font-weight: lighter;
        }

        .contact .content-info {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;

        }

        .contact .content-info .left {
            display: flex;
            flex-direction: column;
            width: 40%;
            margin: 0 0.8rem;
        }

        .contact .content-info .left .card {
            background-color: transparent;
            width: 90%;
            border-radius: 1.5rem;
        }

        .contact .content-info .left .card i {
            background-color: transparent;
            padding: 1rem;
            font-size: 2rem;
            border-radius: 50%;

        }

        .contact .content-info .left .card .card-body .card-title {
            font-size: 1rem;
            color: orange;

        }

        .contact .content-info .left .card .card-body .card-text {
            font-size: 0.7rem;
            color: white;
        }


        .contact .content-info .right {
            width: 60%;
            margin: 0;
            margin-right: 3rem;
            background-color: white;
            padding: 1.5rem;
            border-top-left-radius: 3rem;
            border-bottom-right-radius: 3rem;
        }

        .contact .content-info .right form label {
            color: rgb(99, 95, 95);
        }

        .contact .content-info .right form input {
            background-color: transparent;

            border-top: 1px solid white;
            border-left: 1px solid white;
            border-right: 1px solid white;
            border-bottom: 1px solid black;
        }

        .contact .content-info .right form label {
            font-size: 0.7rem;
        }

        .contact .content-info .right form textarea {
            background: transparent;
            border-top: 1px solid white;
            border-left: 1px solid white;
            border-right: 1px solid white;
            border-bottom: 1px solid black;

        }

        .contact .content-info .right form button {
            font-size: 0.8rem;
            background-color: orange;
            padding: 0.4rem 1rem;
            border: none;
            border-radius: 3rem;
        }

        .contact .content-info .right form button:hover {
            background: transparent;
            color: rgb(25, 158, 158);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        @media only screen and (max-width:900px) {
            .why-us {
                position: relative;
                margin: 0 auto;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .why-us img {
                margin: auto;
                margin-bottom: 1rem;
                margin-top: 1rem;
                width: 30%;

            }

            .why-us .why-us-inner {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 90%;
            }

            .why-us .why-us-inner h2 {
                color: orange;
                font-size: 1.5rem;

            }

            .why-us .why-us-inner .p {
                padding: 2px 20px;
                font-size: 0.7rem;

            }

            .why-us .why-us-inner .cards {
                width: 70%;
            }

            .why-us .why-us-inner .cards .card {
                width: 15rem;
                margin: 0 0.6rem;

            }

            .why-us .why-us-inner .cards .card .card-text {
                font-size: 0.6rem;

            }

            /* Contact Us */
            .contact {

                margin-bottom: 3rem;
                margin-top: 1rem;
                padding-bottom: 1rem;

            }

            .contact .heading {

                width: 90%;

            }

            .contact .heading h2 {

                font-size: 1.5rem;
                font-weight: bold;
                margin-top: 1.7rem;
                margin-bottom: 0.5rem;
                letter-spacing: 1px;

            }

            .contact .heading p {

                font-size: 0.7rem;
                margin-bottom: 0.5rem;

            }

            .contact .content-info .left {

                width: 40%;
                margin: 0 0.2rem;
            }


            .contact .content-info .left .card .card-body .card-title {
                font-size: 0.7rem;

            }

            .contact .content-info .left .card .card-body .card-text {
                font-size: 0.5rem;

            }


            .contact .content-info .right {
                width: 50%;
                padding: 1.7rem;

            }

            .contact .content-info .right form label {
                font-size: 0.7rem;
            }

            .contact .content-info .right form button {
                font-size: 0.7rem;

            }

            .card {
                width: 100%;

            }


        }

        @media only screen and (max-width:747px) {
            .why-us .why-us-inner .cards .card {
                width: 13rem;
                margin: 0 0.6rem;

            }
        }

        @media only screen and (max-width:632px) {

            /*  WHY US */
            .section .card {
                margin-left: auto;
                margin-right: auto;
            }

            .why-us {

                display: flex;
                flex-direction: column;

                width: 100%;

            }

            .why-us img {
                margin: 0rem;
                width: 40%;
            }

            .why-us .why-us-inner {
                width: 100%;
            }

            .why-us .why-us-inner .cards {
                width: 100%;
            }

            .why-us .why-us-inner .cards .card {
                width: 70%;
                margin: 0 1.2rem;
                margin-bottom: 0.5rem;
                box-shadow: 0 4px 1px 0 rgba(155, 169, 231, 0.2), 0 2px 2px 0 rgba(85, 123, 248, 0.19);
                border: none;
            }

            .why-us .why-us-inner .cards .card .card-title {
                font-size: 0.8rem;
                font-weight: bold;

            }

            .why-us .why-us-inner .cards .card .card-text {
                font-size: 0.6rem;
                color: rgb(95, 89, 89);
                margin: auto;
            }

            /*   CONTACT US   */
            .contact {
                margin-bottom: 3rem;
                margin-top: 1rem;
                padding-bottom: 1rem;
            }

            .contact .heading {
                width: 90%;
            }

            .contact .heading h2 {
                font-size: 1.4rem;
                margin-top: 1.5rem;
                margin-bottom: 0.5rem;
                letter-spacing: 1px;

            }

            .contact .heading p {
                font-size: 0.6rem;
                text-align: center;
                width: 100%;
                margin-bottom: 0.3rem;
            }

            .contact .content-info {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            .contact .content-info .left {
                display: flex;
                flex-direction: column;
                width: 30%;
                margin: 0 1rem;
            }

            .contact .content-info .left .card {
                background-color: transparent;
                border: none;
                width: 100%;

            }

            .contact .content-info .left .card i {
                background-color: transparent;
                padding: 0.5rem;
                font-size: 2rem;

            }

            .contact .content-info .left .card .card-body .card-title {
                font-size: 0.8rem;
                color: orange;

            }

            .contact .content-info .left .card .card-body .card-text {
                font-size: 0.6rem;
                color: white;
            }


            .contact .content-info .right {
                width: 60%;
                margin-right: 1rem;
            }

            .contact .content-info .right form label {
                font-size: 0.65rem;
            }

            .contact .content-info .right form button {
                font-size: 0.7rem;
                padding: 0.35rem 1rem;

            }

        }

        @media only screen and (max-width:430px) {

            /*   CONTACT US   */
            .contact {
                margin-bottom: 3rem;
                margin-top: 1rem;
                padding-bottom: 3rem;
            }

            .contact .heading {
                width: 100%;
            }

            .contact .heading h2 {
                font-size: 1.5rem;
                margin-top: 1.5rem;
                margin-bottom: 0.2rem;
                letter-spacing: 2px;

            }

            .contact .heading p {
                font-size: 0.6rem;
                text-align: center;
                width: 100%;
                margin-bottom: 0.3rem;
            }

            .contact .content-info {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;
            }

            .contact .content-info .left {
                display: flex;
                flex-direction: column;
                width: 100%;
                margin: 0 3rem;
                margin-bottom: 0.5rem;
            }

            .contact .content-info .left .card {
                background-color: transparent;
                border: none;
                width: 80%;

            }

            .contact .content-info .left .card i {
                background-color: transparent;
                padding: 0.5rem;
                font-size: 2rem;

            }

            .contact .content-info .left .card .card-body .card-title {
                font-size: 0.9rem;
                color: orange;

            }

            .contact .content-info .left .card .card-body .card-text {
                font-size: 0.7rem;
                color: white;
            }


            .contact .content-info .right {
                width: 80%;
                margin: auto;
            }

            .contact .content-info .right form label {
                font-size: 0.8rem;
            }

            .contact .content-info .right form button {
                font-size: 0.7rem;
                padding: 0.35rem 1rem;

            }

        }
    </style>
</head>

<body>
    <?php require "partials/_header.php";?>
    <?php require "partials/_carousel.php";?>
    <?php require "partials/_dbconnect.php";?>

    <div class="section container-fluid">
        <h2 class="heading text-center">Welcome to <span> yourHealth</span></h2>

        <div class="container body mb-1">
            <!-- Fetch all the categories from database -->
            <?php
                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($result);

                // Use loop to iterate through categories 
                while($row = mysqli_fetch_assoc($result)){
                  if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
                    echo '
                        <div class="card">
                            <img src="https://source.unsplash.com/500x400/?' .$row['category_name']. ',medical,medicine" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold;"><a href="threads.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></h5>
                                <p class="card-text" style="font-size:13px; font-weight: lighter;">
                                '.substr($row['category_description'],0,100).' ...</p>
                                <a href="threads.php?catid='.$row['category_id'].'" class="btn view_thread btn-primary">Consult</a>
                            </div>
                        </div>';
                    }
                  }

                ?>

        </div>
    </div>



      
    <!-- WHY US -->
    <div class="container-fluid why-us" id="why-us">
        <img src="./partials/images/medical.png" alt="">
        <div class="why-us-inner">
            <h2>Why Us?</h2>
            <p class="p">We are a team providing the opportunity for online consultation with health experts virtually for the patients in this ongoing Covid situatiion...You ask your queries and complications,our experts will solve them. If not you can contact us,we will connect with you.</p>
            <div class="points cards">
                <div class="card1">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Our goals</h5>
                            <p class="card-text">To be improved and more inspiring.</p>

                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Our Values</h5>
                            <p class="card-text">To give everyone the ability to be heard,seen,share their issues and
                                complications as they happen.</p>

                        </div>
                    </div>
                </div>

                <div class="card2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Our Dream</h5>
                            <p class="card-text">It is our compass when we're building the platform and developing new
                                facilities.We want to empower indivisuals and be a force for good in the
                                world.</p>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Our Mission</h5>
                            <p class="card-text">Our mission is to provide you with benefits you need to be
                                able to craft the kinds of stories that you want to tell.</p>

                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>

     
    <!-- CONTACT US  -->
    <div class="container-fluid contact " id="contact">
        <div class="heading">
            <h2>Contact Us</h2>
            <p>Contact us for further queries,we'd get back to you...</p>

        </div>


        <div class="content-info">
            <div class="left">
                <div class="card mb-2">
                    <div class="row g-0" style="display: flex;  justify-content: space-between; width: 85%;">
                        <div class="col-md-1">
                            <i class="fas fa-map-marker-alt" style="transform: translate(50%,100%);"></i>
                        </div>
                        <div class="col-md-11">
                            <div class="card-body">
                                <h5 class="card-title">Address</h5>
                                <p class="card-text">Argori, Andul, Howrah 711302, West Bengal</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="row g-0" style="display: flex;  justify-content: space-between; width: 85%;">
                        <div class="col-md-1">

                            <i class="fas fa-phone" style="transform: translate(50%,100%); "></i>
                        </div>
                        <div class="col-md-11">
                            <div class="card-body">
                                <h5 class="card-title">Contact no.</h5>
                                <p class="card-text">+918693313590</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="row g-0" style="display: flex;  justify-content: space-between; width: 85%;">
                        <div class="col-md-1">

                            <i class="fas fa-envelope-open-text" style="transform: translate(50%,100%);"></i>
                        </div>
                        <div class="col-md-11">
                            <div class="card-body">
                                <h5 class="card-title">Email</h5>
                                <p class="card-text">sudeshna9331@gmail.com</p>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="right">

                <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];
            $contact = $_POST["contact"];

                $sql = "INSERT INTO `contact` (`email`, `name`, `message`, `contact`, `time`) VALUES ('$email', '$name', '$message', ' $contact', current_timestamp())";
                $result = mysqli_query($conn,$sql);
           

               if($result){
                echo '<div style="z-index: 1;" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Done! </strong>Message submitted...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
             }
              else{
                echo '<div  style="z-index: 1;" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Your message can not be submitted... </strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              }
            }
        ?>



                <form action="/yourHealth/index.php" method="POST" class="py-2">
                    <div class="row mb-2">
                        <label  for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label  class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" for="name" type="text" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="message" class="col-sm-2 col-form-label">Your Message</label>
                        <div class="mb-3 col-sm-10">
                            <textarea name="message"  class="form-control" id="message" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="contact" class="col-sm-2 col-form-label">Contact no.</label>
                        <div class="col-sm-10">
                            <input name="contact" type="number" class="form-control" id="contact">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"
        integrity="sha512-cyAbuGborsD25bhT/uz++wPqrh5cqPh1ULJz4NSpN9ktWcA6Hnh9g+CWKeNx2R0fgQt+ybRXdabSBgYXkQTTmA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let home = document.getElementById("home");

        home.classList.add("active");
    </script>
    <?php require "partials/_footer.php";?>


</body>

</html>