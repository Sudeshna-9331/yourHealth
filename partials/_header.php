<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>navbar</title>
    <style>
        nav {
            z-index: 1;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2), 0 1px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .navbar {
            background-color: rgb(247, 244, 244) !important;
        }

        .navbar-toggler-icon {
            background-color: rgb(240, 221, 187) !important;
            border-radius: 50%;
        }

        .navbar-brand {
            margin-bottom: 0;
            font-size: 1.6rem !important;
            font-weight: bold;
        }

        .nav-item button {
            color: orange !important;
            background-color: transparent;
            border: none;
            padding: 0;
            margin: 0;
            text-transform: uppercase;
            font-size: 0.8rem;
            color: orange !important;
            text-align: center;
            font-weight: 400;


        }

        .nav-item button:hover {
            background-color: transparent !important;
            color: rgb(190, 126, 7) !important;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .nav-link {
            color: orange !important;
            text-align: center;
        }

        .nav-link:hover {
            color: rgb(190, 126, 7) !important;
        }

        .loggedIn {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            margin-left: 1rem;
            text-align: center;

        }

        #logIn {
            margin-left: 1rem;

        }

        #logIn,
        #signUp {
            color: orange !important;
            font-size: 0.8rem;
            padding: 0rem;
            width: 80px;

        }


        #signUp:hover {
            color: rgb(192, 128, 8) !important;
        }

        #logIn:hover {
            color: rgb(189, 125, 8) !important;
        }

        #user {
            color: orange !important;
            text-transform: capitalize;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        #logOut {
            color: orange !important;
            font-weight: 400;

        }

        #logOut:hover {
            color: rgb(190, 126, 7) !important;
        }

        .nav-link {
            text-transform: uppercase;
            font-size: 0.8rem;

        }

        .search {
            color: orange !important;
            border: 1px solid orange !important;
        }

        .search:hover {
            background-color: rgb(212, 139, 3) !important;
            border: none !important;
            color: white !important;
        }

        .search_input input::placeholder {
            color: orange;
            font-size: small;
        }

        .offcanvas {
            width: 30%;

        }

        .offcanvas .card-title {
            font-size: 0.7rem;
            color: orange;
            font-weight: bold;
            width: 7rem !important;
        }

        .nav-link .offcanvas-body {
            display: flex;
            flex-direction: column;
        }

        .nav-link .offcanvas-body .card {
            width: 60%;
            border-top-left-radius: 2rem;
            border-top-right-radius: 2rem;
            border-bottom-left-radius: 0rem;
            border-bottom-right-radius: 0rem;
        }

        .nav-link .offcanvas-body .card img {
            height: 9rem;
            width: 9rem;
        }

        @media only screen and (max-width: 1000px) {
            .offcanvas {
                width: 40%;

            }

            .nav-link .offcanvas-body .card {
                width: 70%;

            }
            


        }

        @media only screen and (max-width: 768px) {
            #logIn {

                margin-left: 0;
            }

            #logIn,
            #signUp {
                font-size: 1.1rem;
                width: 8rem;
                letter-spacing: 1px;
                padding: 0.5rem 0.5rem 0.5rem 0.5rem;
            }

            #logOut {
                font-size: 1.1rem;
                margin-left: 0;

                padding: 0.5rem 0.5rem 0.5rem 0.5rem;
            }

            #logOut:hover {
                color: rgb(190, 126, 7) !important;
            }

            #user {
                color: orange !important;
                font-size: 0.85rem;
                width: 8rem;
                margin: 2rem 0 0.2rem 0;
            }

            .offcanvas {
                width: 40%;

            }

            .nav-link .offcanvas-body .card {
                width: 80%;

            }
            .i{
                margin-right:0.3rem;
            }
        }

        @media only screen and (max-width: 565px) {
            .offcanvas {
                width: 50%;

            }

            .nav-link .offcanvas-body .card {
                width: 80%;

            }
        }

        @media only screen and (max-width: 510px) {
            .offcanvas {
                width: 70%;

            }

            .nav-link .offcanvas-body .card {
                width: 70%;

            }
        }

        @media only screen and (max-width: 420px) {
            #user {
                color: orange !important;
                text-transform: capitalize;
                font-size: 1rem;
                margin-top: 0;
            }

            .offcanvas {
                width: 70%;

            }

            .nav-link .offcanvas-body .card {
                width: 70%;

            }
        }
    </style>

</head>

<body>
    <?php require "partials/_dbconnect.php";?>
    <!-- NAVBAR -->
    <?php

   $loggedin = false;

  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
    $loggedin = true;
  }
    
 
    echo '<nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <p class="navbar-brand"><span>yourHealth</span></p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span  class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-1" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; font-size: x-small;">
                        <i class="fas fa-home i" style="color: orange;"></i>
                        <a id="home" class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                   

                    <li class="nav-item mx-1">
                        <a id="contact" class="nav-link">
                            <i class="fas fa-user-md" style=" margin-right: 0.2rem;"></i>
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Our Doctors</button>

                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasRightLabel">Our Doctors</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">';

                               
                            $sql = "SELECT * FROM `users` WHERE physician =1";
                            $result = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($result);
                            while($row = mysqli_fetch_assoc($result)){
                                echo ' <div class="card my-2">
                                    <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-1024.png"
                                    class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Dr. '.$row['name'].'</h5>
                                       
                                    </div>
                                  </div>';

                            }
                               echo '</div>
                            </div>


                        </a>
                    </li>
                    <li class="nav-item mx-1" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                        <i class="far fa-question-circle i" style="color: orange;"></i>
                    <a id="query" class="nav-link" href="query.php">Your Queries</a>
                    </li>
                </ul>

                <form class="d-flex search_input" action="search.php" method="get">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" style="border: 1px solid orange;">
                    <button class="btn btn-outline-primary search" type="submit"><i class="fas fa-search"></i></button>
                </form>';
                if(!$loggedin){
                    echo '<a id="logIn" class="nav-link" aria-current="page" href="/yourHealth/login.php">Log in</a>';
                    
                    echo '<a id="signUp" class="nav-link" aria-current="page" href="/yourHealth/signup.php">Sign Up</a>';
                
                }
                if($loggedin){
                    $username = $_SESSION['username'];
                     
                    $sql="SELECT `name` FROM `users` WHERE username='$username'";
                      $result = mysqli_query($conn,$sql);
                      $row=mysqli_fetch_assoc($result);
                    
                    echo '<div class="loggedIn">
                    <h1 id="user">Welcome '.$row['name'].'</h1>
                    <a id="logOut" class="nav-link mx-0" aria-current="page" href="/yourHealth/logout.php">Log Out</a>
                    </div>';
                }


            echo '</div>
        </div>
    </nav>';


    ?>

</body>

</html>