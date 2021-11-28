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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <title></title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }
    .search_input{
            visibility: hidden;
        }
    body {
        padding-bottom: 2rem;
    }

    .btn {
        margin-left: 8px;
        font-weight: lighter;
        font-size: 1.1rem;
    }

    .questions {
        width: 80%;
    }

    .discussions {
        width: 80%;

    }

    h2 {
        font-size: 2rem !important;
    }

    .lead {
        font-size: 1rem !important;
    }

    .btn a {
        color: white !important;
        margin: 0 !important;
        padding: 0 !important;
        font-weight: lighter;
    }

    .thread_span {
        font-size: 1.3rem !important;
        color: brown;
        font-weight: 400;
      
    }


    .jumbotron {
        background-image: linear-gradient(to right, rgba(255, 0, 0, 0), rgb(241, 111, 111));
        padding: 1.3rem 1.5rem;
        margin-bottom: 2rem;
        border-radius: 10px;
        width: 80%;
        margin: auto;
    }

    .jumbotron_discussion {
        padding: 1.5rem 1.2rem 1.5rem 1.2rem;
    }

    .notLoggedIn {
        width: 74%;
        text-align: center;
        font-size: 2rem;
        font-weight: lighter;
        background-color: rgb(240, 199, 122);
        margin-top: 2rem;
        border-top-right-radius: 50%;
        border-bottom-left-radius: 30%;
    }


    .heading_discuss {
        text-transform: uppercase;
        font-size: 1.5rem;
        letter-spacing: 2px;
        color: brown;
        margin-bottom: 2rem;
    }

    .post_info {
        font-weight: bold;
        font-size: 1rem;
        color: black;
        text-transform: capitalize;
    }

    .comment {
        background-color: rgb(241, 119, 119);
        border: none;
        font-size: 1rem;
        padding: 0.5rem 0.2rem;
        margin: 0 1rem;
    }

    .comment:hover {
        background-color: rgb(241, 97, 97);
    }

    img {
        width: 60px;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .comment_info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;

    }

    .comment_by_info {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly !important;


    }

    .comment_by {
        font-size: 15px;
        font-weight: bold;
        text-transform: capitalize !important;
        color: brown;
        margin-left: 12px;
        margin-right: 12px;
    }



    .comment_content {
        width: 100% !important;
        font-size: 12px;

        margin-top: 0;
    }

    .comment_attachment {
        width: 50%;
        margin: auto;

    }

    .comment_attachment img {
        width: 100%;
        border-radius: 0;
        margin-top: 1rem;
    }



    .comment_time {
        font-size: 12px;
        font-weight: bold;
        color: orange;
        margin-left: 20rem;
    }

    .solution {
        width: 100%;

    }

    .answer {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
    }



    @media only screen and (max-width: 768px) {
        .thread_span {
            font-size: 1rem;
            color: brown;
        }

        .answer {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
             margin: auto;

        }
        .answer input{
            margin: auto;
        }

        .jumbotron {
            padding: 1.3rem;
            width: 100%;
            margin: auto;
        }

        .discussions {
            width: 100%;

            padding: 0;
            margin: 0;

        }

        .solution {
            width: 100%;
            padding: 0;
            margin: 0;

        }

        p {
            font-size: 15px;
        }

        img {
            width: 50px;
            border-radius: 50%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .comment_info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            

        }

        .comment_by_info {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly !important;
            width: 80%;

        }

        .heading_discuss {

            font-size: 1.2rem;

            margin-bottom: 0.5rem;
        }

        .comment_by {
            font-size: 13px;
            font-weight: bold;


        }

        .comment_time {
            font-size: 12px;
            font-weight: bold;

            margin: 0;
        }

        .notLoggedIn {
            width: 80%;
         
            font-size: 1.5rem;
            margin-top: 2rem;
           
        }

    }
    </style>
</head>

<body>
    <?php require "partials/_header.php";?>

    <?php require "partials/_dbconnect.php";?>
    <?php
       $threadid= $_GET['threadid'];
       $sql="SELECT * FROM `threads` WHERE thread_id=$threadid";
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
            
            // Fetch user posted the query...
            $thread_id= $_GET['threadid'];
            $sql3="SELECT thread_user_id FROM `threads` WHERE thread_id=$threadid";
            $result3 = mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_assoc($result3);
            $user_id = $row3['thread_user_id'];


            $sql4="SELECT `name` FROM `users` WHERE `sno.`= $user_id";
            $result4 = mysqli_query($conn,$sql4);
            $row4=mysqli_fetch_assoc($result4);
           

            $thread_title=$row['thread_title'];
            $thread_desc=$row['thread_desc'];
        }
       }
    ?>
    <!-- Insert comments to database -->
    <?php
       $alert=false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=="POST"){
             
            // Getting the current user logged in from users database
            $username_loggedin = $_SESSION['username'];
          
          $sql2="SELECT `sno.` FROM `users` WHERE username='$username_loggedin'";
          $result2 = mysqli_query($conn,$sql2);
          $row2=mysqli_fetch_assoc($result2);
          
          $user_id=$row2['sno.'];
          

            // Insert comment into database.
            $threadid = $_GET['threadid'];
            $comment_content=$_POST['comment_content'];

  
            $comment_content = str_replace("<","&lt;", $comment_content);

            $comment_content = str_replace(">","&gt;", $comment_content);
            $comment_attachment = $_FILES['attach'];
          
            $comment_attachment_name=$comment_attachment['name'];
            $comment_attachment_path=$comment_attachment['tmp_name'];
            $comment_attachment_error=$comment_attachment['error'];
           

            // Attachment validation
            $comment_attachment_text = explode(".",$comment_attachment_name);
            $comment_attachment_extension =strtolower( end($comment_attachment_text ));

           

            $comment_attachment_valid = array('jpg','png',"jpeg");

            if(isset($_POST["submit"]) && $comment_content &&  $comment_attachment_error!=0 ){

    
                $sql="INSERT INTO `comments` (`comment_content`, `comment_thread_id`, `comment_time`, `comment_by` ,`comment_attachment`) VALUES ('$comment_content', '$threadid', current_timestamp(),$user_id, '')";

    
                $result = mysqli_query($conn,$sql);
                $alert = true;
            }
            else if(in_array($comment_attachment_extension, $comment_attachment_valid)){
                
                if( isset($_POST["submit"]) && $comment_content &&   $comment_attachment_error==0 ){
               
                    // Upload attachment to local folder.
                    $comment_attachment_destination = 'upload/'.$comment_attachment_name;
                 
                    move_uploaded_file($comment_attachment_path,$comment_attachment_destination);
    
                   
    
                    $sql="INSERT INTO `comments` (`comment_content`, `comment_thread_id`, `comment_time`, `comment_by` ,`comment_attachment`) VALUES ('$comment_content', '$threadid', current_timestamp(),'$user_id', '$comment_attachment_destination' )";
    
                    $result = mysqli_query($conn,$sql);
                    $alert = true;
                    
                   
                }
                 
                else if( isset($_POST["submit"]) &&  $comment_attachment_error==0 ){
    
                     // Upload attachment to local folder.
                     $comment_attachment_destination = 'upload/'.$comment_attachment_name;
                     move_uploaded_file($comment_attachment_path,$comment_attachment_destination);
    
    
                    $sql= "INSERT INTO `comments` ( `comment_content`, `comment_thread_id`, `comment_time`, `comment_by` ,`comment_attachment`) VALUES ('', '$threadid', current_timestamp(),'$user_id', '$comment_attachment_destination')";
    
                    $result = mysqli_query($conn,$sql);
                    $alert = true;
                }
                else{

                    echo '<div style="z-index: 1;" class="alert alert-danger alert-dismissible fade show" role="alert">
                    Please comment something...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    $alert = false;
                   
                   
                }
            }
            else{
                ?>
                    <script type="text/javascript">
                    alert("Not a valid extension...Only JPG, PNG and JPEG formats are allowed...");
                    console.log("Not inserted");
                    </script>

                    <?php
            }
           

           
            if($alert){
                echo '<div style="z-index: 1;" class="alert alert-success alert-dismissible fade show" role="alert">
                Your comment has been added successfully! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        }

    ?>


    <div class="container my-4">
        <div class="jumbotron info">
            <div>
                <h3 class="display-4"><span class="thread_span"> <?php echo $thread_title; ?></span>
                </h3>
                <p class="lead"><?php echo $thread_desc; ?></p>
            </div>


            <p>Posted by: <span class="post_info"><?php echo $row4["name"]; ?></span></p>

        </div>


        <?php
          // Form to start discussion
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
       echo ' <div class="container questions mt-5 my-5">
            <h1 class="heading_discuss">Post a comment </h1>

            <form action="'.$_SERVER['REQUEST_URI'].'" method="POST" enctype="multipart/form-data">

                <div class="form-group my-3">
                    <label for="comment">Ellaborate your solution.</label>
                    <textarea class="form-control" id="comment" name="comment_content" rows="9"></textarea>
                </div>

                <div class="answer">

                    <button type="submit" name="submit" class="btn comment btn-primary my-1">Post comment</button>
                    
                    <span style="font-size:1rem; color:black;" ><i class="fas fa-paperclip"></i> 
                    <input style="font-size:0.9rem; color:black; margin: auto;  width: 70%;" type="file" name="attach" class="btn comment btn-primary my-0">
                    </span>

                </div>
            </form>';
        }
        else{
            echo "<p class='container notLoggedIn py-3'>Log in to start discussion...</p>"; 
        }
    ?>
    </div>
    <div class="discussions container-fluid mb-5 mt-2">
        <h1 class="heading_discuss">Discussions</h1>
        <!-- Fetch comments from database -->
        <?php
                    $threadid = $_GET['threadid'];
                    $sql="SELECT * FROM `comments` WHERE comment_thread_id=$threadid";
                    $result = mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($result);
                    echo '<div class="jumbotron_discussion    jumbotron-fluid">';

                    if($num == 0){
                       echo'
                                <div class="container">
                                <h2 class="display-4">No Results Found</h2>
                                <p class="lead"> Be the first person to comment...</p>
                                </div>';

                    }
                    else
                    {
                        while($row = mysqli_fetch_assoc($result)){

                            
                            $comment_thread_id=$row['comment_thread_id'];
                            $comment_content=$row['comment_content'];
                           $comment_by=$row['comment_by'];
                           $comment_time=$row['comment_time'];
                           $comment_attachment = $row['comment_attachment'];

                         // Fetching the current user
                           $sql2="SELECT name FROM `users` WHERE `sno.`= '$comment_by'";
                           $result2 = mysqli_query($conn,$sql2);
                           $row2=mysqli_fetch_assoc($result2);

                        
                            echo '<div class=" container-fluid d-flex  mx-0 solution">
                            <div class="flex-shrink-0">
                                <img class="user" src="partials/images/user.png" alt="...">
                            </div>
                            <div class="flex-grow-1 my-2 ms-3 media-body">
                                <h5 class="mt-0 ">
                                    <div class="comment_info">
                                        <div class="comment_by_info">
                                            <p> Answered by: <span class="comment_by">'.$row2['name'].'</span>
                                            </p>
                                           <p class="comment_time">'.$comment_time.'
                                           </p>
                                        </div>
 
                                        <div class="comment_content">'.$comment_content.'
                                       </div>
                                       <div class="comment_attachment">
                                     
                                        <img src="';?><?php echo $row['comment_attachment'];?><?php echo '">
                                      
                                    </div>
                                </h5>
                            </div>
                           </div>';
                            
                          
                           
                        }
                          

                    }
                    echo '
                    </div>';

                ?>
    </div>
    </div>

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
    let comment_attachment = document.querySelectorAll(".comment_attachment");

    comment_attachment.forEach(function(item, index) {

        item.addEventListener("click", function() {
            
            if (this.style.width == "50%") {
                this.style.width = "100%";
                this.style.margin = "0";
            } else {
                this.style.width = "50%";
            }


        })



    })
    </script>
</body>

</html>