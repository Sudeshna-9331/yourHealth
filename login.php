<?php require "loginGoogle.php"; ?>

<?php
$login = false;
 $showError = false;
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "partials/_dbconnect.php"; 
    $username = $_POST["username"]; 
    $password = $_POST["password"];

        $sql = "Select * from users where username='$username'";
        
        $result = mysqli_query($conn,  $sql);
        $num = mysqli_num_rows($result);
       
        if($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                $name = $row["name"];
                if(password_verify($password,$row['password'])){
                    $login = true;
                    session_start();
                    $_SESSION['loggedin']=  true;
                    $_SESSION['username']=  $username;
                    $_SESSION['password']=  $password;

                   

                    if(isset($_POST['remember_me'])){
                        header("location:welcome.php");
                        setcookie("email_cookie",$username ,time()+86400);
                        setcookie("password_cookie",$password ,time()+86400);
                    }
                    else{
                        header("location:welcome.php");
                    }
                    header("location:welcome.php");
                }
                else{
                    $login =false;
                    $showError=true;
                }
            }
           
        }
       
        else{
            header("location:welcome.php");
            $login =false;
            $showError=true;
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

    <title>Login</title>


    <style>
    .search_input {
        visibility: hidden;
    }

    .form {
        width: 30%;
        margin: 3rem auto;
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

    .form .google_login,
    .form button,
    .form .form-control {
        border: 1px solid orange;
        background-color: transparent;
        padding: 0.6rem 2rem;
        width: 100%;
        margin: 0.5rem auto;
        border-radius: 3rem;
    }

    .form .submit {
        background-color: orange;
        color: white;

        padding: 0.5rem;
        text-align: center;
        margin: 1rem auto;
    }

    .gmail_login {
        color: red
    }

    @media only screen and (max-width:768px) {
        .form {
            width: 70%;
        }

        .form .google_login,
        .form button,
        .form .form-control {
            border: 1px solid orange;
            background-color: transparent;
            padding: 0.6rem;
            width: 100%;
            margin: 0.5rem auto;
            border-radius: 3rem;
        }


    }

    @media only screen and (max-width:320px) {
        .form {
            width: 90%;
        }

        .form .google_login,
        .form button,
        .form .form-control {
            border: 1px solid orange;
            background-color: transparent;
            padding: 0.6rem 0.7rem;
            width: 100%;
            margin: 0.5rem auto;
            border-radius: 3rem;
        }



    }
    </style>


</head>

<body>
    <?php require "partials/_header.php"; ?>

    <?php
        if($login){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            You are logged in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        
        
        else if($showError){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Invalid credentials.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        
    ?>


    <div class="container form">
        <h2 class="heading">Login </h2>
        <?php
            if($login_button == '')
            {
                echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
                echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                echo '<h3><a href="logout.php">Logout</h3></div>';
            }
            else
            {
                echo '<a href="" style="margin: auto;"><button type="submit" align="center" class="google_login"><i class="fab fa-google"></i> '.$login_button.'</button></a>';
            }
        ?>
       
        <hr style="border: 0.5px solid orange; width: 30%; margin:0.5rem   auto; padding: 0;">


        <form class="form_inner" action="/yourHealth/login.php" method="POST">

            <div style="display: flex; flex-direction: row; align-items: center; justify-content: center;">

                <i class="fas fa-envelope" style="margin-right: 0.5rem;"></i><input name="username" type="email"
                    class="form-control text-center" placeholder="Email id" value="<?php if(isset($_COOKIE["
                    email_cookie"])){ echo $_COOKIE['email_cookie'];}?>" id="username" aria-describedby="emailHelp">

            </div>
            <div style="display: flex; flex-direction: row; align-items: center; justify-content: center;">

                <i class="fas fa-lock" style="margin-right: 0.5rem;"></i><input name="password" type="password"
                    class="form-control text-center" value="<?php if(isset($_COOKIE[" password_cookie"])){ echo
                    $_COOKIE['password_cookie'];}?>" placeholder="Password" id="password">

            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember_me" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault" style="color: rgb(83, 81, 81);">
                    Remember me
                </label>
            </div>

            <button type="submit" class="submit btn text-center">Login</button>
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
    < /body>

    <
    /html>