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

    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>iForum - Coding Forum</title>
    <style>
    .search_input {
        visibility: hidden;
    }

    .conversation {
        width: 80% !important;
        display: flex;
        flex-direction: column;
        margin: 0 auto;
        padding: 0;
        justify-content: space-between;

    }

    .current_user {
        margin: 1rem 2rem;
        margin-bottom: 0;
        font-size: 1.2rem;
    }

    .current_user span {
        font-size: 1.5rem;
        color: rgb(150, 61, 10);
        text-align: left;
        text-transform: uppercase;
        margin: 1rem 0.2rem;

    }

    .notLoggedIn {
        width: 74%;
        text-align: center;
        font-size: 2rem;
        font-weight: lighter;
        background-color: rgb(240, 199, 122);
        margin-top: 3rem;
        border-top-right-radius: 50%;
        border-bottom-left-radius: 30%;
    }

    .query {
        width: 100%;

    }

    .query p {
        text-align: left;
        background-color: rgb(231, 231, 231);
        padding: 1rem;
        margin: 0;
        border-radius: 1.2rem;
        border-top-left-radius: 0;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 9px 0 rgba(0, 0, 0, 0.19);
        margin-right: 40%;
        font-size: 0.8rem;
        max-width: 60%;
    }

    .solution {
        width: 100%;
        margin: 0.8rem 0;
        margin-bottom: 0;

    }

    .solution div {
        text-align: right;
        padding: 1rem;
        margin: 0;
        max-width: 60%;
        border-radius: 1.2rem;
        border-top-left-radius: 0;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 9px 0 rgba(0, 0, 0, 0.19);
        margin-left: 40%;
        font-size: 0.8rem;
        font-weight: 500;

    }

    .solution p {
        font-size: 0.65rem;
        text-align: right;
        margin: 0;
        margin-bottom: 0.2rem;

    }

    .solution_not_found {
        width: 100%;

    }

    .solution_not_found p {
        margin-left: 50%;
        max-width: 50%;
        color: grey;
        text-align: right;
        padding: 1rem;
        margin-right: 2rem;
        font-size: 0.8rem;
    }
   

    .solution_attachment {
        width: 30%;
        margin-left: 70%;
        margin: 1rem auto;
        margin-right: 1rem;
    }

    .solution_attachment img {
        width: 100%;
        border-radius: 0;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 9px 0 rgba(0, 0, 0, 0.19);
    }

    .solution_attachment p {
        font-size: 0.65rem;
        text-align: right;
        padding: 0;
        margin: 0;
        margin-bottom: 0.2rem;
    }

    .comment_by {
        font-size: 0.8rem;
        text-transform: capitalize;
        margin: 0 0.4rem;
        margin-right: 0;
    }

    @media only screen and (max-width:768px) {
        .notLoggedIn {
            width: 80%;
            font-size: 1.5rem;

        }

        .query p {

            padding: 0.5rem;
            margin-right: 20%;
            max-width: 80%;
        }

        .solution {
            width: 100%;
            margin: 0.5rem 0;
            margin-bottom: 0;

        }

        .solution div {

            padding: 0.8rem;
            max-width: 80%;
            margin-left: 20%;

        }


        .solution_attachment {
            width: 50%;
            margin-left: 50%;
            margin: 0.8rem auto;
            margin-right: 1rem;
        }

        .solution_not_found p {
            margin-left: 20%;
            max-width: 80%;

            padding: 0.5rem;
            margin-right: 1rem;

        }

    }
    </style>

</head>

<body>
    <?php require "partials/_header.php";?>

    <?php require "partials/_dbconnect.php";?>
    <?php
        
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
            $username = $_SESSION['username'];
                
            // Fetch current user
             $sql="SELECT * FROM `users` WHERE username='$username'";
              $result = mysqli_query($conn,$sql);
              $row=mysqli_fetch_assoc($result);
              $user_id = $row['sno.'];
            
              
            
            echo '<div class="current_user">Welcome 
            <span>'.$row['name'].'</span>
            </div>';

              echo '<div class="container section mb-4">';
              // Fetch current user's query
              $sql_fetch = "SELECT * FROM `threads` WHERE thread_user_id = $user_id";
              $result_fetch = mysqli_query($conn,$sql_fetch);
              $num_fetch = mysqli_num_rows($result_fetch);
                if($num_fetch == 0){
                    echo  '<div class="no_queries" style="text-align: center; font-size: 1.5rem;"><p>You have no queries...</p></div>';
                }
                
            
                while($row_fetch=mysqli_fetch_assoc($result_fetch)){
                    echo '<div class="conversation">';
                               echo '<div class="query"><p>'.$row_fetch['thread_title'].'</p></div>';
                                $comment_id= $row_fetch['thread_id'];
                            

                     // Fetch replies of current user's query
                    $sql_fetch_reply = "SELECT * FROM `comments` WHERE comment_thread_id = $comment_id";
                    $result_fetch_reply  = mysqli_query($conn,$sql_fetch_reply);
                    $num = mysqli_num_rows($result_fetch_reply);
                  
                   if($num != 0){
                        while($row=mysqli_fetch_assoc($result_fetch_reply)){
                            $comment_by = $row['comment_by'];
                              // Fetch physician's name
                        
                            $sql2="SELECT name FROM `users` WHERE `sno.`= '$comment_by'";
                            $result2 = mysqli_query($conn,$sql2);
                            $row2=mysqli_fetch_assoc($result2);

                    
                            if($row['comment_content']){
                                echo  '<div class="solution">
                                        <div>'.$row['comment_content'].'</div>
                                        <p> Answered by: <span class="comment_by">Dr. '.$row2['name'].'</span>
                                        </p>
                                        <p class="comment_time">'.$row['comment_time'].'
                                         </p>
                                       </div>
                                   ';
                            }
                           if($row['comment_attachment']){
                            echo  ' <div class="solution_attachment"> <img src="';?>
                                                            <?php echo $row['comment_attachment'];?>
                                                            <?php echo '">
                            <p> Answered by: <span class="comment_by">Dr. '.$row2['name'].'</span>
                            </p>
                            <p class="comment_time">'.$row['comment_time'].'
                            </p>
                            </div>
                           ';
                           }
                        }
                    }
                    else{
                        echo  '<div class="solution_not_found"><p>Not answered...</p></div>';
                    }

                  
                    echo '</div>';
                }

            echo '</div>';
        }
        else{
            echo "<p class='container notLoggedIn py-3'>Log in to start discussion...</p>"; 


        }

  ?>


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
    let comment_attachment = document.querySelectorAll(".solution_attachment");

    comment_attachment.forEach(function(item, index) {

        item.addEventListener("click", function() {

            if (this.style.width == "30%") {
                this.style.width = "100%";
                this.style.padding = "1rem";

            } else {
                this.style.width = "30%";
                this.style.padding = "0";
            }


        })



    })
    </script>
    <?php require "partials/_footer.php";?>
</body>

</html>