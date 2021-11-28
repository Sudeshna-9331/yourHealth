<?php
 $showAlert = false;
 $showErrorPassword=false;
 $showErrorLogin = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "partials/_dbconnect.php"; 
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $contact = $_POST["mobile"];
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $cpassword =mysqli_real_escape_string($conn, $_POST["cpassword"]);

     
    if(isset($_POST['physician'])){
        $physician = '1';
    }
    else{
        $physician = '0';
    }
   
    
    // Check whether data already exists or not.
    $exists_sql="SELECT * FROM `users` WHERE username='$username'";
    $res= mysqli_query($conn, $exists_sql);

    $numExistsRow = mysqli_num_rows($res);
    if($numExistsRow >0){
        
        if(($password == $cpassword )){
            $showErrorLogin =true;
        }

    }
    else{
        
        if($password == $cpassword){
            $option=['cost'=>12];
            $hash = password_hash($password, PASSWORD_DEFAULT,$option);

            $token = bin2hex(random_bytes(15));

            $sql = "INSERT INTO `users` ( `name`, `username`, `password`, `mobile`, `physician`,`token`, `date`) VALUES ( '$name ', '$username', '$hash', ' $contact', '$physician','$token', current_timestamp());
";
        

            $result = mysqli_query($conn,  $sql);
           ;
            if($result){
                $showAlert = true;
            }
        }
        else{
            $showErrorPassword=true;
        
        }
    }

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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <title>Sign up</title>

    <style>
    .search_input {
        visibility: hidden;
    }

    .form {
        width: 30%;
        margin: 2rem auto;
        padding-bottom: 4rem;

    }

    .form .heading {
        color: orange;
        font-size: 1.5rem;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: -1.5rem;
    }

    .form a {
        text-decoration: none;
        background-color: transparent;
        margin: auto;
    }

    .form .form-control {
        border: 1px solid orange;
        background-color: transparent;
        padding: 0.6rem 2rem;
        width: 100%;
        margin: 0.5rem auto;
        border-radius: 3rem;

    }

    .form .signup {
        background-color: orange;
        color: white;
        border: none;
        border-radius: 3rem;
        padding: 0.5rem;
        text-align: center;
        margin: 1rem auto;
        width: 100%;
    }

    @media only screen and (max-width:768px) {
        .form {
            width: 50%;


        }

        @media only screen and (max-width:320px) {
            .form {
                width: 70%;


            }
    </style>
</head>

<body>
    <?php require "partials/_header.php"; ?>
    <?php
        if( $showAlert){
            echo '<div style="z-index: 1;" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Done! </strong>Your account has been created successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
         
        }
        else if($showErrorPassword){
            echo '<div  style="z-index: 1;" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Your passwords do not match. </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          
          
        }
        else if($showErrorLogin){
            echo '<div style="z-index: 1;" class="alert alert-danger alert-dismissible fade show" role="alert">
           Your account already exists.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
         

        }
        
        
    ?>


    <div class="container form ">
        <h2 class="heading">Sign up</h2>
        <form class="form_inner" action="/yourHealth/signup.php" method="POST">
            <div  style="display: flex; flex-direction: row; align-items: center; justify-content: center;">

                <i class="fas fa-user" style="margin-right: 0.5rem;"></i>  <input name="name" type="text" class="form-control" placeholder="Name" id="name"
                    aria-describedby="emailHelp">

            </div>
            <div style="display: flex; flex-direction: row; align-items: center; justify-content: center;">

                <i class="fas fa-envelope"  style="margin-right: 0.5rem;"></i><input name="username" type="email" class="form-control" placeholder="Email Id" id="username"
                    aria-describedby="emailHelp">

            </div>
            <div  style="display: flex; flex-direction: row; align-items: center; justify-content: center;">

                <i class="fas fa-phone"  style="margin-right: 0.5rem;"></i><input name="mobile" type="number" class="form-control" placeholder="Contact No." id="contact">

            </div>
            <div  style="display: flex; flex-direction: row; align-items: center; justify-content: center;">

                <i class="fas fa-lock"  style="margin-right: 0.5rem;"></i><input name="password" type="password" class="form-control" placeholder="Password" id="password">

            </div>
            <div  style="display: flex; flex-direction: column; align-items: center; justify-content: center;">

               <div  style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                <i class="fas fa-lock"  style="margin-right: 1rem;"></i><input name="cpassword" type="password" class="form-control" placeholder="Confirm password"
                    id="cpassword">
                </div>
                <div id="emailHelp" class="form-text" style="font-size: 0.8rem; margin-top:0; margin-bottom: 5px;">
                    Type the same password.
                </div>
            </div>

            <div class="form-check" style=" margin-top: 0.7rem;">
                <input class="form-check-input" type="checkbox" name="physician" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault"
                    style="color: rgb(68, 67, 67); font-size: 0.8rem;">
                    Check for physician
                </label>
            </div>




            <button type="submit" class="btn btn-primary signup">Sign up</button>
            <div id="emailHelp" class="form-text login"
                style="font-size: 0.9rem; margin-top: 1px;  width: 100%; margin-bottom: 5px;">
                Already have an account? <span style="font-size: 0.9rem; color:#3498db;"><a
                        style=" text-decoration: none; " href="login.php">Login</a></span>
            </div>
        </form>

    </div>



    <?php require "partials/_footer.php";?>
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
    let signUp = document.getElementById("signUp");

    signUp.classList.add("active");
    </script>
</body>

</html>