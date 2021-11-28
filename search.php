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
    <title>iForum - Coding Forum</title>
    <style>
        .search_results {
            width: 80%;
        }

        .card{
            border-radius: 1rem;
            max-width: 200px;
        }
        .card img {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
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
        .card-text{
            font-weight: lighter;
            font-size: 0.8rem;
        }

        .view_thread {
            background-color: orange;
            border: none !important;
            font-size: 0.8rem;
        }

        .card:hover {
            transform: scale(1.02, 1.02);
        }
        .jumbotron {
            background: rgb(232, 235, 235);
            padding: 2rem;
            margin: auto;

        }

        .jumbotron h1 {
            font-size: 1.2rem;
            font-weight: lighter;
        }
        .suggestions li{
            font-size: 1rem;
            font-weight: lighter;
        }



        @media only screen and (max-width: 736px) {
            .jumbotron {
                background: rgb(232, 235, 235);
                padding: 1rem 0 1rem 0;
                text-align: center;
                margin: auto;

            }

            .cards {
                width: 80%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }
    </style>

</head>

<body>
    <?php require "partials/_header.php";?>

    <?php require "partials/_dbconnect.php";?>

    <!-- Search Results -->
    <div class="container my-5 search_results">
        <div class="container my-2">
            <div class="made_jumbotron">
                <h3 class="display-4"> Welcome to <span class="thread_span"> <?php echo $_GET['search']; ?></span> forum
                </h3>
                <hr class="my-4">
            </div>
        </div>
        <div class="section container-fluid">
            <h2 class="heading text-center">Your search results...</span></h2>

            <div class="container cards body mb-5">
                <?php 
                    $search = $_GET["search"];
                    $sql= "SELECT * FROM `categories` where MATCH (`category_name`,`category_description`) against ('$search')";
                    $result = mysqli_query($conn,$sql);
                    $row =  mysqli_num_rows($result);
               if($row){

               
                while($row = mysqli_fetch_assoc($result)){
                    
                    echo '
                <div class="card">
                            <img src="https://source.unsplash.com/500x400/?' .$row['category_name']. ',medical,medicine" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold;"><a href="threads.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></h5>
                                <p class="card-text">
                                '.substr($row['category_description'],0,100).' ...</p>
                                <a href="threads.php?catid='.$row['category_id'].'" class="btn view_thread btn-primary">Consult</a>
                            </div>
                            
                </div>';
                    }
                }
                else{
                    echo '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                          <h1 class="display-1">No Results Found</h1>
                          <p >
                              <ul class="suggestions"> Suggestions:
                                  <li>Make sure all words are spelled correctly.</li>
                                  <li> Try precise words.</li>
                                  
                              </ul>
                          </p>
                          
                        </div>
                      </div>';
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