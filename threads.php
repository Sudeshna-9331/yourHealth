<?php
 session_start();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <title>Welcome</title>
    <style>
    .chat_call {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }
    .search_input{
            visibility: hidden;
        }
    .navbar-brand {
        font-weight: normal;
        margin-bottom: 0;
        font-size: 2rem;
    }
    .fas{
        margin:auto 5px;
    }
   

    .btn {
        margin-left: 8px;
    }

    .btn a {
        color: white !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .made_jumbotron {
        background: linear-gradient(rgb(158, 165, 165), rgb(232, 235, 235));
        padding: 2rem 2rem 2rem 3rem;
        width: 74%;
        margin: auto;
        border-bottom-right-radius: 50%;

    }

    .jumbotron {
        background: rgb(232, 235, 235);
        padding: 2rem;
        margin: auto;

    }

    .jumbotron h1,
    p {
        font-weight: lighter;
    }

    .jumbotron p {
        font-size: 0.6rem;
    }

    .questions {
        width: 80%;
        margin: auto;
        padding-bottom: 3rem;
    }

    img {
        width: 60px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .thread_span {
        color: rgb(145, 42, 5);
        font-size: 2rem;
    }

    .form {
        margin: auto;
        width: 80%;
    }

    label {
        color: rgb(88, 85, 85) !important;
    }

    .comment_info {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between !important;
      
    }

    .comment_time {
        font-size: 12px;
        font-weight: bold;
        color: orange;
    }

    .thread_desc {
        font-size: 15px;
      
        width: 100%;
    }

    .comment_by_info {
        font-size: 15px;
        font-weight: bold;
        color: black;
        display: flex;
        flex-direction: row;


    }
.media-body{
    display: flex;
    flex-direction: column;
    width: 100%;
}


    .thread_title {
        color: black;
        text-decoration: none;
        width: 100%;
        margin-bottom: 1.7rem;
      
    }

    .notLoggedIn {
        width: 74%;
        text-align: center;
        font-size: 2rem;
        background-color: rgb(240, 199, 122);
        margin-top: 2rem;
        border-top-right-radius: 50%;
        border-bottom-left-radius: 30%;
    }

    .posted_by {
        font-size: 15px;
        font-weight: bold;
        margin-right: 2rem;
        color: rgb(145, 42, 5);
        margin-left: 3px;
        text-transform: capitalize;

    }
    .problem{
        display: flex;
        flex-direction: row;

    }


    .discuss_online{
           margin:0 1.2rem;
           font-size:1.3rem;
           background:  #34495e;
           font-weight: lighter;
       }
       .discuss_online:hover{
           background-color: #4d647a;
       }



    @media only screen and (max-width: 768px) {
       .discuss_online{
           margin:0 1.2rem;
           font-size:0.9rem;
       }
        .chat_call {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-evenly;
        }
        .made_jumbotron {
            background: linear-gradient(rgb(158, 165, 165), rgb(232, 235, 235));
            padding: 1rem 1rem 1rem 2rem;

            width: 100%;
            margin: auto;
            border-bottom-right-radius: 50%;


        }

        .jumbotron {
            background: rgb(232, 235, 235);
            padding: 1rem 0 1rem 0;

            margin: auto;

        }

        .comment_by_info {
            font-size: 15px;
            font-weight: bold;
            color: black;
            display: flex;
            flex-direction: column;
            margin-top: 5px;
            width: 100%;

        }

        .posted_by {
            font-size: 12px;
            font-weight: bold;
            margin-right: 2px;
            color: rgb(145, 42, 5);

        }


        .btn {
            margin-top: 8px;
            margin-left: 0;

        }

        .thread_span {
            color: rgb(145, 42, 5);
            font-size: 1.5rem;
        }

        .form {
            margin: auto;
            width: 100%;
        }

        .comment_by {
            font-size: 13px;
            font-weight: bold;
        }

        .comment_info {
            display: flex;
            flex-direction: column;
            justify-content: space-between !important;
            width: 100%;
        }

        img {
            width: 60px;

        }

        .questions {
            width: 100%;
            margin: auto;
            padding-bottom: 3rem;
        }


    }
    </style>
</head>

<body>

    <?php require "partials/_header.php";?>

    <?php require "partials/_dbconnect.php";?>
    <?php
       $id = $_GET['catid'];
       $sql="SELECT * FROM `categories` WHERE category_id=$id";
       $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $category_title=$row['category_name'];
            $category_desc=$row['category_description'];
        }

    ?>
    <?php
    $alert = false;
       $method = $_SERVER['REQUEST_METHOD'];
       if($method=="POST"){



           // Insert query into database.
           $thread_title=$_POST['thread_title'];
           $thread_desc=$_POST['thread_desc'];
          if($thread_title && $thread_desc){
            
             
              // Getting the current user logged in from users database
              $username_loggedin = $_SESSION['username'];

            $sql2="SELECT `sno.` FROM `users` WHERE username='$username_loggedin'";
            $result2 = mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($result2);
            
            $user_id=$row2['sno.'];
            
            $thread_title = str_replace("<","&lt;",$thread_title);

            $thread_title = str_replace(">","&gt;",$thread_title);

            $thread_desc = str_replace("<","&lt;",$thread_desc);

            $thread_desc = str_replace(">","&gt;",$thread_desc);

             // Insert query into database.
            $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_user_id`, `thread_category_id`, `timestamp`) VALUES ( '$thread_title', ' $thread_desc', $user_id, '$id', current_timestamp())";

            $result = mysqli_query($conn,$sql);

            $alert = true;
            if($alert){
                echo '<div style="z-index: 1;" class="alert alert-success alert-dismissible fade show" role="alert">
                Your query has been submitted successfully...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
          }
           
       }
       
    ?>

    <div class="container my-4">
        <div class="made_jumbotron">
            <h3 class="display-4"> Welcome to <span class="thread_span"> <?php echo $category_title; ?></span> forum
            </h3>
            <p class="lead"><?php echo $category_desc; ?></p>
            <hr class="my-4">
            <p style="font-size: 0.9rem;">This is a peer to peer form for sharing knowledge with each other.</p>
            <p style="font-size: 0.7rem; margin-right: 8rem;">Forum Rules: No Spam / Advertising / Self-promote in the forums. ...
                Do not post copyright-infringing material. ...
                Do not post “offensive” posts, links or images. ...
                Do not cross post questions. ...
                Remain respectful of other members at all times.</p>
          
        </div>

        <?php
       // Form to ask questions 
       if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
            echo '<div class="container form mt-5">
            <h1 class="my-4">Start a discussion</h1>
            <form action="'.$_SERVER["REQUEST_URI"].'"  method="POST">
                <div class="form-group my-3">
                    <label for="thread_title">Problem Title</label>
                    <input autocomplete="off" type="text" class="form-control" name="thread_title" id="thread_title"
                        aria-describedby="emailHelp">
                </div>

                <div class="form-group my-3">
                    <label for="thread_desc">Ellaborate your problem.</label>
                    <textarea autocomplete="off" class="form-control" id="thread_desc" name="thread_desc" rows="9"></textarea>
                </div>

               
                <div class="chat_call">
                    <button type="submit" class="btn btn-primary my-3 discuss_online">Submit</button>
                </div>
                </form>
            </div>';
       }
       else{
            echo "<p class='container notLoggedIn py-3'>Log in to start discussion...</p>";
            
       }
        
    ?>
        <div class="container questions mt-5 mb-5">
            <h1>Browse Questions</h1>
            <?php
                    $id = $_GET['catid'];
                    $sql="SELECT * FROM `threads` WHERE thread_category_id=$id";
                    $result = mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($result);
                    if($num == 0){
                        echo '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                          <h1 class="display-4">No Results Found</h1>
                          <p class="lead"> Be the first person to ask...</p>
                        </div>
                      </div>';

                    }
                    else{
                        while($row = mysqli_fetch_assoc($result)){

                           
                            $thread_title=$row['thread_title'];
                            $thread_desc=$row['thread_desc'];
                            $thread_id=$row['thread_id'];
                            $thread_user_id=$row['thread_user_id'];
                            $thread_time=$row['timestamp'];

                             // Fetching the current user
                            $sql2="SELECT name FROM `users` WHERE `sno.`=$thread_user_id";
                            $result2 = mysqli_query($conn,$sql2);
                            $row2=mysqli_fetch_assoc($result2);
                            
                            



    
                          echo '<div class="d-flex  my-3 mx-0 problem">
                                    <div class="flex-shrink-0">
                                        <img src="partials/images/user.png" alt="...">
                                    </div>
                                    <div class="flex-grow-1 my-2 ms-3 media-body">
                                            <div class="comment_info">

                                                <div class="thread_title">
                                                    <a  href="thread.php?threadid='.$thread_id.'">'.$thread_title.'</a>
                                                </div>
                                                <div class="comment_by_info">
                                                        <p>Posted by:<span class="posted_by">'.$row2['name'].' </span>
                                                        </p>
                                                
                                                        <p class="comment_time">'.$thread_time.'
                                                        </p>
                                                   
                                                </div>

                                            </div>
                                            <div class="thread_desc">'.$thread_desc.' </div>
                                    </div>
                                </div>';
                        }

                    }

                ?>
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
    <?php require "partials/_footer.php";?>

</body>

</html>